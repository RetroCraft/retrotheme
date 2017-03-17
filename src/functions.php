<?php
  function retrotheme_setup() {
    register_nav_menu('primary', __('Primary navigation', 'retrotheme'));
  }

  add_action('after_setup_theme', 'retrotheme_setup');

  function retrotheme_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js');
    wp_enqueue_script('skrollr', 'https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js');
    wp_enqueue_script('cheet', 'https://cdn.rawgit.com/namuol/cheet.js/master/cheet.min.js');
    wp_enqueue_script('mathjax', 'https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML');
    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array('jquery', 'tether'));
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery', 'bootstrap', 'skrollr', 'mathjax'));

    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css');
    if (is_front_page())
      wp_enqueue_style('home', get_template_directory_uri() . '/css/home.css');
  }

  add_action('wp_enqueue_scripts', 'retrotheme_scripts');

  function retrotheme_widgets_init() {
      register_sidebar(array(
        'name'          => 'Post Sidebar',
        'id'            => 'post',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
      ));

      register_sidebar(array(
        'name'          => 'Footer',
        'id'            => 'footer',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
      ));
  }

  add_action('widgets_init', 'retrotheme_widgets_init');

  function retrotheme_comments_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;

    ?>

    <li <?php comment_class('list-group-item'); ?> id="li-comment-<?php comment_ID(); ?>">
      <div class="media">
        <div class="media-left"><?php echo get_avatar($comment, 64); ?></div>
        <div class="media-body">
          <?php comment_text(); ?>

          <p class="text-muted list-group-item-text">
            <?php
              printf(__('Comment by %s', 'retrotheme'), get_comment_author_link());
              echo ' | ';
              comment_reply_link(array_merge($args, array(
                'reply_text' => __('Reply', 'retrotheme'),
                'depth' => $depth,
                'max_depth' => $args['max_depth']
              )));
            ?>
          </p>
        </div>
      </div>
    </li>

    <?php
  }

  function retrotheme_category_pills() {
    global $wp_query;

    $categories = get_the_category();

    foreach ($categories as $category) {
      echo '<span class="badge badge-pill badge-default">' . $category->name . '</span> ';
    }
  }

  function retrotheme_markdown($content) {
    $p = new SuperMarkdown();
    if (is_single() && in_the_loop() && is_main_query())
      $p->category = the_top_category()->slug;
    return $p->parse($content);
  }

  add_filter('the_content', 'retrotheme_markdown', 0);

  function the_top_category() {
    $category = get_the_category(); 
    $parent = get_ancestors($category[0]->term_id,'category');
    if (empty($parent)) {
      $parent[] = array($category[0]->term_id);
    }
    $parent = array_pop($parent);
    $parent = get_category($parent); 

    return $parent;
  }

  function get_date() {
    date_i18n(get_option('date_format'), the_date());
  }

  function the_breadcrumb() {
    global $wp_query;

    // Home
    echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . get_bloginfo('name') . '</a></li>';

    if (is_single() || is_category()) {
      // Get category, if one exists
      if (is_single()) {
        $categories = get_the_terms(get_the_ID(), 'category');
        $category = $categories[0];
      } else {
        $category = get_term_by('id', $wp_query->get_queried_object()->term_id, 'category');
        echo '<li class="breadcrumb-item">Category</li>';
      }

      // Category loopythingamajig
      $is_parent = ($category->parent == 0);
      $have_link = ($is_parent || is_single());

      $breadcrumb[] = '<li class="breadcrumb-item ' . (($have_link) ?
        ('"><a href="' . get_term_link($category) . '">' . $category->name . '</a>') :
        ('active">' . $category->name)) . '</li>';

      if (!$is_parent) {
        while (!$is_parent) {
          $category = get_term($category->parent, 'category');
          $is_parent = ($category->parent == 0);
          $have_link = ($is_parent || is_single());
          array_unshift($breadcrumb, '<li class="breadcrumb-item ' . (($have_link) ?
            ('"><a href="' . get_term_link($category) . '">' . $category->name . '</a>') :
            ('active">' . $category->name)) . '</li>');
        }
      }

      echo implode('', $breadcrumb);

      // Get title, if Post
      if (is_single()) echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
    } elseif (is_page()) {
      $is_parent = ($wp_query->queried_object->post_parent == 0);

      $breadcrumb[] = '<li class="breadcrumb-item active">' . get_the_title() . '</li>';

      if (!$is_parent) {
        while(!$is_parent) {
          $parent = get_page($wp_query->queried_object->post_parent);
          $is_parent = ($parent->post_parent == 0);
          array_unshift($breadcrumb, '<li class="breadcrumb-item ' . (($is_parent) ?
            ('"><a href="' . get_page_link($parent->ID) . '">' . $parent->post_title . '</a>') :
            ('active">' . $parent->post_title)) . '</li>');
        }
      }

      echo implode('', $breadcrumb);
    } elseif (is_tag()) { echo '<li class="breadcrumb-item active">Tag: ' . single_term_title('', false) . '</li>';
    } elseif (is_date()) {
      echo '<li class="breadcrumb-item">Archive</li>';
      echo '<li class="breadcrumb-item ' . ((is_year()) ?
        ('active">' . get_the_date('Y')) :
        ('"><a href="' . get_year_link(get_the_date('Y')) . '">' . get_the_date('Y') . '</a>')) . '</li>';
      if (!is_year()) {
        echo '<li class="breadcrumb-item ' . ((is_month()) ?
          ('active">' . get_the_date('M')) :
          ('"><a href="' . get_month_link(get_the_date('Y'), get_the_date('m')) . '">' . get_the_date('M') . '</a>')) . '</li>';
        if (!is_month()) {
            echo '<li class="breadcrumb-item active">' . get_the_date('d') . '</li>';
        }
      }
    } elseif (is_author()) {
      $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
      echo '<li class="breadcrumb-item active">Author: ' . $curauth->nickname . '</li>';
    }
  }

  // Initialize Composer
  require_once('lib/vendor/autoload.php');
  require_once('lib/supermarkdown.php');

  require_once('lib/wp_bootstrap_navwalker.php');
?>