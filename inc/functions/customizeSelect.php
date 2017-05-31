<?php 
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * Class to create a custom post control
 */
class Destaques_Conteudos_Custom_Control extends WP_Customize_Control {
    private $posts = false;
    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $postType = ($args['post_type']) ? $args['post_type'] : 'notic-comunic';
        $taxonomy = ($args['taxonomy']) ? $args['taxonomy'] : 'noticcomuniccat';
        $field = ($args['field']) ? $args['field'] : 'term_id';
        $category = ($args['category']) ? $args['category'] : 151;
        $postargs = wp_parse_args($options, array(
            'numberposts'   => '-1',
            'post_type'     => $postType,
            'meta_key'      => 'exibir_home',
            'meta_value'    => true,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => $field,
                    'terms'    => $category,
                ),
            )
        ));
        $this->posts = get_posts($postargs);
        parent::__construct( $manager, $id, $args );
    }
    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
    {
        if(!empty($this->posts))
        {
            ?>
                <label>
                    <span class="customize-post-dropdown"><?php echo esc_html( $this->label ); ?></span>
                    <select name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>" class="selectpicker" data-show-subtext="true" data-live-search="true">
                    <?php
                        foreach ( $this->posts as $post )
                        {
                            printf('<option value="%s" %s>%s</option>', $post->ID, selected($this->value(), $post->ID, false), $post->post_title);
                        }
                    ?>
                    </select>
                </label>
            <?php
        }
    }
}
?>