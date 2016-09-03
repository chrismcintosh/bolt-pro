<?php


add_action('genesis_before', 'sby_off_canvas_open');
function sby_off_canvas_open() {
	echo '<div class="off-canvas-wrapper">';
	echo '<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>';
}

add_action('genesis_after', 'sby_off_canvas_close');
function sby_off_canvas_close() {
	echo '</div>';
	echo '</div>';
}
