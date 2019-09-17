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
		<?php wp_nav_menu( array(
			'theme_location' => 'members',
			'menu_id'        => 'member-menu',
		) ); ?>
		
		
	</div><!-- .entry-content -->
</article><!-- #post-## -->
