<?php
/**
 * Comments Template
 *
 * @package Insuffle
 * @since 1.0.0
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf(
                    /* translators: 1: post title */
                    esc_html__( 'Un commentaire sur &ldquo;%1$s&rdquo;', 'insuffle' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: post title */
                    esc_html( _nx( '%1$s commentaire sur &ldquo;%2$s&rdquo;', '%1$s commentaires sur &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'insuffle' ) ),
                    number_format_i18n( $comment_count ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 60,
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, display a message
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Les commentaires sont fermés.', 'insuffle' ); ?></p>
            <?php
        endif;

    endif; // Check for have_comments()

    comment_form(
        array(
            'class_submit' => 'btn',
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h3>',
        )
    );
    ?>

</div><!-- #comments -->
