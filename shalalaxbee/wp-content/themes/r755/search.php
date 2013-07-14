<?php get_header(); ?>
<div class="colmask rightmenu blogstyle">
  <div class="colmid">
    <div class="colleft">
      <div class="col1">
        <?php if (have_posts()) : ?>
        <h2>
          <?php _e('Search Results', 'r755'); ?>
        </h2>
        <p>
          <?php _e('You searched for', 'r755'); ?>
          "<strong>
          <?php the_search_query(); ?>
          </strong>".
          <?php _e('Here are the results', 'r755'); ?>
          :</p>
        <br />
        <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <h2 class="posttitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'r755'), the_title_attribute('echo=0')); ?>">
            <?php the_title(); ?>
            </a></h2>
          <div class="postinfo">
            <?php the_time(__('l, M jS, Y', 'r755')) ?>
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
            <?php the_excerpt(); ?>
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