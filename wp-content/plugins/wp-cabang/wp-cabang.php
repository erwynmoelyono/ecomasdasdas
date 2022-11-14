<?php

/**
 * Plugin Name:       Simple Cabang
 * Plugin URI:        https://sib.stts.edu/~ben
 * Description:       Cabang Master di database
 * Version:           1.0
 * Requires at least: 5.8
 * Requires PHP:      7.2
 * Author:            Benyamin Limanto
 * Author URI:        https://sib.stts.edu/~ben
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       simple-cabang
 */

 // Kedua haris membuat Hooking
 // 1, Karena kita harus bikin tabel, misal !

function wpc_activate(){
    /** @var \wpdb $wpdb */
    global $wpdb;
    $query= "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wp_cabang(
        id int(11) auto_increment primary key,
        nama varchar(200) not null,
        alamat text not null,
        telpon varchar(150) not null
    );";
    $r = $wpdb->query($query);
    if($r === false){
        throw new Exception("Gagal Buat Tabel" , 1);
    }
}

function wpc_uninstall(){
    /** @var \wpdb $wpdb */
    global $wpdb;
    $query= "DROP TABLE IF EXISTS {$wpdb->prefix}wp_cabang;";
    $r = $wpdb->query($query);
    if($r === false){
        throw new Exception("Gagal Buat Tabel" , 1);
    }
}

register_activation_hook(__FILE__, "wpc_activate");
register_uninstall_hook(__FILE__, "wpc_uninstall");


// Ini untuk hook admin menu
add_action(
    "admin_menu", 
    // Import the hook menu
    function() {
        require_once __DIR__."/wpc-menu.php";
    }
);

function wpc_sc_list($atts= [], $content = null){
    /** @var \wpdb $wpdb */
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}wp_cabang";
    $data = $wpdb->get_results($query);
    include __DIR__."/page/list.php";
}
add_shortcode("wpc_list","wpc_sc_list");

?>