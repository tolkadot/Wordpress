<?php
/**
 * Template Name: Regular Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


 ?>
 <!DOCTYPE html>
<html <?php language_attributes(); ?> <?php eighteen_tags_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( get_theme_mod( 'eighteen_tags_boxed_layout' ) ) {
	echo '<div class="col-full">';
}
?>
<div id="page" class="hfeed site">
	<?php
	do_action( 'eighteen_tags_before_header' ); 
	
	?>

	<header id="masthead" class="site-header" role="banner" <?php if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ');"'; } ?>>
		<div class="childColFull">
 
			<?php
			/**
			 * @hooked eighteen_tags_skip_links - 0
			 * @hooked eighteen_tags_hamburger_menu - 5
			 * @hooked eighteen_tags_social_icons - 10
			 * @hooked eighteen_tags_site_branding - 20
			 * @hooked eighteen_tags_product_search - 40
			 * @hooked eighteen_tags_primary_navigation - 50
			 * @hooked eighteen_tags_header_cart - 60
			 */
			do_action( 'child_nav' ); 
			?>

		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * @hooked eighteen_tags_header_widget_region - 10
	 */
	do_action( 'eighteen_tags_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'eighteen_tags_content_top' ); ?>
		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				do_action( 'eighteen_tags_page_before' );
				?>

	

				<?php get_template_part( 'content', 'page' ); ?>
	
				<?php
				/**
				 * @hooked eighteen_tags_display_comments - 10
				 */
				do_action( 'eighteen_tags_page_after' );
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php do_action( 'eighteen_tags_sidebar' ); ?>
<?php get_footer(); ?>
