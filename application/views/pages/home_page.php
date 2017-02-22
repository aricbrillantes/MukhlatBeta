<?php
include(APPPATH . 'views/header.php');
?>
<body>
    <?php
    include(APPPATH . 'views/navigation_bar.php');
    $logged_user = $_SESSION['logged_user'];
    ?>

    <div class = "container page">
        <div class = "row">
            <div class = "col-md-9 home-container">
                <div class = "col-sm-12 home-container">
                    <!-- HEADER -->
                    <div class = "clearfix content-container">

                        <a href = "<?php echo base_url('user/profile/' . $logged_user->user_id); ?>">
                            <img alt = "" class = "pull-left img-rounded btn btn-link home-prof-pic" src = "<?php echo $logged_user->profile_url ? base_url($logged_user->profile_url) : base_url('images/default.jpg') ?>">
                        </a>
                        <div class = "col-sm-4 home-user-text">
                            <a class = "btn btn-link home-username" href = "<?php echo base_url('user/profile/' . $logged_user->user_id); ?>"><strong><?php echo $logged_user->first_name; ?></strong></a>
                            <i class = "fa fa-caret-right header-arrow"></i> 
                            <div class="home-dropdown dropdown">
                                <button class="btn btn-link dropdown-toggle home-username" type="button" data-toggle="dropdown"><strong>Home</strong>
                                    <i class="caret"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="home">Home</a></li>
                                    <li><a href="topic">Topic</a></li>
                                </ul>
                            </div>
                        </div>
                        <a class ="btn btn-primary home-create-btn" href="#create-topic-modal" data-toggle = "modal">Create Topic</a>
                    </div>

                    <!-- CONTENT -->
                    <div class = "col-sm-12 content-container">
                        <div class = "col-sm-12">
                            <!-- POST PREVIEW -->
                            <?php foreach ($posts as $post): ?>
                                <div class = "col-xs-12 no-padding post-container" style = "margin-bottom: 10px;">
                                    <div class = "user-post-heading no-margin">
                                        <a class = "btn btn-link no-padding" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                            <strong><?php echo $post->first_name . " " . $post->last_name; ?></strong>
                                        </a> 
                                        <span>posted in</span> 
                                        <a class = "btn btn-link no-padding" href = "<?php echo base_url('topic/view/' . $post->topic_id); ?>">
                                            <strong><?php echo $post->topic_name; ?></strong>
                                        </a>:
                                    </div>

                                    <div class = "col-xs-12 user-post-content no-padding">
                                        <!-- Left -->
                                        <div class = "col-xs-1 text-center no-padding" style = "padding-left: 10px;">
                                            <a class = "btn btn-link no-padding" href = "<?php echo base_url('user/profile/' . $post->user_id);?>">
                                                <img class = "img-circle" style = "margin: 10px 0px;" width = "65px" src = "<?php echo $post->profile_url ? base_url($post->profile_url) : base_url('images/default.jpg'); ?>"/>
                                            </a>
                                            <button class = "upvote-btn btn btn-link btn-xs" style = "margin-left: 3px;" value = "<?php echo $post->post_id; ?>?>"><i class = "fa fa-chevron-up vote-text"></i></button>
                                            <br>
                                            <span class = "text-muted" style = "margin-left: 3px;">3</span>
                                            <br>
                                            <button class = "downvote-btn btn btn-link btn-xs" value = "<?php echo $post->post_id;?>"><i class = "fa fa-chevron-down vote-text"></i></button>
                                        </div>

                                        <!-- Right -->
                                        <div class = "col-xs-11" style = "margin-top: 5px;">
                                            <a class = "btn btn-lg btn-link no-padding" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                                <strong><?php echo $post->first_name . " " . $post->last_name ?></strong>
                                            </a>
                                            <span class = "text-muted"> <i style = "font-size: 11px"><?php echo date("M-d-y", strtotime($post->date_posted)); ?></i></span>
                                            <h4 class = "no-padding no-margin text-muted wrap"><strong><?php echo $post->post_title; ?></strong></h4>
                                            <p class = "home-content-body" style = "border-right: none;"><?php echo $post->post_content ?></p>
                                        </div>
                                    </div>
                                    <div class = "user-post-footer no-margin text-right">
                                        <a class = "btn btn-user-post-footer no-up-down-pad" href = "<?php echo base_url('topic/thread/' . $post->post_id); ?>">View Thread <i class = "fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include(APPPATH . 'views/topic_side_bar.php');
            include(APPPATH . 'views/modals/create_topic_modal.php');
            include(APPPATH . 'views/modals/topic_description_modal.php');
            ?>
        </div>
    </div>

    <?php
    include(APPPATH . 'views/chat.php');
    