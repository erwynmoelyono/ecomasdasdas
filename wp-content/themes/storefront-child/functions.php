<?php

//Ini Adalah Halaman yang di load pertama sebelum semuanya terload
//Tetapi setelah semua action/filter di add

remove_action('storefront_footer','storefront_credit',20);


function storefront_credit(){
    ?>
    <h3>Copyright By Erwin</h3>
    <h5>E-commerce 2022</h5>

    <?php
}
add_action('storefront_footer','storefront_credit',20);


add_filter('woocommerce_shipping_packages', function($d){


    $totalBerat = 0;
    $cost = 0;
    foreach ($d[0]["contents"] as $key => $val) {
        $q = $val["quantity"];
        $p = $val["data"];
        /** @var WC_Product $p */
        $berat = $p->has_weight();
        $berat = $berat * $q;
        $totalBerat+= $berat;
    }
   
    foreach ($d[0]["rates"] as $val) {
        /** @var WC_Shipping_Rate $val */
        $cost = $val->get_cost() * $totalBerat;
        $val->set_cost($cost);
    }
    var_dump($cost);
    return $d;

});