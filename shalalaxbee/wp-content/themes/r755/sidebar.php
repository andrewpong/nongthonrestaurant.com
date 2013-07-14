<div class="col2">
  <ul>
    <li>
      <ul>
        <?php $exclude_pages = get_option('r755_pages_to_exclude'); ?>
        <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <?php
    	$pages= wp_list_pages('sort_column=ID&depth=3&title_li=&exclude=' . $exclude_pages);
    	$pages= preg_replace('/title=\"(.*?)\"/','',$pages);
    	echo $pages;
		?>
      </ul>
    </li>
  </ul>
  <?php 	/* Widgetized sidebar, if you have the plugin installed. */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar 1") ) : ?>
  <ul>
    <?php if ( is_404() || is_category() || is_day() || is_month() ||
is_year() || is_search() || is_paged() ) {
?>
    <li>
      <?php /* If this is a 404 page */ if (is_404()) { ?>
      <?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <p><?php printf(__('You are currently browsing the archives for the %s category.', 'r755'), single_cat_title('', false)); ?></p>
      <?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
      <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the day %3$s.', 'r755'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('l, F jS, Y', 'r755'))); ?></p>
      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for %3$s.', 'r755'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('F, Y', 'r755'))); ?></p>
      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the year %3$s.', 'r755'), get_bloginfo('url'), get_bloginfo('name'), get_the_time('Y')); ?></p>
      <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
      <p><?php printf(__('You have searched the <a href="%1$s/">%2$s</a> blog archives for <strong>&#8216;%3$s&#8217;</strong>. If you are unable to find anything in these search results, you can try one of these links.', 'r755'), get_bloginfo('url'), get_bloginfo('name'), get_search_query()); ?></p>
      <?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives.', 'r755'), get_bloginfo('url'), get_bloginfo('name')); ?></p>
        <?php } ?>
    </li>
    <?php }?>
    <li>
      <h3>
        <?php _e('Archives', 'r755'); ?>
      </h3>
      <ul>
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </li>
    <?php wp_list_categories('show_count=1&title_li=<h3>' . __('Categories', 'r755') . '</h3>'); ?>
    <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
    <?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>'); ?>
    <li>
      <h3>
        <?php _e('Meta', 'r755'); ?>
      </h3>
      <ul>
        <?php wp_register(); ?>
        <li>
          <?php wp_loginout(); ?>
        </li>
        <li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional', 'r755'); ?>">
          <?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>', 'r755'); ?>
          </a></li>
        <li><a href="http://gmpg.org/xfn/"><abbr title="<?php _e('XHTML Friends Network', 'r755'); ?>">
          <?php _e('XFN', 'r755'); ?>
          </abbr></a></li>
        <li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'r755'); ?>">WordPress</a></li>
        <?php wp_meta(); ?>
      </ul>
    </li>
    <?php } ?>
  </ul>
  <?php endif; ?>
</div>
<div class="col3">
  <div id="search">
    <form id="searchform" action="<?php bloginfo('url'); ?>" method="get">
      <p>
        <input type="text" id="searchinput" name="s" class="searchinput" value="search" onfocus="if (this.value == 'search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search';}" />
        <input type="submit" id="searchsubmit" class="button" value="" />
      </p>
    </form>
  </div>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar 2") ) : ?>
  <?php endif; ?>
</div>