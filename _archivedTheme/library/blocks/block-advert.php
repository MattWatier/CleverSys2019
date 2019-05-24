

<div id="advert" class="hide-for-small">
	<div class="panel radius">

		<?php 
			$advertID = 997;
			$wp_page = get_page($advertID);
			$item = "";
			$item .= $wp_page ->post_content;
			echo $item;
		 ?>
		
	</div>
</div>
