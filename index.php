<?php get_header(); ?>

  <div class="animated fadeInUp">
    
    <div class="row">
    <div class="large-7 columns pinup1">
      <?php the_field('pinup1'); ?>
    </div>
    <div class="large-5 columns">
      <img src="<?php the_field('pinup2'); ?>">
    </div>
  </div>
    
    <div class="row">
    <div class="large-5 columns">
      <a href="shoprides.htm"><img src="<?php the_field('pinup3'); ?>"></a>
    </div>
    <div class="large-7 columns">
      <iframe width="620" height="349" src="<?php the_field('youtube1'); ?>" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
    
    
    <div class="row">
    <div class="large-4 columns">
      <img src="<?php the_field('pinup4'); ?>">
    </div>
    <div class="large-4 columns">
      <img src="<?php the_field('pinup5'); ?>">
    </div>
    <div class="large-4 columns">
      <a href="shoprides.htm"><img src="<?php the_field('pinup6'); ?>"></a>
    </div>
  </div>
  
  </div>

  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        the_content();
      }
    }
  ?>    
    
  <?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>
