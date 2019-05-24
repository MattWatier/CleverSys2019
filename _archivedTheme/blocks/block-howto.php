

<div id="howto" class="hide-for-small">
	<div class="panel radius">

		<?php 
			$advertID = 1795;
			$wp_page = get_page($advertID);
			$item = "";
			$item .= $wp_page ->post_content;
			echo $item;
		 ?>
		
	</div>
</div>
