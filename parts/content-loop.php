<article class="noticia">
    <div class="media">
        <?php 
            if (get_the_post_thumbnail()) {
                ?>
                <div class="media-left media-middle">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                </div>
                <?php
            }
        ?>
        <div class="media-body">
            <h4 class="media-heading"><?php the_title(); ?></h4>
            <?php the_excerpt(); ?>
            <div class="date-button">
                <span><?php echo get_the_date("d/m/Y H\hi"); ?></span>
                <a href="<?php echo get_permalink(); ?>"><button><i class="fa fa-angle-right"></i> Veja Mais</button></a>
            </div>
        </div>
    </div>
</article>