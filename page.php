<?php 
get_header();
get_template_part('inc/element/widget', 'fastlink');
?>
<div class="container">
    <div class="breadcrumb-page">
        <span class="link-bc"><a href="">Home</a></span>
        <span class="separator"><i class="fa fa-angle-right"></i></span>
    </div>
    <div class="row">
    <?php 
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            
            get_template_part('inc/element/widget', 'aside');
            ?>
            <main class="col-md-9">
                <div class="row">
                    <?php
                    get_template_part('inc/element/part', 'title');
                    the_content();
                    ?>
                </div>
            </main>
            <?php
        }
    }
    else {

    }
    ?>
    </div>
</div>
<?php
get_footer();
?>