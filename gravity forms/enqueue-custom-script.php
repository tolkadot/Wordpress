/* https://www.gravityhelp.com/documentation/ */

add_action( 'gform_enqueue_scripts', 'tolka_custom_script', 10, 2 );
function tolka_custom_script( $form) {
wp_enqueue_script( 'tolkajs', get_stylesheet_directory_uri(). '/js/gravity-snippets.js', array(), '20170722' );
}
