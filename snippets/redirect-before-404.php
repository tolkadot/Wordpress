
function redirect_about_on_404(){
    if( is_404() ){
        $about = "https://kbssengineering-kbssengineering.c9users.io/about";
        $projects = "https://kbssengineering-kbssengineering.c9users.io/projects";
        global $wp;
        $current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
        $pieces = explode("?", $current_url);
          if($pieces[0] == $about) {
          wp_redirect( "https://kbss.com.au/our-approach/" , $status = 301);
          exit;
          }
          elseif($pieces[0] == $projects) {
          wp_redirect( "http://kbss.com.au/our-projects/" , $status = 301);
          exit;
          }
    }
}
add_action( 'template_redirect', 'redirect_about_on_404' );
