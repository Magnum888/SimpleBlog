<div class="row">
    <div class="col-lg-10 col-md-10 mx-auto">
        <div class="row new-article">
            <div class="owl-carousel owl-theme">
                <?php foreach ($articles as $art)
                {
                    ?>
                    <div class="article item" style="background: url('<?php echo $art['image']; ?>');background-repeat: no-repeat;background-position: center; background-color: #c4d7ff; ">
                        <h4 class="title-article"><a href="../article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a></h4>
                        <div>
                            <span class="author-article"><?php echo $art['author']; ?></span>
                            <span class="date-article"><?php echo $art['date']; ?></span>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>