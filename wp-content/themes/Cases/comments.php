<?php
// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
 
    if ( post_password_required() ) { ?>
        <p class="nocomments"><?php esc_html_e('Este artigo está protegido por password. Insira-a para ver os comentários.'); ?></p>
    <?php
        return;
    }
?>
 
<div id="comments">
    <h3><?php comments_number('0 Comentários', '1 Comentário', '% Comentários' );?></h3>
 
    <?php if ( comments_open() ) : ?>
 
        <div id="respond">
            <h3>Deixe o seu comentário!</h3>
 
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <div class="form-group form-comment">
                    <label for="comment"><?php esc_html_e('Comentários:'); ?></label>
                    <textarea name="comment" id="comment" rows="" cols="" placeholder="<?php traducao('Comentário', 'Comment', 'Comentario'); ?>"></textarea>
                </div>

                <?php if ( $user_ID ) : ?>

                <div class="form-group">
                    <p><?php esc_html_e('Autentificado como'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php esc_html_e('Sair desta conta'); ?>"><?php esc_html_e('Sair desta conta &raquo;'); ?></a></p>
     
                <?php else : ?>

                <div class="form-group">
                    <!-- <label for="author">Nome:</label> -->
                    <input type="text" name="author" id="author" placeholder="<?php esc_html_e('Nome*'); ?>" value="<?php echo $comment_author; ?>" />
                </div>
 
                <div class="form-group form-email">
                    <!-- <label for="email">Email:</label> -->
                    <input type="text" name="email" id="email" placeholder="<?php esc_html_e('Email'); ?>*" value="<?php echo $comment_author_email; ?>" />
 
                <!-- <div class="form-group"> -->
                    <!-- <label for="url">Website:</label>
                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" /> -->
 
                <?php endif; ?>
 
                    <input type="submit" class="commentsubmit" value="<?php esc_html_e('Enviar Comentário'); ?>" />
                </div>

                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
        </form>
        <p class="cancel"><?php cancel_comment_reply_link('Cancelar Resposta'); ?></p>
        </div>
     <?php else : ?>
        <!-- <h3>Os comentários estão fechados.</h3> -->
    <?php endif; ?>

    <?php if ( have_comments() ) : ?>
        <h3> Comentários </h3>
        <ol class="commentlist">
        <?php $args = array(
            'walker'            => null,
            'max_depth'         => '',
            'style'             => 'ul',
            'callback'          => null,
            'end-callback'      => null,
            'type'              => 'all',
            'reply_text'        => null,
            'page'              => '',
            'per_page'          => '',
            'avatar_size'       => 32,
            'reverse_top_level' => null,
            'reverse_children'  => '',
            'format'            => 'xthml', // or 'xhtml' if no 'HTML5' theme support
            'short_ping'        => false,   // @since 3.6
            'echo'              => true     // boolean, default is true
        ); ?>
        <?php wp_list_comments($args); ?>
    </ol>
 
        <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="pagination">
        <ul>
            <li class="older"><?php previous_comments_link('Anteriores'); ?></li>
            <li class="newer"><?php next_comments_link('Novos'); ?></li>
        </ul>
    </div>
    <?php endif; ?>
 
    <?php endif; ?>
</div>