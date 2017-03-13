<?php get_header('home'); ?>
<?php if (false): // TODO: change to settings
    get_header();
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        the_content();
      }
    } else {
      _e('Home page not found.');
      get_footer();
    }
else: ?>

<div id="header" data-0="transform:translate(0,0%);" data-100p="transform:translate(0,-100%);">
  <div class="jumbotron skrollable"
    data-0="opacity[sqrt]:1;top:0%;transform:rotate(0deg);transform-origin:50% 50%;"
    data-500="opacity:0;top:-50%;transform:rotate(-2500deg);">
    <h1 class="display-3"><?php echo mb_strtolower(get_bloginfo('name')); ?></h1>
    <p>
      <span id="use-chrome">for best experience, use google chrome<br></span>
      <?php echo mb_strtolower(get_bloginfo('description')); ?><br>
      ▼&nbsp;▼&nbsp;▼
    </p>
  </div>
</div>
<div class="sticky">
  <?php get_template_part('navbar'); ?> 
</div>
<div class="freeze" data-0="transform:translate(0,100%);" data-100p="transform:translate(0,0%);background-color:rgb(255,255,255)"
data-_box-100p="background-color:rgb(0,0,0)" data-_box-200p="transform:translate(0,-100%)">
  <div class="sidebox" data-100p="right[sqrt]:-100%;opacity:0" data-_box-100p="right:0%;opacity:1">
      <div class="cards">
        <div class="card-columns">
          <?php
          $posts = new WP_Query(array(
            'post_type' => 'post'
            ));
          if($posts->have_posts()): while ($posts->have_posts()): $posts->the_post();
          ?>
          <a class="no-color" href="<?php the_permalink(); ?>">
            <div class="card card-block hover hover-group">
              <h4 class="card-title"><?php the_title(); ?></h4>
              <p class="card-text">
                <?php the_excerpt(); ?>
              </p>
              <p class="card-text"><small class="text-muted"><?php get_date(); ?></small></p>
              <p class="card-text"><?php retrotheme_category_pills(); ?></p>
            </div>
          </a>
        <?php endwhile; else: ?>
        <div class="card card-block hover hover-group">
          <p class="card-text">No posts found.</p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="container">
    <h2 class="display-4" id="interests"
    data-0="left:-100px;opacity:0;transform:scale(0);color:rgb(0,0,0)"
    data-100p="left:0;opacity:1;transform:scale(1);transform-origin:50% 50%;color:rgb(0,0,0)"
    data-_box-100p="left:0;opacity:1;transform:scale(1);transform-origin:50% 50%;color:rgb(255,255,255)">Recent Posts</h2>
  </div>
</div>
<div id="about" class="freeze"
 data-_box-100p="transform:translate(0,100%)"
 data-_box-200p="transform:translate(0,0%)">
  <div class="container">
    <h2 class="display-4" id="about"
      data-_box-100p="transform:scale(0);left:100%"
      data-_box-180p="transform:scale(1.2);left:-10%"
      data-_box-200p="transform:scale(1);left:0%">About</h2>
  </div>
  <div class="content">
    <div style="position:relative" data-_box-100p="left:-100%" data-_box-200p="left:0%">
      <p class="lead">James /ˈd͡ʒeɪms/ : from Latin <em>Iacomus</em> <small class="text-muted">(somehow)</small>, from <em>Iacobus</em> <small class="text-muted">(idk how this works)</small>, from Greek  <em>Ἰακώβος</em>, from <em>Ἰακώβ</em>, Jacob <small class="text-muted">(ummm)</small></p>
      <p>Okay, so I have the same name as Jacob. Language is weird. Then again, somehow the word "meh" is a thing.</p>
    </div>
    <hr>
    <div style="position:relative" data-_box-100p="left:100%" data-_box-200p="left:0%">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad velit sint dolore atque earum dolor asperiores, optio ex, temporibus ea fugit iure, facere in sed. Quibusdam fugiat, incidunt impedit at.</p>
    </div>
  </div>
</div>
<div id="footer" data-_box-200p="transform:translate(0,100%);opacity:0" data-_box-300p="transform:translate(0,0%);opacity:1">
  <div class="container" style="text-align:center;">
    <div class="to-top">
      <a href="#" onclick="toTop()">
        <p>▲&nbsp;▲&nbsp;▲</p>
        <h2>Back to top</h2>
      </a>
    </div>
    <div id="konami">
      <h4 class="display-3">&#x263a;</h4>
      <p>I'm horrible at coming up with Konami Code Easter Eggs. Have a happy face!</p>
    </div>
    <div class="bottom">
      <p>
        Contact: <a href="mailto:james@retrocraft.ca">james@retrocraft.ca</a><br>
        &copy; James Ah Yong, 2016. All rights reserved, except for the ones that aren't.<br>
        <pre>↑ ↑ ↓ ↓ ← → ← → B A</pre>
      </p>
    </div>
  </div>
</div>

<?php 
  get_footer('home');
  endif;
?>