<?php get_header(); ?>
  <div class="row">
    <div class="col-md-8 post">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <p>
          <small class="text-muted">
            By <?php the_author_posts_link(); ?> | <?php get_date(); ?> | Category: <?php retrotheme_category_pills(); ?><br />
            Tags: <?php the_tags('<span class="tags"><span class="badge badge-pill badge-default">', '</span><span class="badge badge-pill badge-default">', '</span></span>'); ?>
          </small>
        </p>
        <ul class="breadcrumb">
          <?php the_breadcrumb(); ?>
        </ul>
        <hr>
        <div class="content">
          <?php 
            if (the_top_category()->slug == 'study-sheets') {
              $content = get_the_content( $more_link_text, $strip_teaser );
              $content = apply_filters( 'the_content', $content );
              $content = str_replace( ']]>', ']]&gt;', $content );
              echo $content;
            } else {
              the_content(); 
            }
          ?>
        </div>
        <?php if ( comments_open() || get_comments_number() ) : ?>
          <div class="comments">
            <?php comments_template(); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; else: ?>
        <p><?php _e('Sorry, this page does not exist'); ?></p>
      <?php endif; ?>
    </div>
    <div class="col-md-4 sidebar">
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>