<?php
/**
 * Not required for Full Site Editing.
 * Currently WordPress considers the theme broken without index.php file.
 */

if ( current_user_can( 'activate_plugins' ) ) {
	esc_html_e( 'This is an block based Full Site Editing theme and requires the Gutenberg plugin to be installed and active.', 'alara' );
}
