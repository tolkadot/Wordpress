<?php
/*************************************************************************************************************************************/
/** THIS IS MY ALTERED CODE TO CHANGE THE NAV for the regular-page.php template
I've added in a class to the main div - regPAgeHeader - for styling */

if ( ! function_exists( 'eighteen_tags_child_navigation' ) ) {

	function eighteen_tags_child_navigation() {
		$post_type_field = '';
		$search_pt = explode( ',', get_theme_mod( 'eighteen-tags-pro-search-post_type', 'post,page' ) );
		if ( 1 < count( $search_pt ) ) {
			foreach( $search_pt as $pt ) {
				$post_type_field .= "<input type='hidden' name='post_type[]' value='{$pt}' />";
			}
		} else {
			$post_type_field = "<input type='hidden' name='post_type' value='{$search_pt[0]}' />";
		}
		?>
		<div class='headerfull blue'><div id="site-navigation" class="main-navigation regPageHeader childColFull" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'eighteen-tags' ); ?>">
		
		<div class="etp-nav-search" style="display: none;">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
					<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
					<input type="submit" value="&#xf002;" />
					<?php echo $post_type_field ?>
				</form>
				<a class='etp-nav-search-close'><i class='fa fa-close'></i></a>
			</div><!-- .etp-nav-search -->
			<a class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><?php echo esc_attr( apply_filters( 'eighteen_tags_menu_toggle_text', 'Navigation' ) ); ?></a>
			
			<!-- ADDED  --> 
			<div id="regPageName"><a href="https://janine-tolkadot.c9users.io/">ortho-bionomy melbourne</a></div>
		<!-- ADDED CLASS HERE -->
		<div class="red"> 	<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'primary',
					'container_class'	=> 'primary-navigation',
				)
			); ?></div>
			<?php

			echo '<div class="handheld-navigation">';
				wp_nav_menu(
					array(
						'theme_location'	=> 'handheld',
						'container_class'	=> '',
					)
				);
				?>  
				<div class="etp-nav-search">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
						<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
						<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
						<input type="submit" value="&#xf002;" />
						<?php echo $post_type_field ?>
					</form>
				</div><!-- .etp-nav-search -->
				</div>
				
			</div>
			<!-- ADDED A DIV HERE -->
			<div class='buttonHeader childColFull'> <button>book a session</button><button>book a training session</button>  
			       <div style="float:right;" class="social-info">
				   <a target="_blank" href="facebook">
				   <i class="fa fa-facebook"></i>
					</a>
					</div>
			</div>
			<?php
			do_action( 'eighteen_tags_pro_in_nav' );
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}
?>
<?php
add_action ( 'child_nav', 'eighteen_tags_child_navigation' );

?>
