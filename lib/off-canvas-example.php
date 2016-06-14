<?php

add_action('genesis_after_header', 'sby_off_canvas');
function sby_off_canvas() {
	?>

     <!-- Off Canvas Trigger -->
	<button type="button" class="button primary trans-button" data-toggle="offCanvasCart">Open Menu</button>

     <!-- Off Canvas Content -->
     <div class="off-canvas position-right" id="offCanvasCart" data-off-canvas data-position="right">

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

	      <div class="off-canvas-content" data-off-canvas-content>
	        <!-- Page content -->
	      </div>
	<?php
}
