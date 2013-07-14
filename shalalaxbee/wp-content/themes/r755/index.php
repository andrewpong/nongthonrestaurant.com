<?php get_header(); ?>
<div class="colmask rightmenu blogstyle">
  <div class="colmid">
    <div class="colleft">
      <div class="col1">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <h2 class="posttitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'r755'), the_title_attribute('echo=0')); ?>">
            <?php the_title(); ?>
            </a></h2>
          <div class="postinfo"> <span class="dateposted">
            <?php the_time(__('l j M Y', 'r755')) ?>
            </span>
            <?php _e('by','r755');?>
            <?php the_author(); ?>
            | <a href="<?php comments_link(); ?>">
            <?php comments_number(__('No Comments','r755'), __('1 Comment','r755'), __('% Comments','r755'), '', __('Comments off','r755')); ?>
            </a>
            <?php edit_post_link(__('Edit','r755'), '[ ', ' ]'); ?>
            <br />
            <?php _e('Filed under:','r755');?>
            <?php the_category(', '); ?>
            <?php the_tags(__('Tags:', 'r755') . ' ', ', ', '<br />'); ?>
          </div>
          <div class="entry">
            <!-- Excerpt With Thumbnail Layout/ -->
            <?php $use_excerpts = get_option('r755_use_excerpts'); ?>
            <?php if ($use_excerpts == "true") {?>
            <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
            <a title="<?php printf(__('Permanent Link to %s', 'r755'), the_title_attribute('echo=0')); ?>" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(array(100,100), array('class' => 'alignleft')) ?>
            </a>
            <?php else : ?>
            <?php $thumbnail = get_post_meta($post->ID, 'thumbnail', true); //If post does not have a thumbnail (WP 2.9+), it gets the value from the custom field, "thumbnail"
	if ($thumbnail) { //if the user set a custom field named thumbnail ?>
            <a title="<?php printf(__('Permanent Link to %s', 'r755'), the_title_attribute('echo=0')); ?>" href="<?php the_permalink(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $thumbnail; ?>&amp;h=100&amp;w=100&amp;zc=1&amp;q=75" alt="<?php the_title(); ?>" class="alignleft" /></a>
            <?php } ?>
            <?php $exthumb = get_post_meta($post->ID, 'exthumb', true); //Cuntom field for a remote hosted thumbnail (e.g. YouTube video screenshon). Gets the value from the custom field, "exthumb"
    if ($exthumb) { //if the user set a custom field named exthumb ?>
            <a title="<?php printf(__('Permanent Link to %s', 'r755'), the_title_attribute('echo=0')); ?>" href="<?php the_permalink(); ?>"><img src="<?php echo $exthumb; ?>" alt="<?php the_title(); ?>" class="alignleft" width="100" height="100" /></a>
            <?php } ?>
            <?php endif ; ?>
            <?php the_content_limit(1000, "Read More &rarr;"); ?>
            <br class="clearFloat" />
            <?php } else  { ?>
            <!-- /Excerpt With Thumbnail Layout -->
            <!-- Normal Layout/ -->
            <?php the_content(__('Read the rest of this entry &raquo;', 'r755')); ?>
            <br class="clearFloat" />
            <!-- /Normal Layout -->
            <?php } ?>
          </div>
        </div>
        <?php endwhile; ?>
        <?php if(function_exists('wp_page_numbers')) : ?>
        <?php wp_page_numbers() ?>
        <?php else : ?>
        <div class="alignleft">
          <?php next_posts_link(__('&laquo; Older Entries', 'r755')) ?>
        </div>
        <div class="alignright">
          <?php previous_posts_link(__('Newer Entries &raquo;', 'r755')) ?>
        </div>
        <br />
        <?php endif; ?>
        <?php else: ?>
        <h2>
          <?php _e('Not Found', 'r755'); ?>
        </h2>
        <p>
          <?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'r755'); ?>
        </p>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>