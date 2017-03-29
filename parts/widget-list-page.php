<div class="menu-inst col-lg-3 col-md-3 col-sm-12">
<?php 
if (is_page()) {
    $pagina_pai = get_post($post->post_parent);
    $id_pai = $pagina_pai->ID;
    $page_pai = array(
        'post_type' => 'page',
        'post_parent' => $id_pai
    );
    $listar_pai = new WP_Query($page_pai);
    if ($listar_pai->have_posts()) {
        ?>
			<div class="sidebar-inst">
				<div class="menu-institucional-container">
					<ul id="menu-institucional" class="menu">
	                    <?php 
		                    while ($listar_pai->have_posts()) {
		                        $listar_pai->the_post();
		                    ?>
								<li class="menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php
		                    }
		                ?>
					</ul>
				</div>
			</div>
        <?php 
    }
    wp_reset_query();
}
?>
</div>