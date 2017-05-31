<?php 
get_header();
?>
<div class="container">
    <div class="row">
        <aside class="col-md-12 filtro">
            <div class="count"></div>
			<?php
            if (have_posts()) {
                woocommerce_content();
            }
            ?>
		</div>
	</div>
</div>
<?php 
get_footer();
?>