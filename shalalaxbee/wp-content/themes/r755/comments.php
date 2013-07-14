<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die (__('Please do not load this page directly. Thanks!', 'r755'));
if ( post_password_required() ) {
echo (__('This post is password protected. Enter the password to view comments.', 'r755'));
return;
}
/* This variable is for alternating comment background, thanks Kubrick */
$oddcomment = 'alt';
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>
<h4 id="comments">
  <?php comments_number(__('No Comments','r755'), __('1 Comment','r755'), __('% Comments','r755'), '', __('Comments off','r755')); ?>
  &nbsp;
  <?php if ( comments_open() ) : ?>
  <a href="#postcomment" title="<?php _e('Jump to the comments form', 'r755'); ?>">&raquo;</a>
  <?php endif; ?>
</h4>
<ul class="commentlist">
  <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
  <?php 
if ('alt' == $oddcomment) $oddcomment = '';
else $oddcomment = 'alt';
?>
</ul>
<?php endif; ?>
<div class="navigation">
  <div class="alignleft">
    <?php previous_comments_link() ?>
  </div>
  <div class="alignright">
    <?php next_comments_link() ?>
  </div>
  <br />
</div>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
<h4 id="pings">
  <?php _e('Trackbacks/Pingbacks','r755');?>
</h4>
<ol class="pinglist">
  <?php wp_list_comments('type=pings&callback=list_pings'); ?>
</ol>
<?php endif; ?>
<p class="small noprint">
  <?php comments_rss_link (__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post', 'r755')); ?>
  <?php if ( pings_open() ) : ?>
  , <a href="<?php trackback_url() ?>" rel="trackback">
  <?php _e('TrackBack <abbr title="Uniform Resource Identifier">URI</abbr>', 'r755'); ?>
  </a>
  <?php endif; ?>
</p>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post-> comment_status) : ?>
<?php /* No comments yet */ ?>
<?php else : // comments are closed ?>
<?php /* Comments are closed */ ?>
<p>
  <?php _e('', 'r755'); ?>
</p>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post-> comment_status) : ?>
<div id="respond">
  <h4 id="postcomment">
    <?php _e('Leave a Reply', 'r755'); ?>
  </h4>
  <div class="cancel-comment-reply"> <small>
    <?php cancel_comment_reply_link(); ?>
    </small> </div>
  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
  <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'r755'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if ( $user_ID ) : ?>
    <p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'r755'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'r755'); ?>">
      <?php _e('Log out &raquo;', 'r755'); ?>
      </a></p>
    <?php else : ?>
    <p>
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
      <label for="author"><small>
        <?php _e('Name', 'r755'); ?>
        <?php if ($req) _e('(required)', 'r755'); ?>
        </small></label>
    </p>
    <p>
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
      <label for="email"><small>
        <?php _e('Mail (will not be published)', 'r755'); ?>
        <?php if ($req) _e('(required)', 'r755'); ?>
        </small></label>
    </p>
    <p>
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
      <label for="url"><small>
        <?php _e('Website', 'r755'); ?>
        </small></label>
    </p>
    <?php endif; ?>
    <!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'r755'), allowed_tags()); ?></small></p>-->
    <p>
      <label for="url"><small>
        <?php _e('Your Comment (please use the &lt;a href=""&gt;&lt;/a&gt; HTML tags to represent links)', 'r755'); ?>
        </small></label>
      <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
    </p>
    <?php do_action('comment_form', $post->ID); ?>
    <p>
      <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'r755'); ?>" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      <?php comment_id_fields(); ?>
    </p>
  </form>
</div>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>