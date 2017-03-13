    <nav class="navbar navbar-full navbar-dark bg-inverse" id="navbar">
      <div class="container">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar">
          &#9776;
        </button>
        <a href="<?php echo get_page_link(get_option('page_on_front')); ?>" class="navbar-brand"><?php bloginfo('name'); ?></a>
        <div class="collapse navbar-toggleable-xs" id="navbar">
          <?php            
              wp_nav_menu(array(
                'menu' => 'top_menu',
                'container' => false,
                'menu_class' => 'nav navbar-nav',
                'depth' => 2,
                'walker' => new wp_bootstrap_navwalker()
              ));
          ?>
        </div>
      </div>
    </nav>