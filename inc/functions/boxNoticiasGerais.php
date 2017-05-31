<?php 
function boxNoticiasGerais() {
    function contentNoticiasGerais($modelBox = 2) {
        if (!get_the_post_thumbnail() || $modelBox == 1) {
            ?>
            <article class="model-article-home">
                <a href="<?php echo the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <p><?php the_excerpt(); ?></p>
            </article>
            <?php
        }
        else if ($modelBox == 2) {            
            ?>
            <article class="model-article-home">
                <div class="img-noticia" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                <a href="<?php echo the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <p><?php the_excerpt(); ?></p>
            </article>
            <?php
        }
        else if ($modelBox == 3) {
            ?>
            <article class="model-article-home">
                <div class="row">
                    <div class="col-md-5 col-sm-4 col-xs-12"><div class="img-noticia" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div></div>
                    <div class="col-md-7">
                        <div class="space-out">
                            <a href="<?php echo the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>
            </article>
            <?php
        }
    }

    $contadorPost = 0;
    $postImprited = array();
    $quantidade = 5;
    for ($n = 1; $n <= $quantidade; $n++) {
        $boxAtual = get_theme_mod('noticias_destaque_post_'.$n);
        $eventosDestaque = array(
            'p'     => $boxAtual
        );
        $queryEventos = new WP_Query($eventosDestaque);
        while ($queryEventos->have_posts()) {
            $queryEventos->the_post();
            $postImprited[] = get_the_ID();
            contentNoticiasGerais();
            $contadorPost++;
        }
    }

    if ($contadorPost < $quantidade) {
        $contList = $quantidade - $contadorPost;
        $eventosDestaque = array(
            'post_type'     => 'notic-comunic',
            'meta_key'      => 'exibir_home',
            'meta_value'    => true,
            'post__not_in'  => $postImprited,
            'posts_per_page' => $contList,
            'tax_query' => array(
                array(
                    'taxonomy' => 'noticcomuniccat',
                    'field'    => 'term_id',
                    'terms'    => 151,
                )
            )
        );
        $queryEventos = new WP_Query($eventosDestaque);
        while ($queryEventos->have_posts()) {

            $queryEventos->the_post();
            $postImprited[] = get_the_ID();
            contentNoticiasGerais();
            $contadorPost++;
        }
    }

    if ($contadorPost < $quantidade) {
        $contList = $quantidade - $contadorPost;
        $eventosDestaque = array(
            'post_type'     => 'notic-comunic',
            'posts_per_page' => $contList,
            'post__not_in'       => $postImprited,
            'tax_query' => array(
                array(
                    'taxonomy' => 'noticcomuniccat',
                    'field'    => 'term_id',
                    'terms'    => 151,
                )
            )
        );
        $queryEventos = new WP_Query($eventosDestaque);
        while ($queryEventos->have_posts()) {
            $queryEventos->the_post();
            contentNoticiasGerais();
            $contadorPost++;
        }
    }
}
?>