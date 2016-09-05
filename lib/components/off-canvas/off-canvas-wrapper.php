<?php


add_action('genesis_before', 'bolt_pro_off_canvas_open');
function bolt_pro_off_canvas_open() {
	echo '<div class="off-canvas-wrapper">';
	echo '<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>';
}

add_action('genesis_after', 'bolt_pro_off_canvas_close');
function bolt_pro_off_canvas_close() {
	echo '</div>';
	echo '</div>';
}
