<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>NorCal Bike Sport</title>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/foundation.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <?php wp_head(); ?>
</head>
<body>
  <bordercolor></bordercolor>
  <div class="row">
    <div class="animated fadeInLeft">
    <div class="large-3 columns">
      <logo>
        <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="" />
      </logo>
    </div><!-- 3 columns -->
    </div><!-- animation -->
    <div class="large-9 columns">

      <?php // <!-- menu -->

        wp_nav_menu( array(
          'menu'            => 'MAIN',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'items_wrap'      => '<ul id="menu">%3$s</ul>',
          'depth'           => 0,
          'walker'          => ''//new main_menu_walker()
        ) );

      ?> <!-- menu -->

    </div><!-- 9 columns -->
  </div><!-- row -->
