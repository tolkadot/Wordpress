//copyright 
function tolka_copyright() {

$today = getdate();
$thisyear = $today[year];
$copyright = "&copy; " . $thisyear . " KBS Engineering";
return $copyright;

}
add_shortcode( 'do_copyright', 'tolka_copyright' );


echo do_shortcode('[CONTACT-US-FORM]');
