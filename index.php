<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<script>
jQuery(document).ready(function($) {
        
    // Hide submenu of front page
    $('#front-subnav').hide();
    
    // slide subnav down depending on position of the window; highlight current menu item
    function windowScroll() {
        if (window.pageYOffset > 65) {
            $('#front-subnav').slideDown('fast');   
        };
        if (window.pageYOffset < 65) {
            $('#front-subnav').hide();
            $('#menu-item-1185,#menu-item-1186,#menu-item-1187,#menu-item-1188').css('color', '#000');
        };
        if ( $('#webdesign').offset().top - 80 <= window.pageYOffset && window.pageYOffset < $('#graphicdesign').offset().top - 80) {
        $('#menu-item-1185 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1185 a').css('color', '#000');
        };
        if ( $('#graphicdesign').offset().top - 80 <= window.pageYOffset && window.pageYOffset < $('#webdevelopment').offset().top - 80) {
        $('#menu-item-1186 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1186 a').css('color', '#000');
        };
        if ( $('#webdevelopment').offset().top - 80 <= window.pageYOffset && window.pageYOffset < $('#uiux').offset().top - 80) {
        $('#menu-item-1187 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1187 a').css('color', '#000');
        };
        if ( $('#uiux').offset().top - 80 <= window.pageYOffset && window.pageYOffset < document.body.offsetHeight) {
        $('#menu-item-1188 a').css('color', '#ed145b');
        } else {
            $('#menu-item-1188 a').css('color', '#000');
        };

    };

    
    $(window).scroll(function() {
        windowScroll();    
    });
    
    // Prevent the default action when the submenu items are clicked on the home page
    $('.menu-item-1307 a, .menu-item-1185 a, .menu-item-1186 a, .menu-item-1187 a, .menu-item-1188 a').click(function(e) {
            e.preventDefault();
    });
    
    // Animate the scroll of the homepage menu items
	$('.home .menu-item-1307').click(function() {
	$('html, body').animate({scrollTop: 0}, 400);
    });
	
    $('.home .menu-item-1185').click(function() {
        $('html, body').animate({scrollTop: $("#webdesign").offset().top - 80}, 400);
    });
    
    $('.home .menu-item-1186').click(function() {
        $('html, body').animate({scrollTop: $("#graphicdesign").offset().top - 80}, 400);
    });
    
    $('.home .menu-item-1187').click(function() {
        $('html, body').animate({scrollTop: $("#webdevelopment").offset().top - 80}, 400);
    });
    
    $('.home .menu-item-1188').click(function() {
        $('html, body').animate({scrollTop: $("#uiux").offset().top - 80}, 400);
    });
    
    
});
</script>
<a name="top"></a>
<nav id="front-subnav">
	<?php wp_nav_menu( array( 'menu' => '65' ) ); ?>
</nav>

<section id="sidebar">
	<?php 
	/* inserting front page widget area here */
	dynamic_sidebar('front-page-sidebar'); ?>
</section>
<section id="left">
	<header>
		<h1 id="title"><span class="hide-text">Portfolio</span></h1>
	</header>

	<?php /* Here's the WordPress loop */ ?>
		<div class="index_section">
			<div class="portheader">
				<h2 id="webdesign">VISUAL DESIGN</h2>
			</div>
			<?php
			$args = array(
				     'taxonomy' => 'portfolio_cats',
				     'term' => 'web-design',
				     'post_type' => 'portfolio_post',
				     'posts_per_page' => 100,
				    
				     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				     );
			query_posts($args);
			while (have_posts()) : the_post(); ?>
			    <div class="imagecontainer"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-medium'); ?></a><br />
			    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		
		</div>
		<div class="index_section">
			<div class="portheader">
				<h2 id="graphicdesign">GRAPHIC DESIGN</h2>
			</div>
			<?php
			$args = array(
				     'taxonomy' => 'portfolio_cats',
				     'term' => 'graphic-design',
				     'post_type' => 'portfolio_post',
				     'posts_per_page' => 100,
				    
				     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				     );
			query_posts($args);
			while (have_posts()) : the_post(); ?>
			    <div class="imagecontainer"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-medium'); ?></a><br />
			    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		
		</div>
		<div class="index_section">
			<div class="portheader">
				<h2 id="webdevelopment">WEB DEVELOPMENT</h2>
			</div>
			<?php
			$args = array(
				     'taxonomy' => 'portfolio_cats',
				     'term' => 'web-development',
				     'post_type' => 'portfolio_post',
				     'posts_per_page' => 100,
				    
				     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				     );
			query_posts($args);
			while (have_posts()) : the_post(); ?>
			    <div class="imagecontainer"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-medium'); ?></a><br />
			    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		
		</div>
		<div class="index_section">
			<div class="portheader">
				<h2 id="uiux">UI/UX &amp; WIREFRAMING</h2>
			</div>
			<?php
			$args = array(
				     'taxonomy' => 'portfolio_cats',
				     'term' => 'ui-ux-wireframing',
				     'post_type' => 'portfolio_post',
				     'posts_per_page' => 100,
				    
				     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				     );
			query_posts($args);
			while (have_posts()) : the_post(); ?>
			    <div class="imagecontainer"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-medium'); ?></a><br />
			    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p></div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		
		</div>


	<?php /* End WordPress Loop */ ?>

</section>
	
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>