<?php
/* Do Product Inner */
add_action( 'woocommerce_before_shop_loop_item', 'bolt_product_inner_open', 8 );
function bolt_product_inner_open() {
	echo '<div class="inner">';
}
add_action( 'woocommerce_after_shop_loop_item', 'bolt_product_inner_close', 10 );
function bolt_product_inner_close() {
	echo '</div>';
}
