<figure class="snip1336">
    <img src="/img/bg-profile.jpg" alt="sample69" />
    <figcaption>
        <img src="/img/man.png" alt="profile-sample5" class="profile" />
        <h2><?php echo $_SESSION['name'];?><span>User profile</span></h2>
        <p>Welcome to <?php echo $config['title'];?>. On the personal page you have the opportunity to view the data at registration and all the comments.</p>
        <p><i class="fa fa-envelope-o" aria-hidden="true"> </i><?php echo $_SESSION['email'];?></p>
        <div class="col-lg-12 col-md-12 mx-auto">
            <p class="title-comments">Comments:</p>
            <hr>
        </div>
        <div style="color:green; font-weight: 700; margin-bottom: 10px;"><?php echo $delete_success;?></div>
        <?php if($rowUserComments <= 0) {echo $absentComment;}
        while ($userComment = mysqli_fetch_assoc($userComments)) { ?>
            <div class="comments-article col-lg-12 col-md-12 mx-auto">
                <form action="admin.php?id=<?php echo $userComment['id']?>" method="POST">
                    <button type="submit" name="delete_comment" class="btn btn-danger rounded">Delete comment</button>
                </form>
                <div>
                    <span>Comment written at:</span>
                    <span class="date-comment"><?php echo $userComment['pubdate']; ?></span>
                </div>
                <div class="text-comment">
                    <?php echo strip_tags($userComment['text']);?>
                </div>
            </div>
            <hr>
        <?php } ?>
        <a href="#" class="follow">Follow</a>
        <a href="#" class="info">More Info</a>
    </figcaption>
</figure>
<!--<script>-->
<!--    $(".hover").mouseleave(-->
<!--        function () {-->
<!--            $(this).removeClass("hover");-->
<!--        }-->
<!--    );-->
<!--</script>-->