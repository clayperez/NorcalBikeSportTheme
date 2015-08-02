<?php
/**
 * Template Name: Sub Pages
 *
 */
?>
<?php get_header(); ?>

<div class="animated fadeInUp">

  <div class="row">
    <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          the_content();
        }
      }
    ?>
  </div>

</div>

<?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>
