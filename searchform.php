<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
  <label class="visuallyhidden" for="s"><?php _e('Buscar por:', 'roots'); ?></label>
  <input type="text" value="" name="s" id="s" placeholder="<?php _e('Busca em', 'roots'); ?> <?php bloginfo('name'); ?>">
  <input type="submit" id="searchsubmit" value="<?php _e('Buscar', 'roots'); ?>" class="button">
</form>
