			<!-- Sidebar Start -->
			<div id="sidebar">
				<div class="rightPan">
				<span class="stc">&nbsp;</span>
					<h3>Browse by Categories</h3>				
					<ul>
						<?php wp_list_categories('show_count=1&title_li='); ?>
					</ul>
				<div class="gbc"><span class="sbc">&nbsp;</span></div>
				</div>			

				<!-- browse by Tag-->
				<div class="rightPan">
				<span class="stc">&nbsp;</span>
					<h3>Browse by Tag</h3>
					<div class="tags">
						<?php wp_tag_cloud('smallest=10&largest=17&number=100&orderby=name&order=ASC'); ?>
					</div>
				<div class="gbc"><span class="sbc">&nbsp;</span></div>
				</div>
				<!-- browse by tag box -->																				
				
				<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2') ) : ?>					
				<div class="rightPan">
				<span class="stc">&nbsp;</span>	
				<h3>Blogroll</h3>
				<ul>
					<?php wp_list_bookmarks('categorize=0&title_li='); ?>
				</ul>
				<?php endif; ?>
				<div class="gbc"><span class="sbc">&nbsp;</span></div>
				</div>	
				<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?>

				
				
				<div class="rightPan">
				<span class="stc">&nbsp;</span>
					<h3>Meta</h3>
					<ul>
	          		<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				<div class="gbc"><span class="sbc">&nbsp;</span></div>
				</div>
				
				<?php endif; ?>									
			</div>
			<!-- Sidebar End -->