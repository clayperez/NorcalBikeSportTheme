<?php
/**
 * Template Name: Google Calendar Feed
 *
 */
?>
<?php get_header(); ?>

  <div class="animated fadeInUp">
    
    <div class="row" id="clayperez_eventGrid"></div>

  </div><!-- animation -->
    

  <?php get_footer(); ?>
  

  <!-- LOAD CALENDAR STUFF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/SQLike.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/ncbscal.js"></script>
  <script src="https://apis.google.com/js/client.js?onload=initCalFeed"></script>


  <?php wp_footer(); ?>
</body>
</html>
