<?php 
  get_header();
?>
<div class="row">
  <div class="col-md-8">
    <?php if (have_posts()): ?>
      <h1>Posts by <?php echo the_author_meta('display_name'); ?></h1>
      <p>
        <small class="text-muted"><?php the_author_meta('description'); ?></small>
      </p>
      <ul class="breadcrumb">
        <?php the_breadcrumb(); ?>
      </ul>
      <hr> 
      <?php while (have_posts()): the_post(); ?>
        <div class="list-group">
          <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
            <h4 class="list-group-item-heading"><?php the_title(); ?></h4>
            <p class="list-group-item-text text-muted"><?php get_date(); ?></p>
          </a>
        </div>
      <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts found.'); ?></p>
    <?php endif; ?>
  </div>
  <div class="col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>