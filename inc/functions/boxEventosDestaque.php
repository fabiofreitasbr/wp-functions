<?php 
function boxEventosDestaque() {
    function contentEventosDestaque() {
        ?>
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ft-event-featured">
            <a href="<?php the_permalink(); ?>"><h3 class="title-event-featured"><?php the_title(); ?></h3></a>
            <div class="cat-event-featured"><?php the_excerpt(); ?></div>
            <div class="info-event-featured"><?php the_field('estado'); ?><br />De <?php echo strftime("%d/%m/%Y", strtotime(get_field('data_inicial'))); ?> a <?php echo strftime("%d/%m/%Y", strtotime(get_field('data_final'))); ?></div>
        </div>
        <?php
    }
    $contadorPost = 0;
    $postImprited = array();
    $quantidade = 4;
    for ($n = 1; $n <= $quantidade; $n++) {
        $boxAtual = get_theme_mod('eventos_destaque_post_'.$n);
        $eventosDestaque = array(
            'p'     => $boxAtual
        );
        $queryEventos = new WP_Query($eventosDestaque);
        while ($queryEventos->have_posts()) {
            $queryEventos->the_post();
            $postImprited[] = get_the_ID();
            contentEventosDestaque();
            $contadorPost++;
        }
    }

    if ($contadorPost < $quantidade) {
        $contList = $quantidade - $contadorPost;
        $eventosDestaque = array(
            'post_type'     => 'curso-evento',
            'meta_key'      => 'exibir_home',
            'meta_value'    => true,
            'post__not_in'       => $postImprited,
            'posts_per_page' => $contList,
            'tax_query' => array(
                array(
                    'taxonomy' => 'cursoseventoscat',
                    'field'    => 'term_id',
                    'terms'    => 150,
                )
            )
        );
        $queryEventos = new WP_Query($eventosDestaque);
        while ($queryEventos->have_posts()) {

            $queryEventos->the_post();
            $postImprited[] = get_the_ID();
            contentEventosDestaque();
            $contadorPost++;
        }
    }

    if ($contadorPost < $quantidade) {
        $contList = $quantidade - $contadorPost;
        $eventosDestaque = array(
            'post_type'     => 'curso-evento',
            'posts_per_page' => $contList,
            'post__not_in'       => $postImprited,
            'tax_query' => array(
                array(
                    'taxonomy' => 'cursoseventoscat',
                    'field'    => 'term_id',
                    'terms'    => 150,
                )
            )
        );
        $queryEventos = new WP_Query($eventosDestaque);
        while ($queryEventos->have_posts()) {
            $queryEventos->the_post();
            contentEventosDestaque();
            $contadorPost++;
        }
    }
}
?>