<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'homepage-sidebar' ) ) {
	return;
}
?>

<div class="widget-area homepage-sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<!-- <a href="http://dev.londonfrontrunners.org/calendar/main-calendar/" class="calendar-link">View calendar</a> -->
</div><!-- #secondary -->
