<?php get_header(); ?>
		<div id="content">				
			<!-- Content Start-->

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			<?php edit_post_link('Edit.', '<p>', '</p>'); ?>
		</div>
		<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
			<div class="clear_both"></div>
			<!-- Content End -->
<?php get_footer(); ?>