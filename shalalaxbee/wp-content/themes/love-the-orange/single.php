<?php get_header(); ?>
	<div id="content">							
			<!-- Content Start-->
			<?php get_sidebar(); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>			
			<div class="post">
				<h2 class="h2title">
						<a href="<?php the_permalink() ?>" rel="bookmark" style="display:block; width:400px; float:left;"><?php the_title(); ?></a>
						<span><?php the_date(); ?></span>
					</h2>															
				<div class="entry">
				  <?php the_content(); ?>
				</div>
				<div class="postmetadata">
					Author: <b><?php the_author_login(); ?></b><br />
					Filed Under Category: <?php the_category(', ') ?><br/>
					Article <?php the_tags(); ?><br/>
					Comments: <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
				</div>
				<?php edit_post_link('Edit this Article', '<p>', '</p>'); ?>
			</div>
		
		<div class="sml navigation">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright" style="clear:left;"><?php next_post_link('%link  &raquo;') ?></div>
			<?php } ?>
		</div>
	<div class="comments"><?php comments_template(); ?></div>
	
	<?php endwhile; else: ?>
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>
	
	<div class="clear_both"></div>
<?php get_footer(); ?>