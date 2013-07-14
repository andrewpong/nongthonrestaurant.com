<?php get_header(); ?>
		<div id="content">				
			<!-- Content Start-->
	<?php get_sidebar(); ?>
	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results for "<?php the_search_query(); ?>"</h2>

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
		</div>

		<?php endwhile; ?>

  	<div class="navigation">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<?php } ?>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found. Try a different search.</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
<div class="clear_both"></div>
			<!-- Content End -->
<?php get_footer(); ?>