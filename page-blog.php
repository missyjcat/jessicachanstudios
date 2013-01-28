<?php
/*
 Template Name: Blog Page
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section id="left">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <h2><span class="hide-text"><?php the_title(); ?></span></h2>
    <?php endwhile; ?>
    
      <?php
    $temp = $wp_query;
    $wp_query= null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=-7,-6,-56,-57'.'&posts_per_page=3'.'&paged='.$paged);
    while ($wp_query->have_posts()) : $wp_query->the_post();
    ?>
    
    <div class="post">
        <h3 id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <small><?php the_time('F jS, Y') ?></small>
        <div class="entry-content">
            <?php the_excerpt() ?>
        </div><!-- .entry-content -->
    </div>
        <?php endwhile; ?>
    <div class="navigation">
        <div class="prev"><?php posts_nav_link('</div><div class="next">','Prev Page','Next Page') ?></div>
    </div>
    
      <?php $wp_query = null; $wp_query = $temp;?>

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