<?php
/**
 * Template part for displaying page content in page.php with menu
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
	<aside class="inpage-menu">
	<?php $menuItem = get_post_meta($post->ID, 'sub-menu', false); ?>
		<ul class="plain-list inpage-menu-list">
			<?php
			if ($menuItem){
			 	foreach($menuItem as $item) {
					echo '<li class="inpage-menu-item">'.$item.'</li>';
				} 
			}
			?>
		</ul>
	</aside>
	<div class="entry-content entry-content__with-menu">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar-8") ) : ?>
		<?php endif;?>
		<?php
			the_content();
			

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
		?>
		
		
	</div><!-- .entry-content -->
</article><!-- #post-## -->
