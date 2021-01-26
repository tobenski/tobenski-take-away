<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Take_Away
 * @subpackage Tobenski_Take_Away/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Tobenski_Take_Away
 * @subpackage Tobenski_Take_Away/includes
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Take_Away_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::create_page();
	}
	/**
	 * Create the page for showing take-away.
	 * 
	 * Checks if a page with slug take-away exists, if it does create a backup.
	 * The create the page for takeaway.
	 *
	 * @return void
	 */
	public static function create_page() {
		$page = array(
            'post_title' => 'Take Away',
            'post_content' => '', // Add the scortcode here??
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'take-away',
		);
		
		$page_exists = get_page_by_path(  '/' . $page['post_name'] . '/', OBJECT, 'page' );

        if( $page_exists == null ) {
            // Page doesn't exist, so lets add it
            wp_insert_post( $page );
        } else {
			// Page exits - rename it, and add the page
			wp_update_post(array([
				'ID' => $page_exists->id,
				'page_name' => 'take-away-old',
				'post_status' => 'draft',
				'post_title' => 'Take Away Backup',
			]));
			// Now add the page.
			wp_insert_post( $page );
		}
	}

}
