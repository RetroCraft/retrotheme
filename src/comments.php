<div id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
    <hr>
    <h5>
      <?php
      printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'retrotheme' ),
        number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
        ?>
    </h5>

    <ul class="list-group">
      <?php
        wp_list_comments(array(
          'style'       => 'ul',
          'short_ping'  => true,
          'callback'    => 'retrotheme_comments_callback',
        ));
      ?>
    </ul>

    <hr>

    <?php if (get_comment_pages_count() > 1 && get_option( 'page_comments' )): ?>
      <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'retrotheme' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Back', 'retrotheme' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Next &rarr;', 'retrotheme' ) ); ?></div>
      </nav>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number()): ?>
      <p class="no-comments"><?php _e( 'Comments are closed.' , 'retrotheme' ); ?></p>
    <?php endif; ?>

  <?php endif; ?>

  <?php
    if (null === $post_id)
      $post_id = get_the_ID();
    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req = get_option('require_name_email');

    comment_form(array(
      'title_reply' => 'Leave a comment',
      'comment_notes_before' => '
        <p class="text-muted">' . __('Your email address will be kept private.') . ( $req ? ' All fields are required.' : '') . '</p>
      ',
      'logged_in_as'  => sprintf(
          __('<p class="text-muted">Logged in as <a href="%1$s" aria-label="%1$s">%3$s</a>. <a href="%4$s">Log out?</a>', 'retrotheme'),
          get_edit_user_link(),
          esc_attr(sprintf(__('Logged in as %s. Edit your profile.', 'retrotheme'), $user_identity)),
          $user_identity,
          wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))
        ) . '</p>',
      'comment_field' => '
        <div class="form-group row">
           <label for="comment" class="col-sm-2 col-form-label text-xs-right">' . __('Comment') . '</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="comment" id="comment"></textarea>
            </div>
        </div>
      ',
      'fields' => array(
        'author' => '
          <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label text-xs-right">' . __('Name') . '</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="author" id="author" value="' . esc_attr($commenter['comment_author']) . '" />
            </div>
          </div>',
        'email' => '
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label text-xs-right">' . __('Email') . '</label>
            <div class="col-sm-10">
              <input class="form-control" type="email" name="email" id="email" value="' . esc_attr($commenter['comment_author_email']) . '" />
            </div>
          </div>'
      ),
      'submit_field' => '
        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">%1$s %2$s</div>
        </div>
      ',
      'title_reply_before' => '<h5>',
      'title_reply_to' => 'Reply to %s ',
      'title_reply_after' => '</h5>',
      'cancel_reply_before' => '<small class="text-muted">',
      'cancel_reply_link' => 'Cancel',
      'cancel_reply_after' => '</small>',
      'label_submit' => 'Comment',
      'class_submit' => 'btn btn-outline-primary'
    ));
  ?>
</div>