<figure class="snip1336">
    <img src="/img/bg-profile.jpg" alt="sample69" />
    <figcaption>
        <img src="/img/man.png" alt="profile-sample5" class="profile" />
        <h2><?php echo $profile['login'];?><span>User profile</span></h2>
        <p>Welcome to <?php echo $config['title'];?>. On the personal page you have the opportunity to view the data at registration and all the comments.</p>
        <p><i class="fa fa-envelope-o" aria-hidden="true"> </i><?php echo $profile['email'];?></p>
        <?php if($rowUserComments <= 0) {echo $absentComment;}
        while ($userComment) { ?>
            <div class="comments-article col-lg-12 col-md-12 mx-auto">
                <button type="submit" class="btn btn-danger rounded">Delete comment</button>
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
<script>
    $(".hover").mouseleave(
        function () {
            $(this).removeClass("hover");
        }
    );
</script>