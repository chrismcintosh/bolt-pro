<?php

include get_stylesheet_directory() . '/lib/woocommerce/product-inner.php';

//* Disable Default Woocommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//* Remove Woo Pagination
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
