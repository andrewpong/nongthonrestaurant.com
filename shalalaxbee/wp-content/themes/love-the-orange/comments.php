<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h5 id="comments" class="comments"><?php comments_number('No Comments', 'One Comments', '% Comments' );?></h5>

	<div id="commentlist">

	<?php foreach ($comments as $comment) : ?>

		
		<div id="comment-<?php comment_ID() ?>" class="commetmain">
			<div class="commet_left"> 
			
				<span class="comment-author">
	                <strong>
	        		<?php comment_author_link() ?>
					<?php echo get_avatar( $comment, 58 ); ?>
	        		</strong>
        		</span>
        		<small><?php comment_date('F jS, Y') ?> <?php edit_comment_link('[ edit ]','',''); ?></small>
         	</div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			
			<div class="commet_right">
				<div class="thecomment"> </div>
				<div class="comment-body">
					<?php comment_text() ?>
				</div>
			</div>
		</div>



	<?php endforeach; /* end for each comment */ ?>

	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h5 id="respond" class="comments">Leave a Reply</h5>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input class="txtarea" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author">Name<?php if ($req) echo "<b class='txtRed'>*</b>"; ?></label></p>

<p><input class="txtarea" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email">E-mail <?php if ($req) echo "<b  class='txtRed'>*</b><br /><small>(will not be published)</small>"; ?></label></p>

<p><input class="txtarea" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url">Website</label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea class="txtarea" name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
<label for="url">Message</label></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="Cmtbutton" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
