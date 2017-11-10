USE ACF to create a custom post field canonical_url

///////////////////////////////// KOKONORTH ?????????????????????????

if( function_exists( 'rel_canonical' ) )
{
    remove_action( 'wp_head', 'rel_canonical' );
}

function rel_canonical_with_custom_tag_override()
{
    if( !is_singular() )
        return;

    global $wp_the_query;
    if( !$id = $wp_the_query->get_queried_object_id() )
        return;

    // check whether the current post has content in the "canonical_url" custom field
    $canonical_url = get_field("canonical_url");
    //var_dump( $canonical_url);
    if( '' != $canonical_url )
    {
        // trailing slash functions copied from http://core.trac.wordpress.org/attachment/ticket/18660/canonical.6.patch
        $link = user_trailingslashit( trailingslashit( $canonical_url ) );
    }
    else
    {
        $link = get_permalink( $id );
    }
    echo "<link rel='canonical' href='" . esc_url( $link ) . "' />\n";
}

add_action( 'wp_head', 'rel_canonical_with_custom_tag_override' );




