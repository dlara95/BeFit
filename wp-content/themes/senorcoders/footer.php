<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Senorcoders
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="logo">
		<?php the_custom_logo(); ?>
		</div>
		<div class="widget-1">
			<?php if ( is_active_sidebar( 'footer_1' ) ) {  
				dynamic_sidebar( 'footer_1' ); 
			} ?>
		</div>
		<div class="widget-2">
			<?php if ( is_active_sidebar( 'footer_2' ) ) {  
				dynamic_sidebar( 'footer_2' ); 
			} ?>
		</div>
		<div class="widget-3">
			<?php if ( is_active_sidebar( 'footer_3' ) ) {  
				dynamic_sidebar( 'footer_3' ); 
			} ?>
		</div>
		<div class="site-info">			
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'All Rights Reserved %s', 'senorcoders' ), date('Y') );
			?>			
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Carefully crafted by %1$s.', 'senorcoders' ), '<a href="">Senorcoders</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
