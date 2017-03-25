<?php get_header(); ?>
<div class="row">
  <div class="col-md-8">
    <h1>Posts</h1>
    <hr>
    <?php if (have_posts()): ?>
      <div class="list-group">
        <?php while (have_posts()): the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h4 class="mb-1"><?php the_title(); ?></h4>
              <small><?php get_date(); ?></small>            
            </div>
            <small>By <?php the_author(); ?></small>
            <?php retrotheme_category_pills(); ?>
          </a>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <p><?php _e('Sorry, no posts found.', 'retrotheme'); ?></p>
    <?php endif; ?>
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>