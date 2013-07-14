<div id="footer">
  <?php $copyright_name = get_option('r755_copyright_name'); ?>
  <p><small>Copyright <?php echo date('Y') ?> <?php echo $copyright_name; ?>. Powered by <a href="http://wordpress.org/">WordPress</a>.<br />
    <a href="http://www.varometro.net/r755_theme/" title="R755 Theme">R755 theme</a> designed by varometro. <?php echo get_num_queries(); ?> queries in
    <?php timer_stop(1); ?>
    seconds.</small></p>
</div>
</div>
<?php wp_footer(); ?>
<?php
	$tmp_stats_code = get_option('r755_stats_code');
	if($tmp_stats_code != ''){
		echo stripslashes($tmp_stats_code);
	}
?>
</body></html>