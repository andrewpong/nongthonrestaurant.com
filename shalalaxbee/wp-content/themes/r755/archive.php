<?php get_header(); ?>
<div class="colmask rightmenu blogstyle">
  <div class="colmid">
    <div class="colleft">
      <div class="col1">
        <h2>
          <?php _e('Archives', 'r755'); ?>
        </h2>
        <h3>
          <?php wp_title('',true,'right'); ?>
        </h3>
        <br />
        <!-- Put Archive Dates in a Drop Down -->
        <select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
          <option value=""><?php echo attribute_escape(__('Select Month', 'r755')); ?></option>
          <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
        </select>
        <!-- Put Categories in a Drop Down -->
        <?php wp_dropdown_categories(__('orderby=name&show_count=1&show_option_none=Select Category', 'r755')); ?>
        <script type="text/javascript">
  var dropdown = document.getElementById("cat");
  function onCatChange() {
	if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
		location.href = 
		"<?php echo get_option('home');?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
	}
    }
    dropdown.onchange = onCatChange;
</script>
        <!-- Put A Link To Archive Index Page -->
        <a href="<?php bloginfo('url'); ?>/archives">
        <?php _e('Browse All', 'r755'); ?>
        </a>
        <!-- The Loop -->
        <?php if (have_posts()) : ?>
        <ul>
          <?php while (have_posts()) : the_post(); ?>
          <li><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            </a> <span>(<em>
            <?php the_time('F j, Y') ?>
            -
            <?php comment_type_count('comment'); ?>
            <?php _e('comment/s', 'r755'); ?>
            </em>)</span></li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
