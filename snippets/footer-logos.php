//Add in customiser section for the footer logos & their urls.
add_action( 'customize_register', 'tolka_customize_register' );
function tolka_customize_register( $wp_customize ) {
  $wp_customize->add_panel( 'footer-logos-panel-id', array(
        'priority' => 300,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Footer Logos', 'textdomain' ),
        'description' => __( 'This is where to add the footer logos.', 'textdomain' ),
    ));

  $wp_customize->add_section( 'footer-logos-section_id', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Add Logos', 'textdomain' ),
        'description' => '',
        'panel' => 'footer-logos-panel-id',
    ));

  for ($i=1; $i<6; $i++){
      $wp_customize->add_setting('logo'.$i, array(
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'absint'
      ));
      $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'logo'.$i, array(
          'section' => 'footer-logos-section_id',
          'label' => __('Logo ' .$i ),
          'mime_type' => 'image'
      )));
      $wp_customize->add_setting('logo-url'.$i, array(
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw'
      ));
      $wp_customize->add_control('logo-url'.$i, array(
          'section' => 'footer-logos-section_id',
          'label' => __('Logo Url ' .$i ),
          'type' => 'url',
      ));
  }
}

//show the footer logos
function show_footer_logos() {
  echo '<ul class="footer-logo-list">';
  for ($i=1; $i<6; $i++) {
    if ((get_theme_mod('logo'.$i ) != 0)) {
      echo '<li class="footer-logo-list-item"  ><a href="' . get_theme_mod('logo-url'.$i) . '
">';
      echo '<img src="' . wp_get_attachment_url(get_theme_mod('logo'.$i )) . '" alt="" />';
      echo '<a/></li>';
    }
  }
echo '</ul>';
}
