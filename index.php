<?php get_header(); ?>

<?php if(is_front_page()) { ?>
  <div class="animated fadeInUp">    
    <div class="row">
      <div class="large-7 columns pinupAltFloater">
        <?php the_field('pinup1'); ?>
      </div>
      <div class="large-5 columns pinupAltFloater">
        <?php the_field('pinup2'); ?>
      </div>
    </div>
    
    <div class="row">
      <div class="large-5 columns pinupAltFloater">
        <?php the_field('pinup3'); ?>
      </div>
      <div class="large-7 columns youtubeWrapper">
        <iframe src="<?php the_field('youtube1'); ?>" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    
    
    <div class="row">
      <div class="large-4 columns pinupAltFloater">
        <?php the_field('pinup4'); ?>
      </div>
      <div class="large-4 columns pinupAltFloater">
        <?php the_field('pinup5'); ?>
      </div>
      <div class="large-4 columns pinupAltFloater">
        <?php the_field('pinup6'); ?>
      </div>
    </div>  
  </div>
<?php } ?>

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
