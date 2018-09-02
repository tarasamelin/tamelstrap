Place your theme language files in this directory.

Please visit the following links to learn more about translating WordPress themes:

https://make.wordpress.org/polyglots/teams/
https://developer.wordpress.org/themes/functionality/localization/
https://developer.wordpress.org/reference/functions/load_theme_textdomain/


__( 'bla bla bla', 'tamelstrap' ),

/**
 *
 * Load Theme Textdomain (Localize theme)
 *
 */
function tml_localize_theme(){
	load_theme_textdomain( 'tamelstrap', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'tml_localize_theme' );