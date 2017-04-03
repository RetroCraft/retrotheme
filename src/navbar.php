    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top" id="navbar">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">RetroCraft</a>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php            
            wp_nav_menu(array(
              'menu' => 'top_menu',
              'container' => false,
              'menu_class' => 'nav navbar-nav',
              'depth' => 3,
              'walker' => new wp_bootstrap_navwalker()
            ));
        ?>
      </div>
    </nav>