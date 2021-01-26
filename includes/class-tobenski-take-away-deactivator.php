<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Take_Away
 * @subpackage Tobenski_Take_Away/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Tobenski_Take_Away
 * @subpackage Tobenski_Take_Away/includes
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Take_Away_Deactivator {

	/**
	 * Run deactivation function.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		self::recreate_pages();
	}

	/**
	 * Reset state of pages to before activation.
	 * 
	 * Delete the page created upon activation.
	 * Recreate pages backed up upon activation it they still exist.
	 *
	 * @since 1.0.0
	 */
	public static function recreate_pages()
	{
		// Delete the Take away page created on activation
		$take_away_page = get_page_by_path( '/take-away/', OBJECT, 'page' );
		wp_delete_post($take_away_page->ID); // Jeg tror det er sådan.
		
		// Recreate the Backup Page created if it existet on activation
		$page_exists = get_page_by_path( '/take-away-old/', ARRAY_A, 'page' );

        if( !$page_exists == null ) {
			$page_exists['post_name'] = 'take-away';
			$page_exists['post_status'] = 'publish';
			$page_exists['post_title'] = 'Take Away';
			wp_update_post($page_exists);
        }
	}
}
