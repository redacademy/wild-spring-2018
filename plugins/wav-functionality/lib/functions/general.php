<?php
/**
 * GENERAL HOUSEKEEPING
 *
 */

class RF_General {

   /**
    * Add actions and filters
    *
    * @since 1.0.0
    */
   public function __construct() {

      // General housekeeping
      add_filter( 'http_request_args', array( $this, 'hide_plugin_from_updates' ), 5, 2 );
      add_action( 'admin_notices', array( $this, 'hide_update_notice_nonadmins' ), 1 );

      // Admin bar and menus customization
      add_action( 'admin_menu', array( $this, 'remove_menus' ) );
      add_action( 'admin_menu', array( $this, 'remove_submenus' ), 110 );

      // Customize post type UI
      add_filter( 'post_updated_messages', array( $this, 'set_updated_messages' ) );

   }

   /**
    * Activation tasks
    *
    * @since 1.0.0
    */
   public static function plugin_activation() {
      if ( ! current_user_can( 'activate_plugins' ) )
         return;

      $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
      check_admin_referer( "activate-plugin_{$plugin}" );

      // Flush permalink rewrite rules
      flush_rewrite_rules();

      // Do other activation things here...
   }

   /**
    * Don't update plugin
    *
    * @since 1.0.0
    *
    * This prevents you being prompted to update if there's a public plugin
    * with the same name.
    *
    * @author Mark Jaquith
    * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
    *
    * @param  array  $r   Request arguments
    * @param  string $url Request url
    * @return array       Request arguments
    */

   public function hide_plugin_from_updates( $r, $url ) {
   	if ( 0 !== strpos( $url, 'http://api.wordpress.org/plugins/update-check' ) )
   		return $r; // Not a plugin update request. Bail immediately.

      $plugins = unserialize( $r['body']['plugins'] );
   	unset( $plugins->plugins[ plugin_basename( __FILE__ ) ] );
   	unset( $plugins->active[ array_search( plugin_basename( __FILE__ ), $plugins->active ) ] );
   	$r['body']['plugins'] = serialize( $plugins );
   	return $r;
   }

   /**
    * Hide core update notice for all but Admins
    *
    * @since 1.1.0
    */
   public function hide_update_notice_nonadmins() {
   	if ( ! current_user_can( 'update_core' ) ) {
   		remove_action( 'admin_notices', 'update_nag', 3 );
   	}
   }

   /**
    * Remove unused menu items by adding them to the array
    *
    * @since 1.0.0
    */
   public function remove_menus() {
   	global $menu;
   	$restricted = array();
   	// Example:
   	//$restricted = array( __('Dashboard'), __('Posts'), __('Media'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins') );
   	end ($menu);
   	while ( prev( $menu ) ){
   		$value = explode( ' ',$menu[key($menu)][0] );
   		if( in_array( $value[0] != NULL?$value[0]:"" , $restricted ) ){ unset($menu[key($menu)] ); }
   	}
   }

   /**
    * Remove unnecesary sub-menu links
    *
    * @since 1.0.0
    */
   public function remove_submenus() {
   	remove_submenu_page( 'themes.php', 'theme-editor.php' );
   	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
   }

   /**
    * Change post update messages to be post type-specific
    *
    * @since 1.0.0
    */
   public function set_updated_messages( $messages ) {
      global $post, $post_ID;

      $post_type = get_post_type( $post_ID );
      $obj = get_post_type_object( $post_type );
      $singular = $obj->labels->singular_name;

      $messages[$post_type] = array(
         0 => '', // Unused. Messages start at index 1.
         1 => sprintf( __( $singular.' updated. <a href="%s">View '.strtolower( $singular ).'</a>' ), esc_url( get_permalink( $post_ID ) ) ),
         2 => __( 'Custom field updated.' ),
         3 => __( 'Custom field deleted.' ),
         4 => __( $singular.' updated.' ),
         5 => isset( $_GET['revision'] ) ? sprintf( __( $singular.' restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
         6 => sprintf( __( $singular.' published. <a href="%s">View '.strtolower( $singular ).'</a>' ), esc_url( get_permalink( $post_ID ) ) ),
         7 => __( $singular.' saved.' ),
         8 => sprintf( __( $singular.' submitted. <a target="_blank" href="%s">Preview '.strtolower( $singular ).'</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
         9 => sprintf( __( $singular.' scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview '.strtolower( $singular ).'</a>' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
         10 => sprintf( __( $singular.' draft updated. <a target="_blank" href="%s">Preview '.strtolower( $singular ).'</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
      );

      return $messages;
   }

}

new RF_General();
