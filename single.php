<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<section id="left">

	<h2 id="title"><?php the_title(); ?></h2>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> 
	<div id="entry">
		<?php the_content(); ?>			
	</div>

	<?php comments_template( '', true ); ?>


<?php endwhile; ?>
</section>
<div id="prevpost"><?php echo previous_post_link('%link','<div class="prevlink">Prev Entry</div><div class="prevtitle">%title</div>'); ?></div>
<div id="nextpost"><?php echo next_post_link('%link','<div class="nextlink">Next Entry</div><div class="nexttitle">%title</div>'); ?></div>

<div id="cats-archives">
	<div class="categories"><span class="hide-text">Categories</span></div>
	<div class="archives"><span class="hide-text">Archives</span></div>
</div>

<div id="category-menu"><?php wp_list_categories('title_li='); ?></div>
<div id="archives-menu"><?php wp_get_archives(); ?></div>


<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>