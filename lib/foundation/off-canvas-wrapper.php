<?php


add_action('genesis_before', 'bolt_pro_off_canvas_open');
function bolt_pro_off_canvas_open() {
	echo '<div class="off-canvas-wrapper">';
	?>

	<!-- Off Canvas Trigger -->
	<button type="button" class="button primary trans-button" data-toggle="off-canvas-menu">Open Menu</button>

	 <!-- Off Canvas Menu -->
	 <div class="off-canvas position-right" id="off-canvas-menu" data-off-canvas>

		<!-- Close button -->
		<button class="close-button" aria-label="Close menu" type="button" data-close>
		  <span aria-hidden="true">&times;</span>
		</button>

		<!-- Menu -->
		<ul class="vertical menu">
		  <li><a href="#">Foundation</a></li>
		  <li><a href="#">Dot</a></li>
		  <li><a href="#">ZURB</a></li>
		  <li><a href="#">Com</a></li>
		  <li><a href="#">Slash</a></li>
		  <li><a href="#">Sites</a></li>
		</ul>

		</div>

		<?php echo '<div class="off-canvas-content" data-off-canvas-content>';
}

add_action('genesis_after', 'bolt_pro_off_canvas_close');
function bolt_pro_off_canvas_close() {
		echo '</div>';
	echo '</div>';
}

add_action('genesis_after_header', 'bolt_pro_off_canvas_trigger');
function bolt_pro_off_canvas_trigger() {
	?>

     <!-- Off Canvas Trigger -->
	<button type="button" class="button primary trans-button" data-toggle="off-canvas-menu">Open Menu</button>

	<?php
}
