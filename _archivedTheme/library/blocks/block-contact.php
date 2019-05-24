
<div class="support">
	<div class="panel callout radius">
		<img src="<? echo get_template_directory_uri(); ?>/images/support-help.png" alt="Help and support are standing by."/>
		<div class="content">
		<?php 
			$advertID = 1001;
			$wp_page = get_page($advertID);
			$item = "";
			$item .= $wp_page ->post_content;
			echo $item;
		 ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
