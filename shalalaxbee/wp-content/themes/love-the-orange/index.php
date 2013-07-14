<?php get_header(); ?>
		<div id="content">				
			<div class="navigation">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				<?php } ?>
			</div>
			<!-- Content Start-->
			<?php if (have_posts()) : ?>
				<div class="post">
				<?php while (have_posts()) : the_post(); ?>						
					<h2 class="h2title">
						<a href="<?php the_permalink() ?>" rel="bookmark" style="display:block; width:400px; float:left;"><?php the_title(); ?></a>
						<span><?php the_date(); ?></span>
						<span class="comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
					</h2>															
					<div class="entry">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
					</div>
					<div class="postmetadata">
						Author: <b><?php the_author_login(); ?></b><br />
						Filed Under Category: <?php the_category(', ') ?><br/>
						Article <?php the_tags(); ?><br/>
						Comments: <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
					</div>		
				<?php endwhile; ?>
				</div>		  					
			<?php else : ?>		
				<h2 class="h2title">Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>		
			<?php endif; ?>
			<?php get_sidebar(); ?>
			<div class="clear_both"></div>
			<!-- Content End -->
<?php get_footer(); ?>