<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mx-auto">
                <p class="title-comments">Comments:</p>
                <hr>
            </div>
        </div>
        <?php if(mysqli_num_rows($comments) <= 0) {echo "Do`t have comments";}
        while ($comment = mysqli_fetch_assoc($comments)) { ?>
            <div class="comments-article col-lg-12 col-md-12 mx-auto">
<!--                <a class="add-comment-link btn btn-2" href="#form-comment">Add comment&#8595;</a>-->
                <button type="submit" class="btn btn-danger rounded">Delete comment</button>
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