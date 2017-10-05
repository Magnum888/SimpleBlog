<?php require "includes/config.php";?>
<?php include 'includes/db.php';?>
<?php include 'navigation.php' ?>
<?php include 'models/articleModel.php' ?>
<?php include 'models/crudActionModel.php' ?>

<?php if(mysqli_num_rows($articles) <= 0) { ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/one-article.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Blog</h1>
                        <h2 class="subheading">Sorry this article not found </h2>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php }else {?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/one-article.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1><?php echo $art['title']?></h1>
                        <span class="meta">Posted by
                                    <a href=""><?php echo $art['author']; ?></a>
                                    on <?php echo $art['date']; ?>
                                </span>
                        <span>Views: <?php echo $art['views']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mx-auto">
                    <div class="post-preview">
                        <p class="post-preview-txt">
                            <?=$art['preview']?>
                        </p>
                        <div class="img-article text-center">
                            <img class="img-fluid" src="<?php echo $art['image']; ?>" alt="">
                        </div>
                        <div class="post-subtitle">
                            <?php echo $art['text']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Show comments-->
    <article id="show-art">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mx-auto">
                    <p class="title-comments">Comments:</p>
                    <hr>
                </div>
            </div>
            <?php if(mysqli_num_rows($comments) <= 0) {echo "Do`t have comments";}
            while ($comment = mysqli_fetch_assoc($comments)) { ?>
                <div class="comments-article col-lg-12 col-md-12 mx-auto" id="comment_<?php echo htmlspecialchars($comment['id'])?>">
                    <a class="add-comment-link btn btn-2" href="#form-comment">Add comment&#8595;</a>
                    <div>
                        <span>Comment by:</span>
                        <span class="author-comment"><?php echo strip_tags($comment['author']); ?></span>
                        <span class="date-comment"><?php echo $comment['pubdate']; ?></span>
                    </div>
                    <div class="text-comment">
                        <?php echo strip_tags($comment['text']);?>
                    </div>
                    <?php if ($comment['author']===$_SESSION['name']){?>
                        <button class="btnEditAction" name="edit" onClick="showEditBox(this,<?php echo $comment["id"]; ?>)">Edit</button>
                        <button class="btnDeleteAction" name="delete" onClick="callCrudAction('delete',<?php echo $comment["id"]; ?>)">Delete</button>
                    <?php }?>
                </div>
                <hr>
            <?php } ?>
        </div>
    </article>

    <!-- Post comments-->

    <article id="form-comment">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mx-auto">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h4 class="title-comments">Comment: </h4>
                        </div>
                        <div style="color:green; font-weight: 700; margin-bottom: 10px;"><?php echo $comment_success;?></div>
                        <?php if (!isset($_SESSION['name'])) {?>
                        <form class="form-comments" action="article.php?id=<?php echo htmlspecialchars($art['id'])?>#form-comment" method="POST">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon fx-user"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" name="name" placeholder="Name" class="form-control form-input-name reset" value="<?php echo htmlspecialchars($_POST['name'])?>" autofocus="autofocus">
                                    </div>
                                    <div class="error-comment"><?php echo $nameErr;?></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                        <input type="text" name="nickname" placeholder="Nickname" class="form-control form-input-nickname reset" value="<?php echo htmlspecialchars($_POST['nickname'])?>">
                                    </div>
                                    <div class="error-comment"><?php echo $nicknameErr;?></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" name="email" placeholder="Email" class="form-control form-input-email reset" value="<?php echo htmlspecialchars($_POST['email'])?>">
                                    </div>
                                    <div class="error-comment"><?php echo $emailErr;?></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                        <textarea name="message" rows="6" class="form-control form-input-message reset" type="text" placeholder="Text comment"><?php echo htmlspecialchars($_POST['message'])?></textarea>
                                    </div>
                                    <div class="error-comment"><?php echo htmlspecialchars($messageErr);?></div>
                                </div>
                                <input type="hidden" name="csrf" value="<?php echo $csrf_token; ?>" />
                                <div class="col-lg-12 col-md-12 mx-auto">
                                    <button type="submit" name="do_post" class="btn fill pull-right">Send <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                    <button type="reset" value="Reset" name="reset" class="btn fill sub">Reset <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                        <?php }else{ ?>
                            <?php if($_SESSION['ban'] == 1):;?>
                            <div class="comments-article col-lg-12 col-md-12 mx-auto">
                                <div>
                                    <p style="color: red">Due to violation of the rules of using this site, you have been blocked. If you do not agree, please write to the email address kovel.blog@i.ua</p>
                                </div>
                            </div>
                            <?php else:?>
                            <form class="form-comments comments-ajax">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon fx-user"><i class="fa fa-user" aria-hidden="true"></i></span>
                                            <span class="form-control"><?php echo $_SESSION['name']?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                            <input type="text" name="nickname" id="txtnickname" placeholder="Nickname" class="form-control form-input-nickname reset" value="<?php echo htmlspecialchars($_POST['nickname'])?>">
                                        </div>
                                        <div class="error-comment"><?php echo $nicknameErr;?></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                            <textarea name="message" rows="6" id="txtmessage" class="form-control form-input-message reset" type="text" placeholder="Text comment"><?php echo htmlspecialchars($_POST['message'])?></textarea>
                                        </div>
                                        <div class="error-comment"><?php echo htmlspecialchars($messageErr);?></div>
                                    </div>
                                    <input type="hidden" name="csrf" value="<?php echo $csrf_token; ?>" />
                                    <div class="col-lg-12 col-md-12 mx-auto">
                                        <button type="submit" name="save_comment" class="btn fill pull-right" onClick="callCrudAction('add','')">Send <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                        <button type="reset" value="Reset" name="reset" class="btn fill sub">Reset <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        <img src="img/LoaderIcon.gif" id="loaderIcon" style="display:none" />
                                    </div>
                                </div>
                            </form>
                            <?php endif;?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <hr>
<?php } ?>
<script>
    function showEditBox(editobj,id) {
        $('.comments-ajax').hide();
        $('.btnDeleteAction').hide();
        $('.btnEditAction').hide();
        $(editobj).prop('disabled','true');
        var currentMessage = $("#comment_" + id + " .text-comment").html();
        var editMarkUp = '<div class="form-group"><div class="input-group"><textarea rows="6" cols="20" id="txtmessage_'+id+'" class="form-control">'+currentMessage+'</textarea></div></div><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
        $("#comment_" + id + " .text-comment").html(editMarkUp);

    }
    function cancelEdit(message,id) {
        $("#comment_" + id + " .text-comment").html(message);
        $('.comments-ajax').show();
        $('.btnDeleteAction').show();
        $('.btnEditAction').show();
    }
    function callCrudAction(action,id) {
        $("#loaderIcon").show();
        $('.btnDeleteAction').show();
        $('.btnEditAction').show();
        var queryString;
        switch(action) {
            case "add":
                //queryString = 'action='+action+'message='+$("#txtmessage").val()+'nickname='+$("#txtnickname").val();
                queryString = {action:'action', message:$("#txtmessage").val(), nickname:$("#txtnickname").val()};
                break;
            case "edit":
                queryString = 'action='+action+'&comment_id='+ id + '&txtmessage='+ $("#txtmessage_"+id).val();
                break;
            case "delete":
                queryString = 'action='+action+'&comment_id='+ id;
                break;
        }
        jQuery.ajax({
            url: "article.php",
            dataType:"text",
            data:queryString,
            type: "POST",
            success:function(data){
                switch(action) {
                    case "add":
                        $("#show-art").append(data);
                        break;
                    case "edit":
                        $("#comment_" + id + " .text-comment").html(data);
                        $('.comments-ajax').show();
                        $("#comment_"+id+" .btnEditAction").prop('disabled','');
                        break;
                    case "delete":
                        $('#comment_'+id).fadeOut();
                        break;
                }
                $("#txtmessage").val('');
                $("#txtnickname").val('');
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
</script>
<?php include 'pages/footer.php'?>
