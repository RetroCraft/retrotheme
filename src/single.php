<?php get_header(); ?>
  <div class="row">
    <div class="col-md-8">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <p>
          <small class="text-muted">
            By <?php the_author_posts_link(); ?> | <?php get_date(); ?> | Category: <?php retrotheme_category_pills(); ?><br />
          </small>
          Tags: <?php the_tags('<span class="tags"><span class="tag tag-pill tag-default">', '</span><span class="tag tag-pill tag-default">', '</span></span>'); ?>
        </p>
        <ul class="breadcrumb">
          <?php the_breadcrumb(); ?>
        </ul>
        <hr>
        <?php the_content(); ?>
        <?php if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif; ?>
      <?php endwhile; else: ?>
        <p><?php _e('Sorry, this page does not exist'); ?></p>
      <?php endif; ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>