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
          <div class="entry">
            <?php the_content(__('Read the rest of this entry &raquo;', 'r755')); ?>
          </div>
          <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'r755') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <div class="printinfo">
            <?php $copyright_name = get_option('r755_copyright_name'); ?>
            <?php _e('Printed from:', 'r755'); ?>
            <?php the_permalink(); ?>
            .<br />
            &copy; <?php echo $copyright_name; ?> <?php echo date('Y') ?>. </div>
        </div>
        <?php comments_template('', true); ?>
        <?php endwhile; else: ?>
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