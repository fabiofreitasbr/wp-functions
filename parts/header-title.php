<?php 
$fundoHeader = get_bloginfo('template_url') . '/img/institucional.jpg';
if (is_page()) {
    if (get_the_post_thumbnail()) {
        $fundoHeader = get_the_post_thumbnail_url();
    }
}
    ?>
    <div class="container-fluid bg-title-page" style="background-image: url('<?php echo $fundoHeader; ?>');">
        <div class="container title-page">
			<h1 class="text-uppercase"><?php titleName(); ?></h1>
		</div>
	</div>
	<?php

?>