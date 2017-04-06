<?php get_header(); ?>
  <div class="row">
    <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-8'); ?>>
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
        <?php if (the_top_category() == 'study-sheets'): ?>
          <p>
            This is a study sheet. To get that nice print layout that I usually have, just try to print, and it should automatically fix up the layout. For best results, please use the latest version of Chrome.
            Clicking terms will try to find a Wikipedia page which matches the term.
          </p>
        <?php endif; ?>
        <hr>
        <!-- Responsive Ad -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-4770009561063252"
            data-ad-slot="2316025320"
            data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <hr>
        <div class="content">
          <?php the_content(); ?>
        </div>
        <?php wp_link_pages(array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'retrotheme') . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
          ));
        ?>
        <hr>
        <!-- Responsive Ad -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-4770009561063252"
            data-ad-slot="2316025320"
            data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <hr>
        <?php if ( comments_open() || get_comments_number() ) : ?>
          <div class="comments">
            <?php comments_template(); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; else: ?>
        <p><?php _e('Sorry, this page does not exist', 'retrotheme'); ?></p>
      <?php endif; ?>
    </div>
    <div class="col-md-4 sidebar">
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>