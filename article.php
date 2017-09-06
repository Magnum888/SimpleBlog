<?php require "includes/config.php";?>
<?php include 'includes/db.php';?>
<?php include 'pages/navigation.php' ?>

<?php
    $articles = mysqli_query($connect, "SELECT * FROM `article` WHERE `id` = " . (int) $_GET['id']);
    if(mysqli_num_rows($articles) <= 0)
    {
?>
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
    <?php
    }else
        {
            $art = mysqli_fetch_assoc($articles);
            mysqli_query($connect, "UPDATE `article` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
            ?>
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
                                    <img class="img-fluid" src="/saves/images/<?php echo $art['image']; ?>" alt="">
                                </div>
                                <div class="post-subtitle">
                                    <?php echo $art['text']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

<!--            Post comments-->
            <article>
                <?php
                $comments= mysqli_query($connect, "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC ");
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mx-auto">
                            <p class="title-comments">Comments:</p>
                            <hr>
                        </div>
                    </div>
                    <?php
                    if(mysqli_num_rows($comments) <= 0)
                    {
                        echo "Do`t have comments";
                    }
                    while ($comment = mysqli_fetch_assoc($comments))
                    {
                        ?>
                        <div class="comments-article col-lg-12 col-md-12 mx-auto">
                            <a class="add-comment-link btn btn-2" href="#form-comment">Add comment&#8595;</a>
                            <div>
                                <span>Comment by:</span>
                                <span class="author-comment"><?php echo $comment['author']; ?></span>
                                <span class="date-comment"><?php echo $comment['pubdate']; ?></span>
                            </div>
                            <div class="text-comment">
                                <?php echo strip_tags($comment['text']); ?>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                </div>
            </article>
            <article id="form-comment">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 mx-auto">
                            <div class="panel panel-default">
                                <div class="panel-heading" >
                                    <h4 class="title-comments">Comment: </h4>
                                </div>
                                <form class="form-comments" action="article.php?id=<?php echo htmlspecialchars($art['id'])?>#form-comment" method="POST">
                                    <?php
                                    $nameErr = $nicknameErr = $emailErr = $messageErr = "";
                                    function test_input($data) {
                                        $data = trim($data);
                                        $data = stripslashes($data);
                                        $data = htmlspecialchars($data);
                                        return $data;
                                    }

                                    if (isset($_POST['do_post']))
                                    {
                                        $errors = array();
                                        if (empty($_POST["name"])) {
                                            $errors[] = $nameErr = "Please enter name!";
                                        } else {
                                            $name = test_input($_POST["name"]);
                                        }

                                        if (empty($_POST["nickname"])) {
                                            $errors[] = $nicknameErr = "Please enter nickname!";
                                        } else {
                                            $nickname = test_input($_POST["nickname"]);
                                        }

                                        if (empty($_POST["email"])) {
                                            $errors[] = $emailErr = "Please enter email!";
                                        } else {
                                            $email = test_input($_POST["email"]);
                                        }

                                        if (empty($_POST["message"])) {
                                            $errors[] = $messageErr = "Please enter comment!";
                                        } else {
                                            $message = test_input($_POST["message"]);
                                        }
                                        if (empty($errors))
                                        {
                                            mysqli_query($connect, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`) VALUES ('".mysqli_real_escape_string($connect,$_POST['name'])."', '".mysqli_real_escape_string($connect,$_POST['nickname'])."', '".mysqli_real_escape_string($connect,$_POST['email'])."', '".mysqli_real_escape_string($connect,$_POST['message'])."', NOW(), '".$art['id']."')" );
                                            echo '<div style="color:green; font-weight: 700; margin-bottom: 10px;">Comment add successful!!!</div>';
                                            unset($_POST['name'], $_POST['nickname'], $_POST['email'], $_POST['message']);
                                            $url = 'article.php?id=' . $art['id'];
                                            header('Location: ' . $url);
                                        }
                                    }
                                    ?>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="text" name="name" placeholder="Name" class="form-control form-input-name reset" value="<?php echo htmlspecialchars($_POST['name'])?>" autofocus="autofocus">
                                            </div>
                                            <div class="error-comment"><?php echo $nameErr;?></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                                <input type="text" name="nickname" placeholder="Nickname" class="form-control form-input-nickname reset" value="<?php echo htmlspecialchars($_POST['nickname'])?>" autofocus="autofocus">
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
                                        <div class="col-lg-12 col-md-12 mx-auto">
                                            <button type="submit" name="do_post" class="btn fill pull-right">Send <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                            <button type="reset" value="Reset" name="reset" class="btn fill sub">Reset <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </article>
            <hr>
            <?php
        }
    ?>

<?php include 'pages/footer.php'?>
<script>
//    jQuery('.sub').submit(function (e) {
//        e.preventDefault();
//        var input_name = jQuery('.form-input-name').val();
//        var input_nickname = jQuery('.form-input-nickname').val();
//        var input_email = jQuery('.form-input-email').val();
//        var input_message = jQuery('.form-input-message').val();
//        var formData = {
//            'name': input_name,
//            'nickname': input_nickname,
//            'email': input_email,
//            'message': input_message
//        };
//        jQuery.ajax({
//            type: 'POST',
//            url: $(this).prop('href'),
//            data: formData,
//            dataType: 'json',
//            encode: true,
//            success: function (res) {
//                $('.reset').val('');
//            }
//        })
//    })

$(document).ready(function(){
    $('.sub').click(function(){
        var url = $(this).prop('href');
        console.log(url);
        $.ajax({url: url, success: function(result){
            $('.reset').val('');
        }});
    });
});
</script>