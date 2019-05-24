
    <div class="columns five">
  <?php if (@constant('WP_USE_THEMES')) : ?>
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
<input type="text" name="s" id="s" size="25" />&nbsp;&nbsp;
<input type="submit" value="<?php esc_attr_e('Search'); ?>" />
</form>
<?php endif; ?>
    </div>
