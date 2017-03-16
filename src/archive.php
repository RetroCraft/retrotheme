<?php get_header(); ?>
<div class="row">
  <div class="col-md-8">
    <?php if (have_posts()): ?>
      <h1><?php the_archive_title(); ?></h1>
      <p>
        <small class="text-muted"><?php the_archive_description(); ?></small>
      </p>
      <ul class="breadcrumb">
        <?php the_breadcrumb(); ?>
      </ul>
      <hr> 
      <div class="list-group">
        <?php while (have_posts()): the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h4 class="mb-1"><?php the_title(); ?></h4>
              <small><?php get_date(); ?></small>            
            </div>
            <?php the_excerpt(); ?>
            <small>By <?php the_author(); ?></small>
          </a>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <p><?php _e('Sorry, no posts found.'); ?></p>
    <?php endif; ?>
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>