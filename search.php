<?php get_header(); ?>
          <h1><?php _e('Search Results for', 'roots'); ?> <?php echo get_search_query(); ?></h1>
          <?php roots_loop_before(); ?>
          <?php get_template_part('loop', 'search'); ?>
          <?php roots_loop_after(); ?>
<?php get_footer(); ?>
