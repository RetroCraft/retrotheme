<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

  <?php
    if (the_top_category() == 'study-sheets') {
      $sheet = get_template_directory_uri() . '/css/study-sheet.css';
      echo '<link rel="stylesheet" type="text/css" href="'.$sheet.'">';
    }
  ?>

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-4770009561063252",
      enable_page_level_ads: true
    });
  </script>

  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
  <script>
  window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#252e39"
      },
      "button": {
        "background": "#14a7d0"
      }
    },
    "content": {
      "message": "This site uses these cool things called cookies. Apparently I'm supposed to tell you that because Google can track everything about you with them. Thanks Google!",
      "dismiss": "Cool!",
      "link": "Read a useless policy",
      "href": "https://blog.retrocraft.ca/privacy-policy"
    }
  })});
  </script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="not-footer">
    <?php get_template_part('navbar'); ?>

    <div class="container mt-3">