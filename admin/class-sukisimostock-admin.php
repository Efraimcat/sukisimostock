<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Sukisimostock
 * @subpackage Sukisimostock/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sukisimostock
 * @subpackage Sukisimostock/admin
 * @author     Efraim Bayarri <efraim@efraim.cat>
 */
class Sukisimostock_Admin {

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
		add_action('init', array( $this, 'register_custom_post_types' ));
		add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sukisimostock-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sukisimostock-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 *     Custom Post Types
	 */
	public function register_custom_post_types(){
	    $customPostTypeArgs = array(
	        'label'=>'Productos Sukisimo',
	        'labels'=>
	        array(
	            'name'=>'Productos',
	            'singular_name'=>'Producto',
	            'add_new'=>'Añadir producto',
	            'add_new_item'=>'Añadir nuevo producto',
	            'edit_item'=>'Editar producto',
	            'new_item'=>'Nuevo producto',
	            'view_item'=>'Ver producto',
	            'search_items'=>'Buscar producto',
	            'not_found'=>'No se encontraron productos',
	            'not_found_in_trash'=>'No se encontraron productos en la papelera',
	            'menu_name' => 'Productos',
	            'name_admin_bar'     => 'Productos',
	        ),
	        'public'=>false,
	        'description'=>'Productos Sukisimo',
	        'exclude_from_search'=>false,
	        'show_ui'=>true,
	        'show_in_menu'=>$this->plugin_name,
	        'supports'=>array('title', 'custom_fields'),
	        'taxonomies'=>array()
        );
	        
	    // Post type, $args - the Post Type string can be MAX 20 characters
	    register_post_type( 'ProductosSukisimo', $customPostTypeArgs );
	    //
	    $customPostTypeArgs = array(
	        'label'=>'Proveedores Sukisimo',
	        'labels'=>
	        array(
	            'name'=>'Proveedores',
	            'singular_name'=>'Proveedor',
	            'add_new'=>'Añadir proveedor',
	            'add_new_item'=>'Añadir nuevo proveedor',
	            'edit_item'=>'Editar proveedor',
	            'new_item'=>'Nuevo proveedor',
	            'view_item'=>'Ver proveedor',
	            'search_items'=>'Buscar proveedor',
	            'not_found'=>'No se encontraron proveedores',
	            'not_found_in_trash'=>'No se encontraron proveedores en la papelera',
	            'menu_name' => 'Proveedores',
	            'name_admin_bar'     => 'Proveedores',
	        ),
	        'public'=>false,
	        'description'=>'Proveedores Sukisimo',
	        'exclude_from_search'=>false,
	        'show_ui'=>true,
	        'show_in_menu'=>$this->plugin_name,
	        'supports'=>array('title', 'custom_fields'),
	        'taxonomies'=>array()
	    );
	    
	    // Post type, $args - the Post Type string can be MAX 20 characters
	    register_post_type( 'ProveedoresSukisimo', $customPostTypeArgs );
	}
	
	/**
	 *     Custom Post Types
	 */
	public function addPluginAdminMenu() {
	    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	    add_menu_page( 'Sukisimo Stock', 'Sukisimo Stock', 'administrator', $this->plugin_name, array( $this, 'display_plugin_admin_dashboard' ), plugin_dir_url( FILE ) . 'img/logo-icon.png', 26 );
	}

}
