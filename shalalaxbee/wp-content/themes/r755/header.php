<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head>
<title>
<?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="<?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>" />
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php endif; ?>
<meta name="keywords" content="<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ','; }
$posttags = get_the_tags();if ($posttags) {foreach($posttags as $tag) {echo $tag->name . ','; } } ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" media="print" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<?php
	$tmp_stats_code = get_option('r755_header_code');
	if($tmp_stats_code != ''){
		echo stripslashes($tmp_stats_code);
	}
?>
</head>
<body>
<div id="fixed">
<div id="header">
  <h1><a title="Home" href="<?php echo get_option('home'); ?>/">
    <?php bloginfo('name'); ?>
    </a></h1>
  <span class="description">
  <?php bloginfo('description'); ?>
  </span>
</div>