<div class="title-content">
    <h1><?php the_title(); ?></h1>
    <?php if (function_exists('the_subtitle')) { ?>
        <h2><?php echo the_subtitle(); ?></h2>
    <?php } ?>
</div>