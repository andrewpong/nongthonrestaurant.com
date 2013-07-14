<?php get_header(); ?>
		<div id="content">				
			<!-- Content Start-->
	<?php get_sidebar(); ?>
	<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php if (is_category()) { ?>
		<h2 class="pagetitle">&#8216;<?php single_cat_title(); ?>&#8217; Archive</h2>
 	  <?php } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
	 	<?php } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
		<?php } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
					<h2 class="h2title">
						<a href="<?php the_permalink() ?>" rel="bookmark" style="display:block; width:400px; float:left;"><?php the_title(); ?></a>
						<span><?php the_date(); ?></span>
						<span class="comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
					</h2>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
				<div class="postmetadata">
					Filed under <?php the_category(', ') ?>
					<br /><?php the_tags(); ?>
				</div>
			</div>

		<?php endwhile; ?>

  	<div class="navigation">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<?php } ?>
		</div>

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>


			<div class="clear_both"></div>
			<!-- Content End -->
<?php get_footer(); ?>