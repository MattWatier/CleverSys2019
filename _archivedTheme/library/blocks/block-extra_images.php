<?php 
	$field  = get_field('extra_photos');
	if($field != ""){
		$items ='<div><h5 class="title">Images</h5><ul class="block-grid three-up" data-clearing>';
		foreach ($field as $image) {
			$image = $image["image"];
			$items .= '<li><a href="'.$image["sizes"]["wpf-featured"].'"><img src="'.$image["sizes"]["thumbnail"].'" data-caption="'.$image["caption"].'"></a></li>';
		}
		$items .= "</ul></div>";
		echo $items;
	}
?>