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
            <aside class="widget-blog col-md-3">
                <ul>
                    <?php 
                    while ($listar_pai->have_posts()) {
                        $listar_pai->the_post();
                        ?>
                        <li><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-double-right"></i> <?php the_title(); ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </aside>
        <?php 
    }
    wp_reset_query();
}
?>