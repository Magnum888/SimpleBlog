<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mx-auto">
                <p class="title-comments">All Comments:</p>
                <hr>
            </div>
        </div>
        <div style="color:green; font-weight: 700; margin-bottom: 10px;"><?php echo $delete_success;?></div>
        <?php if(mysqli_num_rows($comments) <= 0) {echo "Do`t have comments";}
        while ($comment = mysqli_fetch_assoc($comments)) { ?>
            <div class="comments-article col-lg-12 col-md-12 mx-auto">
                <form action="admin.php?id=<?php echo htmlspecialchars($comment['id'])?>" method="POST">
                    <button type="submit" name="delete_comment" class="btn btn-danger rounded">Delete</button>
                </form>
                <div>
                    <span>Comment by:</span>
                    <span class="author-comment"><?php echo strip_tags($comment['author']); ?></span>
                    <span class="date-comment"><?php echo $comment['pubdate']; ?></span>
                </div>
                <div class="text-comment">
                    <?php echo strip_tags($comment['text']);?>
                </div>
            </div>
            <hr>
        <?php } ?>
    </div>
</article>