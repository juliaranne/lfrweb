<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php twentyseventeen_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar-8") ) : ?>
		<?php endif;?>
		<?php
			the_content();
			

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
		?>
		<?php
		query_posts('category_name=news'); /*1, 2*/
		if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article class="news-post">
			<h2 class="news-title--red"><?php the_title();/*3*/ ?></h2>
			<?php the_content(); ?>
			<?php if ( '' !== get_the_post_thumbnail()) : ?>
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			<?php endif; ?>
			<p class="tags"><?php the_tags(); ?></p>
			<p class="news-date"><?php echo get_post_meta($post->ID, 'date', true); ?></p>
		</article>

		<hr class="post-rule" />
		<?php endwhile; ?> <?php wp_reset_query(); /*4*/ ?>
		
		
	</div><!-- .entry-content -->
</article><!-- #post-## -->
