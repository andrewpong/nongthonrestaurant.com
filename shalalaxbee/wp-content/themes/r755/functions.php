<?php
// ===== Localization =================================================
load_theme_textdomain('r755', get_template_directory() . '/lang');

// ===== Local Dates ==================================================
function local_date_replace($text) {
	$days_english = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
	'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 
	'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 
	'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 
	'1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '0th');

	$days_local = array(__('Monday', 'r755'), __('Tuesday', 'r755'), __('Wednesday', 'r755'), __('Thursday', 'r755'), __('Friday', 'r755'), __('Saturday', 'r755'), __('Sunday', 'r755'), 
	__('Mon', 'r755'), __('Tue', 'r755'), __('Wed', 'r755'), __('Thu', 'r755'), __('Fri', 'r755'), __('Sat', 'r755'), __('Sun', 'r755'), 
	__('January', 'r755'), __('February', 'r755'), __('March', 'r755'), __('April', 'r755'), __('May', 'r755'), __('June', 'r755'), __('July', 'r755'), __('August', 'r755'), __('September', 'r755'), __('October', 'r755'), __('November', 'r755'), __('December', 'r755'), 
	__('Jan', 'r755'), __('Feb', 'r755'), __('Mar', 'r755'), __('Apr', 'r755'), __('May', 'r755'), __('Jun', 'r755'), __('Jul', 'r755'), __('Aug', 'r755'), __('Sep', 'r755'), __('Oct', 'r755'), __('Nov', 'r755'), __('Dec', 'r755'),
	__('1st', 'r755'), __('2nd', 'r755'), __('3rd', 'r755'), __('4th', 'r755'), __('5th', 'r755'), __('6th', 'r755'), __('7th', 'r755'), __('8th', 'r755'), __('9th', 'r755'), __('0th', 'r755'));

	$text = str_replace($days_english, $days_local, $text);
	return $text;
}

add_filter('the_time', 'local_date_replace');
add_filter('get_the_time', 'local_date_replace');
add_filter('the_modified_time', 'local_date_replace');
add_filter('the_date', 'local_date_replace');
add_filter('the_modified_date', 'local_date_replace');
add_filter('get_comment_date','local_date_replace');
add_filter('wp_title','local_date_replace');

// ===== Post Thumbnails ==============================================
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
}

// ===== Widgets ======================================================
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Sidebar 1',
        'before_widget' => '<ul><li>',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
	));
	
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Sidebar 2',
        'before_widget' => '<ul><li>',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
	));

// ===== Theme Options ================================================
$themename = "R755";
$shortname = "r755";
$options = array (
			array(	"name" => "Navigation",
				"type" => "subhead"),
			array(  "name" => "Exclude pages from sidebar navigation",
				"id" => $shortname."_pages_to_exclude",
              	"desc" => "Page ID's you don't want displayed in your navigation. Use a comma-delimited list, eg. 1,2,3",
              	"std" => "",
              	"type" => "text"),
			array(	"name" => "Index Page",
				"type" => "subhead"),
			array(  "name" => __('Limited Posts'),
                "id" => $shortname."_use_excerpts",
                "desc" => __('Check this box to Enable limited posts with thumbnails instead of full posts in your index page. In index.php you can modify the limit of characters (default is 1000). <a href="http://www.varometro.net/blog/r755_theme/#faq">Read the FAQs</a> on how to deal with thumbnails.'),
                "std" => "false",
                "type" => "checkbox"),
			array(	"name" => "Header",
				"type" => "subhead"),
			array(	"name" => "Header code",
				"id" => $shortname."_header_code",
				"desc" => "If you use Javascript or need any other code in your header just copy and paste it here.<br /> It will be inserted before the closing <code>&#60;/header&#62;</code> tag.",
				"std" => "",
				"type" => "textarea",
				"options" => array("rows" => "5",
									"cols" => "30") ),
			array(	"name" => "Social Links",
				"type" => "subhead"),
			array(  "name" => __('Enable Social Links'),
                "id" => $shortname."_social_links",
                "desc" => __('By enabling this you may have icons with links to social sites (delicious, facebook, twitter etc) right after your posts. You may add or remove social sites modifying the Lightsocial Plugin code in functions.php file. This provides simplistic and valid html code to ensure fast load and minimal impact on your blog. Most of the social sites plugins for wordpress suck!'),
                "std" => "false",
                "type" => "checkbox"),
			array(	"name" => "Footer",
				"type" => "subhead"),
			array(	"name" => "Copyright notice",
				"id" => $shortname."_copyright_name",
              	"desc" => "Enter your copyright info above.",
				"std" => "Your Name Here",
				"type" => "text"),			
			array(	"name" => "Stats code",
				"id" => $shortname."_stats_code",
				"desc" => "If you use Google Analytics or any other tracking script in your footer just copy and paste it here.<br /> The script will be inserted before the closing <code>&#60;/body&#62;</code> tag.",
				"std" => "",
				"type" => "textarea",
				"options" => array("rows" => "5",
									"cols" => "30") ),
		  );

function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                header("Location: themes.php?page=functions.php&saved=true");
                die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); }
            header("Location: themes.php?page=functions.php&saved=true");
            die;
        }
    }
    add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
//add_theme_page($themename . 'Header Options', 'Header Options', 'edit_themes', basename(__FILE__), 'headimage_admin');
function headimage_admin(){
}
function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>'; 
?>

<div class="wrap">
<h2 class="updatehook" style=" padding-top: 20px; font-size: 2.8em;"><?php echo $themename; ?> Options</h2>
<p style="line-height: 1.6em; font-size: 1.2em; width: 75%;">Welcome to the R755 Options menu. If you have any questions add a comment to the <a href="http://www.varometro.net/r755_theme/">R755 theme page</a>.</p>
<form method="post">
  <table class="form-table">
    <?php foreach ($options as $value) {
	switch ( $value['type'] ) {
		case 'subhead':
		?>
  </table>
  <h3><?php echo $value['name']; ?></h3>
  <table class="form-table">
    <?php
		break;
		case 'text':
		option_wrapper_header($value);
		?>
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
    <?php
		option_wrapper_footer($value);
		break;
		case 'select':
		option_wrapper_header($value);
		?>
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
      <?php foreach ($value['options'] as $option) { ?>
      <option <?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
      <?php } ?>
    </select>
    <?php
		option_wrapper_footer($value);
		break;
		case 'textarea':
		$ta_options = $value['options'];
		option_wrapper_header($value);
		?>
    <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>"><?php 
				if( get_settings($value['id']) != "") {
						echo stripslashes(get_settings($value['id']));
					}else{
						echo stripslashes($value['std']);
				}?>
</textarea>
    <?php
		option_wrapper_footer($value);
		break;
		case "radio":
		option_wrapper_header($value);
 		foreach ($value['options'] as $key=>$option) { 
				$radio_setting = get_settings($value['id']);
				if($radio_setting != ''){
		    		if ($key == get_settings($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
    <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> />
    <?php echo $option; ?><br />
    <?php 
		}
		option_wrapper_footer($value);
		break;
		case "checkbox":
		option_wrapper_header($value);
						if(get_settings($value['id'])){
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
					?>
    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
    <?php
		option_wrapper_footer($value);
		break;
		default:
		break;
	}
}

?>
  </table>
  <p class="submit">
    <input name="save" type="submit" value="Save changes" />
    <input type="hidden" name="action" value="save" />
  </p>
</form>
<form method="post">
  <p class="submit">
    <input name="reset" type="submit" value="Reset" />
    <input type="hidden" name="action" value="reset" />
  </p>
</form>
<?php
}
function option_wrapper_header($values){
	?>
<tr valign="top">
  <th scope="row"><?php echo $values['name']; ?>:</th>
  <td><?php
}
function option_wrapper_footer($values){
	?>
    <br />
    <br />
    <?php echo $values['desc']; ?></td>
</tr>
<?php 
}
add_action('admin_menu', 'mytheme_add_admin');

// ===== Post Word Count ==============================================
function wcount(){
    ob_start();
    the_content();
    $content = ob_get_clean();
    return sizeof(explode(" ", $content));
}

// ===== Get Rid of Curly Quotes ======================================
remove_filter('the_title', 'wptexturize');
remove_filter('the_content', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');
remove_filter('comment_text', 'wptexturize');

// ===== Limit Posts 1.1 ==============================================
function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>"."Read More &rarr;</a>";
      echo "</p>";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>";
        echo $content;
        echo "...";
        echo "&nbsp;<a href='";
        the_permalink();
        echo "'>".$more_link_text."</a>";
        echo "</p>";
   }
   else {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>"."Read More &rarr;</a>";
      echo "</p>";
   }
}

// ===== Ping/Track/Comment Count 1.1 =================================
function get_comment_type_count($type='all', $post_id = 0) {
    global $cjd_comment_count_cache, $id, $post;
    if ( !$post_id )
        $post_id = $post->ID;
    if ( !$post_id )
        return;
    if ( !isset($cjd_comment_count_cache[$post_id]) ) {
        $p = get_post($post_id);
        $p = array($p);
        update_comment_type_cache($p);
    }
    if ( $type == 'pingback' || $type == 'trackback' || $type == 'comment' )
        return $cjd_comment_count_cache[$post_id][$type];
    elseif ( $type == 'ping' )
        return $cjd_comment_count_cache[$post_id]['pingback'] + $cjd_comment_count_cache[$post_id]['trackback'];
    else
        return array_sum((array) $cjd_comment_count_cache[$post_id]);
}

function comment_type_count($type = 'all', $post_id = 0) {
        echo get_comment_type_count($type, $post_id);
}

function update_comment_type_cache(&$queried_posts) {
    global $cjd_comment_count_cache, $wpdb;
    if ( !$queried_posts )
        return $queried_posts;
    foreach ( (array) $queried_posts as $post )
        if ( !isset($cjd_comment_count_cache[$post->ID]) )
            $post_id_list[] = $post->ID;
    if ( $post_id_list ) {
        $post_id_list = implode(',', $post_id_list);
        foreach ( array('', 'pingback', 'trackback') as $type ) {
            $counts = $wpdb->get_results("SELECT ID, COUNT( comment_ID ) AS ccount
            FROM $wpdb->posts
            LEFT JOIN $wpdb->comments ON ( comment_post_ID = ID AND comment_approved = '1' AND comment_type='$type' )
            WHERE post_status = 'publish' AND ID IN ($post_id_list)
            GROUP BY ID");
            if ( $counts ) {
                if ( '' == $type )
                    $type = 'comment';
                foreach ( $counts as $count )
                    $cjd_comment_count_cache[$count->ID][$type] = $count->ccount;
            }
        }
    }
    return $queried_posts;
}
add_filter('the_posts', 'update_comment_type_cache');

// ===== Add Meta Noindex Rules on Singular Comment Page Section ======
function wpi_comment_paging_noindex_meta()
{	global $wp_query;
if (version_compare( (float) get_bloginfo('version'), 2.7, '>=') ){
if ($wp_query->is_singular && get_option('page_comments')){ // comments paging enabled
if (isset($wp_query->query['cpage'])
&& absint($wp_query->query['cpage']) >= 1 ){
echo '<meta name="robots" content="noindex" />'.PHP_EOL;
			}
		}
	}
}

add_action('wp_head','wpi_comment_paging_noindex_meta');

// ===== Add a Microid to all Comments ================================
function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;
}
add_filter('comment_class','comment_add_microid');

// ===== Seperate Pings ===============================================
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>">
  <?php comment_author_link(); ?>
  <?php }

// ===== Correct Comment Count ========================================
add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
        if ( ! is_admin() ) {
                global $id;
                $get_comments= get_comments('post_id=' . $id);
				$comments_by_type = &separate_comments($get_comments);
                return count($comments_by_type['comment']);
        } else {
                return $count;
        }
}

// ===== Lightsocial Plugin 1.11 =======================================
// add Light Social custom style
function lightsocial_stylesheet()
{
	echo '<!--[if lt IE 7]>';
	echo '<script defer type="text/javascript" src="'. get_bloginfo('wpurl') . '/wp-content/themes/r755/pngfix.js"></script>';
	echo '<![endif]-->';
}

// this is a helper function to refactor common code
function code_helper($href, $img, $tooltip)
{
	$code = '';

	$code .= '<div class="lightsocial_element">';
	$code .= '<a href="'.$href.'">';
	$code .= '<img src="'.$img.'" alt="'.$tooltip.'" title="'.$tooltip.'" />';
	$code .= '</a>';
	$code .= '</div>';

	return $code;
}

function code_digg($title, $link, $img_prefix)
{
	$href    = 'http://digg.com/submit?url='.$link.'&amp;title='.$title;
	$img     = $img_prefix.'digg.png';
	$tooltip = __('Digg This', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_reddit($title, $link, $img_prefix)
{
	$href    = 'http://www.reddit.com/submit?url='.$link.'&amp;title='.$title;
	$img     = $img_prefix.'reddit.png';
	$tooltip = __('Reddit This', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_stumbleupon($title, $link, $img_prefix)
{
	$href    = 'http://www.stumbleupon.com/submit?url='.$link.'&amp;title='.$title;
	$img     = $img_prefix.'stumbleupon.png';
	$tooltip = __('Stumble Now!', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_yahoo_buzz($title, $link, $img_prefix)
{
	$href    = 'http://buzz.yahoo.com/buzz?targetUrl='.$link.'&amp;headline='.$title;
	$img     = $img_prefix.'yahoo_buzz.png';
	$tooltip = __('Buzz This', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_dzone($title, $link, $img_prefix)
{
	$href    = 'http://www.dzone.com/links/add.html?title='.$title.'&amp;url='.$link;
	$img     = $img_prefix.'dzone.png';
	$tooltip = __('Vote on DZone', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_facebook($title, $link, $img_prefix)
{
	$href    = 'http://www.facebook.com/sharer.php?t='.$title.'&amp;u='.$link;
	$img     = $img_prefix.'facebook.png';
	$tooltip = __('Share on Facebook', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_viadeo($title, $link, $img_prefix)
{
        $href    = 'http://www.viadeo.com/shareit/share/?url='.$link.'&amp;title='.$title.'&amp;encoding=UTF-8';
        $img     = $img_prefix.'viadeo.png';
        $tooltip = __('Share it on Viadeo', 'light_social');

        return code_helper($href, $img, $tooltip);
}

function code_delicious($title, $link, $img_prefix)
{
	$href    = 'http://delicious.com/save?title='.$title.'&amp;url='.$link;
	$img     = $img_prefix.'delicious.png';
	$tooltip = __('Bookmark this on Delicious', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_dotnetkicks($title, $link, $img_prefix)
{
	$href    = 'http://www.dotnetkicks.com/kick/?title='.$title.'&amp;url='.$link;
	$img     = $img_prefix.'dotnetkicks.png';
	$tooltip = __('Kick It on DotNetKicks.com', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_dotnetshoutout($title, $link, $img_prefix)
{
	$href    = 'http://dotnetshoutout.com/Submit?title='.$title.'&amp;url='.$link;
	$img     = $img_prefix.'dotnetshoutout.png';
	$tooltip = __('Shout it', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_linkedin($title, $link, $img_prefix)
{
	$href    = 'http://www.linkedin.com/shareArticle?mini=true&amp;url='.$link.'&amp;title='.$title.'&amp;summary=&amp;source=';
	$img     = $img_prefix.'linkedin.png';
	$tooltip = __('Share on LinkedIn', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_technorati($title, $link, $img_prefix)
{
	$href    = 'http://www.technorati.com/faves?add='.$link;
	$img     = $img_prefix.'technorati.png';
	$tooltip = __('Bookmark this on Technorati', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_twitter($title, $link, $img_prefix)
{
	$href    = 'http://twitter.com/home?status='.urlencode('Reading '.urldecode($link));
	$img     = $img_prefix.'twitter.png';
	$tooltip = __('Post on Twitter', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_faves($title, $link, $img_prefix)
{
	$href    = 'http://faves.com/Authoring.aspx?u='.$link.'&amp;t='.$title;
	$img     = $img_prefix.'faves.png';
	$tooltip = __('Fave It!', 'light_social');

	return code_helper($href, $img, $tooltip);
}

function code_misterwong($title, $link, $img_prefix)
{
	$href    = 'http://www.mister-wong.com/index.php?action=addurl&amp;bm_url='.$link.'&amp;bm_description='.$title;
	$img     = $img_prefix.'misterwong.png';
	$tooltip = __('Bookmark this on Mister Wong', 'light_social');

	return code_helper($href, $img, $tooltip);
}

// insert Light Social custom html
function lightsocial_insert($content)
{
	global $wp_query;

	$post = $wp_query->post; // get post content
	$id = $post->ID; // get post id
	$postlink = get_permalink($id); // get post link
	$title = trim(urlencode($post->post_title)); // get post title
	$link = split('#', $postlink); // split the link with '#', for comment
	$link = urlencode($link[0]); // get the actual link from array
	$img_prefix = get_bloginfo('wpurl') . '/wp-content/themes/r755/images/social/';

	$code = '';

	// $display = true; // if you want to put some special condition
	$display = is_single(); // use this line for display on single posts only
	$social_links = get_option('r755_social_links');
	
	if ($display)
	
	if ($social_links == "true")
	{
		$code .= '<div class="lightsocial_container">';

		// digg
		$code .= code_digg($title, $link, $img_prefix);

		// reddit
		$code .= code_reddit($title, $link, $img_prefix);
		
		// stumbleupon
		$code .= code_stumbleupon($title, $link, $img_prefix);

		// yahoo buzz
		$code .= code_yahoo_buzz($title, $link, $img_prefix);

		// dzone
		$code .= code_dzone($title, $link, $img_prefix);

		// facebook
		$code .= code_facebook($title, $link, $img_prefix);

		// viadeo
		//$code .= code_viadeo($title, $link, $img_prefix);

		// delicious
		$code .= code_delicious($title, $link, $img_prefix);

		// dotnetkicks
		$code .= code_dotnetkicks($title, $link, $img_prefix);
		
		// dotnetshoutout
		$code .= code_dotnetshoutout($title, $link, $img_prefix);

		// linkedin
		$code .= code_linkedin($title, $link, $img_prefix);

		// technorati
		$code .= code_technorati($title, $link, $img_prefix);

		// twitter
		$code .= code_twitter($title, $link, $img_prefix);
		
		// faves
		//$code .= code_faves($title, $link, $img_prefix);
		
		// misterwong
		//$code .= code_misterwong($title, $link, $img_prefix);

		$code .= '</div>';
	}

	return $content . $code;
}

// change the Light Social custom html for proper render of feed in readers
function lightsocial_insert_feed($content)
{
	// this pattern replace the element <div> with the inner <a>
	$pattern = '/<div class="lightsocial_element"><a href=(.*?)<\/a><\/div>/i';
	$replacement = '<a href=${1}</a>&nbsp;&nbsp;';

	$new_content = preg_replace($pattern, $replacement, $content);

	if (preg_last_error() != PREG_NO_ERROR) // error in preg, probably a backtrack limit error
	{
		// restore the content
		$new_content = $content;
	}

	return $new_content;
}

// head
add_action('wp_head', 'lightsocial_stylesheet');

// content
add_filter('the_content', 'lightsocial_insert');

// content feed
add_filter('the_content_feed', 'lightsocial_insert_feed');

// ===== Comments Loop ===============================================
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>">
    <div class="comment-author vcard"> <?php echo get_avatar($comment,$size='32'); ?> <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'r755'), get_comment_author_link()) ?> </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em>
    <?php _e('Your comment is awaiting moderation.', 'r755') ?>
    </em> <br />
    <?php endif; ?>
    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'r755'), get_comment_date('d.m.y'),  get_comment_time('H:i')) ?></a>
      <?php edit_comment_link(__('Edit','r755'), '[ ', ' ]'); ?>
    </div>
    <?php comment_text() ?>
    <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'r755'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    </div>
  </div>
  <?php
        }
?>