<?php 


function wooComment() {
    global $post, $wp_query;
    $args = array(
        'post_type' => 'product',
        'post_id' => $post->ID, 
    );
    $comments = get_comments($args);
    if ($comments) :
        foreach($comments as $comment) :
            ?>
            <div class="comments">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs avatar">
                        <div class="avatar-image" style="background-image: url('<?php echo get_avatar_url($comment->comment_author_email); ?>');"></div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-9">
                        <div class="panel panel-comment">
                            <div class="panel-body">
                                <div class="arrow hidden-xs"></div>
                                <header class="text-left">
                                    <div class="box-ranking">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="comment-user"><?php echo $comment->comment_author; ?></div>
                                    <time class="comment-date" datetime="18-05-2017 13:18"><i class="fa fa-clock-o"></i> <?php echo strftime("%d/%m/%Y", strtotime($comment->comment_date)); ?></time>
                                </header>
                                <div class="comment-post">
                                    <p>
                                    <?php echo $comment->comment_content; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    else :
        ?>
            <div class="comments">
                <p>SEJA O PRIMEIRO A COMENTAR</p>
            </div>
            <?php
    endif;
}

function wooCommentForm( $args = array(), $post_id = null ) {
    if ( null === $post_id )
        $post_id = get_the_ID();

    if ( ! comments_open( $post_id ) ) {
        do_action( 'comment_form_comments_closed' );
        return;
    }
 
    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
 
    $args = wp_parse_args( $args );
    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
 
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );
    $html5    = 'html5' === $args['format'];
    $fields   =  array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
        'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                    '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>',
    );
 
    $required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );

    $fields = apply_filters( 'comment_form_default_fields', $fields );
    $defaults = array(
        'fields'               => $fields,
        'comment_field'        => '
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="' . _x( 'Comment', 'noun' ) . '" id="comment" name="comment" maxlength="65525" aria-required="true" required="required"></textarea>
                </div>',
        'must_log_in'          => '<p class="must-log-in">' . sprintf(
                                    /* translators: %s: login URL */
                                          __( 'Para enviar um comentário entre em sua conta. <a href="%s"><i class="fa fa-sign-in"></i> Clique aqui!</a>' ),
                                         /*  wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) */
                                         get_permalink( get_option('woocommerce_myaccount_page_id') )
                                ) . '</p>',
        /** This filter is documented in wp-includes/link-template.php */
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf(
              __( '<h3><a href="%1$s" aria-label="%2$s">%3$s</a></h3> <a href="%4$s">Deseja sair?</a>' ),
              get_permalink( get_option('woocommerce_myaccount_page_id') ) /* get_edit_user_link() */,
              /* translators: %s: user name */
              esc_attr( sprintf( __( '%s.' ), $user_identity ) ),
              $user_identity,
              wp_logout_url( get_permalink( wc_get_page_id( 'shop' ) ) ) /* wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) */
        ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
        'comment_notes_after'  => '',
        'action'               => site_url( '/wp-comments-post.php' ),
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_form'           => 'comment-form',
        'class_submit'         => 'btn btn-default',
        'name_submit'          => 'submit',
        'title_reply'          => __( 'Avalie o hotel e deixe seu comentário' ),
        'title_reply_to'       => __( 'Leave a Reply to %s' ),
        'title_reply_before'   => '<p class="title-coment">',
        'title_reply_after'    => '</p>',
        'cancel_reply_before'  => ' <small>',
        'cancel_reply_after'   => '</small>',
        'cancel_reply_link'    => __( 'Cancelar' ),
        'label_submit'         => __( 'Enviar Comentário' ),
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field'         => '<div class="form-group text-right">%1$s %2$s</div>',
        'format'               => 'xhtml',
    );
 
    $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
 
    $args = array_merge( $defaults, $args );

    do_action( 'comment_form_before' );
    if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) :
        echo $args['must_log_in'];
        do_action( 'comment_form_must_log_in_after' );
    else :
    ?>
    <form action="<?php echo esc_url( $args['action'] ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="<?php echo esc_attr( $args['class_form'] ); ?>"<?php echo $html5 ? ' novalidate' : ''; ?>>
         <div class="comment-form col-md-12">
            <div class="row">
                <?php
                do_action( 'comment_form_top' );
 
                if ( is_user_logged_in() ) :

                    echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

                    do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
 
                else :
 
                    echo $args['comment_notes_before'];
 
                endif;
 
                echo $args['title_reply_before'];
         
                comment_form_title( $args['title_reply'], $args['title_reply_to'] );
         
                echo $args['cancel_reply_before'];
                
                $comment_fields = array( 'comment' => $args['comment_field'] ) + (array) $args['fields'];
 
                $comment_fields = apply_filters( 'comment_form_fields', $comment_fields );
 
                $comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );
 
                $first_field = reset( $comment_field_keys );
                $last_field  = end( $comment_field_keys );
 
                foreach ( $comment_fields as $name => $field ) {
 
                    if ( 'comment' === $name ) {

                        echo apply_filters( 'comment_form_field_comment', $field );
 
                        echo $args['comment_notes_after'];
 
                    } elseif ( ! is_user_logged_in() ) {
 
                        if ( $first_field === $name ) {

                            do_action( 'comment_form_before_fields' );
                        }
 
                        echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
 
                        if ( $last_field === $name ) {

                            do_action( 'comment_form_after_fields' );
                        }
                    }
                }
                ?>

                <div class="form-group">
                    <div class="rating-box">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                    </div>
                </div>
                <?php 
                    $submit_button = sprintf(
                        $args['submit_button'],
                        esc_attr( $args['name_submit'] ),
                        esc_attr( $args['id_submit'] ),
                        esc_attr( $args['class_submit'] ),
                        esc_attr( $args['label_submit'] )
                    );

                    $submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );
     
                    $submit_field = sprintf(
                        $args['submit_field'],
                        $submit_button,
                        get_comment_id_fields( $post_id )
                    );

                    echo apply_filters( 'comment_form_submit_field', $submit_field, $args );
                ?>
            </div>
        </div>
        <?php do_action( 'comment_form', $post_id ); ?>
    </form>
    <?php
    endif;
    do_action( 'comment_form_after' );
}

?>