<?php

function wpc_page_list(){
    /** @var \wpdb $wpdb */
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}wp_cabang";
    $data = $wpdb->get_results($query);
    include __DIR__."/page/list.php";
}

function wpc_page_insert(){
    /** @var \wpdb $wpdb */
    global $wpdb;
    if(isset($_POST["btnTambah"])){

        // // Ini gaya PDO
        // $query = "INSERT INTO {$wpdb->prefix}wp_cabang(nama,alamat,telpon)
        // VALUES (%s,%s,%s);";
        
        // $q = $wpdb->prepare($query,[
        //     $_POST["nama"], $_POST["alamat"], $_POST["telepon"],
        // ]);

        // $r = $wpdb->query($q);
        // Seperti laravel

        $r = $wpdb->insert("{$wpdb->prefix}wp_cabang", [
            "id" => null,
            "nama" => $_POST["nama"],
            "telpon" => $_POST["telepon"],
            "alamat" => $_POST["alamat"],
        ]);
    }
    include __DIR__."/page/insert.php";
}
add_menu_page(
    "List Cabang Master", // Nama title page
    "List Cabang", // Nama menu
    "edit_published_posts", // Caps lihat role
    "wpcm_list", // ID menu, harus unik
    "wpc_page_list" // Nama fungsi yang dipanggil
);

add_submenu_page(
    "wpcm_list",
    "List Cabang Master", // Nama title page
    "Insert Cabang", // Nama menu
    "edit_published_posts", // Caps lihat role
    "wpcm_insert", // ID menu, harus unik
    "wpc_page_insert" // Nama fungsi yang dipanggil
);