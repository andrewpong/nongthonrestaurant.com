<?php
/*
Template Name: Archive Index
*/
?>
<?php get_header(); ?>
<div class="colmask rightmenu blogstyle">
  <div class="colmid">
    <div class="colleft">
      <div class="col1">
        <h2>
          <?php _e('Archives', 'r755'); ?>
        </h2>
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
        <!--Change The Amount of Results You Wish To Display Per Page-->
        <?php 
$offset = "0";
$no_of_posts = "50"; //Number of posts to display on each page
if (preg_match('/page/', $_SERVER['REQUEST_URI'])) {
	$uri = explode('/', $_SERVER['REQUEST_URI']);
	foreach ($uri as $key=>$value) {
		if ($value == "") {
		unset($uri[$key]);
		}
	}
	$offset = (array_pop($uri) * 50) - 50; //Both These Numbers Should Match the $no_of_posts 
}

query_posts('posts_per_page=' . $no_of_posts . '&offset=' . $offset); ?>
        <!-- The Loop -->
        <?php if (have_posts()) : ?>
        <ul>
          <?php while (have_posts()) : the_post(); ?>
          <li><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            </a> <span>&nbsp;&nbsp;(<em>
            <?php the_time('F j, Y') ?>
            -
            <?php comment_type_count('comment'); ?>
            <?php _e('comment/s', 'r755'); ?>
            </em>)</span></li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <!-- Call For wp_page_numbers Plugin -->
        <?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>