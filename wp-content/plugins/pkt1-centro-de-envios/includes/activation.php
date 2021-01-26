<?php
/*
* @package WooCommerce PKT1 Centro de Envíos
*/
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit si se accesa directamente
}

if(!function_exists('pkt1_activation')){
  function pkt1_activation(){
    //validar si existen pkt1 settings
    if(!get_option('pkt1_settings')){
      add_option('pkt1_settings', array(
        'pkt1_token'=>'',
        'pkt1_resultados'=>0,
        'pkt1_idcliente'=>'',
        'pkt1_username'=>'',
        'pkt1_secret'=>'',
        'pkt1_existesucursal'=>'enabled',
        'pkt1_modooscuro'=>''
      ));
    }

    global $wpdb;
    $table_name = $wpdb->prefix . "pkt1"; 

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      idorder mediumint(9) NOT NULL,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      idbooking mediumint(9) NOT NULL,
      branch tinytext NOT NULL,
      rastreo tinytext NOT NULL,
      label text NOT NULL,
      zpl text NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    
  }

}
