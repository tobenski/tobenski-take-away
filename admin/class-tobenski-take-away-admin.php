<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Take_Away
 * @subpackage Tobenski_Take_Away/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tobenski_Take_Away
 * @subpackage Tobenski_Take_Away/admin
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Take_Away_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the Take Away CPT
	 *
	 * @since 1.0.0
	 */
	public function register_take_away_cpt()
	{
		$labels = array(
			'name'                     => 'Take Away Menuer',
			'menu_name'				   => 'Take Away',
			'singular_name'            => 'Take Away Menu',
			'add_new'                  => 'Tilføj Ny',
			'add_new_item'             => 'Tilføj Ny Take Away Menu',
			'edit_item'                => 'Rediger Take Away Menu',
			'new_item'                 => 'Ny Take Away Menu',
			'view_item'                => 'Vis Take Away Menu',
			'view_items'               => 'Vis Take Away Menuer',
			'search_items'             => 'Søg i Take Away Menuer',
			'not_found'                => 'Ingen Take Away Menuer',
			'not_found_in_trash'       => 'Ingen Take Away Menuer i Papirkurv',
			'parent_item_colon'        => array( null, __( 'Parent Page:' ) ),
			'all_items'                => 'Alle Take Away Menuer',
			'archives'                 => 'Take Away Menu Arkiver',
			'attributes'               => 'Take Away Menu Attributes',
			'insert_into_item'         => 'Insert into Take Away Menu', 
			'uploaded_to_this_item'    => 'Uploaded til denne Take Away Menu',
			'featured_image'           => 'Udvalgt billede',
			'set_featured_image'       => 'Vælg udvalgt billede',
			'remove_featured_image'    => 'Fjern udvalgt billede',
			'use_featured_image'       => 'Brug som udvalgt billede',
			'filter_items_list'        => 'Filtrer Take Away Menu liste', 
			'items_list_navigation'    => 'Take Away Menu liste navigation',
			'items_list'               => 'Take Away Menu liste',
			'item_published'           => 'Take Away Menu offentliggjort',
			'item_published_privately' => 'Take Away Menu offentliggjort privat',
			'item_reverted_to_draft'   => 'Take Away Menu lavet om til kladde',
			'item_scheduled'           => 'Take Away Menu planlagt',
			'item_updated'             => 'Take Away Menu opdateret',
		);

		$args = array(
			'rewrite' => array('slug' => 'take-away'),
			'labels' => $labels,
			'description' => 'Menuer til Det Gamle Posthus, Take Away.',
			'public' => true,
			'hierarchical' => false,
			'menu_position' => 21,
			'menu_icon' => 'dashicons-car',
			'has_archive' => false,
			'supports' => array(
				'title', 'thumbnail',
			),
			
			
		);
		register_post_type( 'take_away', $args);
	}

	/**
	 * Register the Take Away Custom Fields
	 *
	 * @since 1.0.1
	 */
	public function register_custom_fields()
	{
		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
				'key' => 'group_tob_yw3m0du4qi',
				'title' => 'Take Away Menu',
				'fields' => array(
					array(
						'key' => 'field_tob_hg97ae1fhn',
						'label' => 'Menu',
						'name' => 'take_away_menu',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
						'delay' => 0,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'take_away',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
			
			endif;
	}

	/**
	 * Register Take Away settings page
	 *
	 * @return void
	 */
	public function register_settings_page()
	{

		$option_page = acf_add_options_page(array(
            'page_title'    => __('Take Away Settings'),
			'menu_title'    => __('Settings'),		
			'menu_slug'     => 'tobenski-take-away-settings',
			'parent_slug'	=> 'edit.php?post_type=take_away',
            'capability'    => 'edit_posts',
			'redirect'      => false,
			'update_button' => __('Gem', 'acf'),
			'updated_message' => __("Instillinger er gemt", 'acf'),
		));
		
		// Settings
        acf_add_local_field_group(array(
            'key' => 'group_tob_k1c9hmc5np',
            'title' => 'Take Away Settings',
            'fields' => array(
                array(
                    'key' => 'field_tob_419yuo5pp8',
                    'label' => 'Beskrivelses Header',
                    'name' => 'tobenski_take_away_description_header',
                    'type' => 'text',
                    'instructions' => 'Hvad der skal stå som overskrift til beskrivelsen.',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Take Away',
                    'placeholder' => '',
				),
				array(
                    'key' => 'field_tob_a471lzyppk',
                    'label' => 'Beskrivelse',
                    'name' => 'tobenski_take_away_description',
                    'type' => 'wysiwyg',
                    'instructions' => 'Beskrivelsen til Take Away siden.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => "",
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'delay' => 0,
				),
				array(
					'key' => 'field_tob_37czfn1q6b',
					'label' => 'Top Image',
					'name' => 'tobenski_take_away_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'tobenski-take-away-settings',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
	}
}
