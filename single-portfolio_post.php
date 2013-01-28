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

	<div id="next"><?php echo next_post_link('%link','<img src="http://www.jessicachanstudios.com/wp-content/themes/jcstudios_custom2/images/prev.png" />'); ?></div>
	<div id="prev"><?php echo previous_post_link('%link','<img src="http://www.jessicachanstudios.com/wp-content/themes/jcstudios_custom2/images/next.png" />'); ?></div>

<section id="left">
	<article>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>			
	
	</article>	
</section>

<section id="sidebar" class="<?php /* Getting portfolio post's categories */
		$port_cats = get_the_terms($post->ID, 'portfolio_cats', '', ' ', '');
		foreach( $port_cats as $term ) {
		// Print the name method from $term which is an OBJECT
		print $term->slug . ' ';
		// Get rid of the other data stored in the object, since it's not needed
		unset($term);
		}
		?>
" >
	<?php /* inserting single portfolio page widget here */
	dynamic_sidebar('portfolio-post-sidebar'); ?>
	
	<?php /* Checking to see if live link exists and if so, print live ink section */
	if (get_post_meta($post->ID, 'live_link', true) ) : ?>
	
		<div id="live-link">
			<h2>live link</h2>
			<?php /* Getting portfolio post's live link meta field */
			?><a href="<?php echo get_post_meta($post->ID, 'live_link', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'live_link', true); ?></a>
		</div>
		
	<?php 
	endif;
	?>
	
	<?php /* Checking to see if info exists and if so, print info section */
	if (get_post_meta($post->ID, 'portfolio_piece_info', true) ) : ?>	
	
	<div id="info">
		<h2>info</h2>
		<p>
		<?php /* Getting portfolio post's description meta field*/
		echo get_post_meta($post->ID, 'portfolio_piece_info', true);
		?>
		</p>
	</div>
	
	<?php
	endif;
	?>
	
	<?php /* Checking to see if skills exists and if so, print skills section */
	if (get_the_terms($post->ID, 'portfolio_skills', '', ' ', '') ) : ?>	

	<div id="skills">
		<h2>skills</h2>
		<p>
		<?php /* Getting portfolio post's tagged skills */
		$port_terms = get_the_terms($post->ID, 'portfolio_skills', '', ' ', '');
		foreach( $port_terms as $term ) {
		// Print the name method from $term which is an OBJECT
		print $term->name . '<br />';
		// Get rid of the other data stored in the object, since it's not needed
		unset($term);
		}
		?>
		</p>
	</div>
	
	<?php
	endif;
	?>
	
	<div id="copy">
		Copyright &copy; 2012 by Jessica Chan.
	</div>
</section>

<?php endwhile; ?>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>