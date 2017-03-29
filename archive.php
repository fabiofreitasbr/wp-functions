<?php 
get_header();
?>
<main class="container list-posts">
    <?php 
        if (have_posts()) {while (have_posts()) {
            the_post();
            ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="single-list">
                    <?php
                    $thumbnail = get_the_post_thumbnail($post->ID, 'medium'); 
                    if ($thumbnail) {
                        ?>
                        <div class="post-thumbnail">
                            <?php echo $thumbnail; ?>
                        </div>
                        <?php 
                    }
                    else {
                        ?>
                        <div class="post-thumbnail">
                            <img src="https://cdn3.iconfinder.com/data/icons/fillies-small/64/photo-512.png" class="img-responsive" style="opacity: 0.2;" alt="">
                        </div>
                        <?php 
                    }
                    ?>
                    <h1><?php echo the_title(); ?></h1>
                    <p><?php echo the_excerpt(); ?></p>
                </div>
            </div>
            <?php
        }} 
    ?>
</main>
<?php
get_footer();
?>