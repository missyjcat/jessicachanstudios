<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts() 
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section id="left">
	<?php if ( have_posts() ): ?>
		<h1>Archive</h1>

	<h2><?php echo  get_the_date( 'M Y' ); ?></h2>

	<?php 
	while ( have_posts() ) : the_post(); ?>
    <div class="post">
        <h3 id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <small><?php the_time('F jS, Y') ?></small>
        <div class="entry-content">
            <?php the_excerpt() ?>
        </div><!-- .entry-content -->
    </div>

	<?php endwhile; ?>
	<?php else: ?>
	<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
	<?php endif; ?>
</section>
<div id="cats-archives">
	<div class="categories"><span class="hide-text">Categories</span></div>
	<div class="archives"><span class="hide-text">Archives</span></div>
</div>

<div id="category-menu"><?php wp_list_categories('title_li='); ?> </div>
<div id="archives-menu"><?php wp_get_archives(); ?></div>

	<div id="copy">
		Copyright &copy; 2012 by Jessica Chan.
	</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>