<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

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
<body> 
  <div class="skrollr-body">