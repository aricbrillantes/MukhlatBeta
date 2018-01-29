<?php
$topic = $_SESSION['current_topic'];
?>
<head>
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
</head>
<!-- Create Post Modal -->
<div id="create-post-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Create Topic Modal Content-->
        <div class="modal-content">
            <div class="modal-header modal-heading">
                <button type="button" class="close" style = "padding: 5px;" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Post to <?php echo utf8_decode($topic->topic_name); ?></strong></h4>
            </div>
            <form enctype = "multipart/form-data" action = "<?php echo base_url('topic/post'); ?>" id = "create-post-form" method = "POST">
                <div class="modal-body">
                    <div class="form-group"><!-- check if title is already taken -->
                        <label for = "title">Enter a title for your post:</label>
                        <input type="text" maxlength = "100" required class="form-control"  name = "post_title" id = "post-title" placeholder = "Title of your Post"/>
                    </div>
                    
                    <div class="form-group"><!-- check if description exceeds n words-->
                        <label for = "content">Enter the content of your post:</label>
                        <textarea class = "form-control" maxlength = "16000" required name = "post_content" id = "post-content" placeholder = "Tell something in your post!"></textarea>
                    </div>
                    <div id="testdiv"></div><br>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>

                    <div data-toggle="collapse" data-target="#camera" class="dropbtn" style = "background: #D7eadd; cursor: pointer;"><center><div>Take Picture</div>
                            <div id="camera" class="collapse">
                                <div class="camera">
                                <video id="video" style="width:95%;height:90%;"></video>
                                </div>
                                <canvas id="canvas"></canvas>
                                <div class="output"></div>
                                <div id = "img-label" class="btn btn-primary">
                                    <input id = "attach-img" accept = "image/*" type="file" name = "post_image" style = "display: none;">
                                    <p id="startbutton" class = "attach-btn-text"><i class = "fa fa-file-image-o" onclick="takepicture();"></i> Take Photo</p>
                                </div>
                            </div></center>
                        </div>
                         
                         <br><br>
                         
                    <div id = "attachment-buttons" class = "form-group">
                        Attach a file:
                        <!--IMAGE-->
                        <label id = "img-label" class="btn btn-primary">
                            <input id = "attach-img" accept = "image/*" type="file" name = "post_image" style = "display: none;">
                            <p id = "image-text" class = "attach-btn-text"><i class = "fa fa-file-image-o"></i> Add Image</p>
                        </label>

                        <!--AUDIO-->
                        <label id = "audio-label" class="btn btn-primary">
                            <input id = "attach-audio" accept = "audio/*" type="file" name = "post_audio" style = "display: none;">
                            <p id = "audio-text" class = "attach-btn-text"><i class = "fa fa-file-audio-o"></i> Add Audio</p>
                        </label>

                        <!--VIDEO-->
                        <label id = "video-label" class="btn btn-primary">
                            <input id = "attach-video" accept = "video/*" type="file" name = "post_video" style = "display: none;">
                            <p id = "video-text" class = "attach-btn-text"><i class = "fa fa-file-video-o"></i> Add Video</p>
                        </label>

                        <!--FILE-->
                        <label id = "file-label" class="btn btn-primary">
                            <input id = "attach-file" type="file" name = "post_file" style = "display: none;">
                            <p id = "file-text" class = "attach-btn-text"><i class = "fa fa-file-o"></i> Add File</p>
                        </label>
                        
                        <script type="text/javascript">
                        $('.form-control').keyup(function(event) {
                          if(
                                event.target.value.includes(" fuck ")||
                                event.target.value.includes(" shit ")||
                                event.target.value.includes("cunt")||
                                event.target.value.includes("ass ")||
                                event.target.value.includes(" ass")||
                                event.target.value.includes(" ass ")||
                                event.target.value.includes("dick")||
                                event.target.value.includes("semen")||             
                                event.target.value.includes("nigger")||
                                event.target.value.includes("logan paul")||
                                event.target.value.includes("jake paul")
                            )
                            {  
//                                alert('no swearing');
                                    document.getElementById("testdiv").innerText = 'NO SWEARING!';
                            }   
                            
                        else
                            document.getElementById("testdiv").innerText = '';
                        });  
                    </script>
                    </div>
                    <div id = "attachment-preview" class = "content-container">
                        <h5 id = "attachment-message" class = "text-warning text-center">No attachment yet.</h5>
                    </div>
                </div>
                <div class = "modal-footer" style = "padding: 5px; border-top: none; padding-bottom: 10px; padding-right: 10px;">
                    <a id = "create-post-btn" class ="btn btn-primary" data-toggle = "modal">Post</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url("/js/topic.js"); ?>"></script>
<!-- END SCRIPTS -->