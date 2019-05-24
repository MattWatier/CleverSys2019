<?php 
	$field  = get_field('extra_photos');
	if(count($field) != 0 && $field != false){
		$repeated = false;
		$items ='<div><h5 class="title">Images</h5><ul class="block-grid three-up" data-clearing>';
		foreach ($field as $image) {
			$image = $image["image"];
			if( $repeated == false ){ 
				$items  .= '<li style="width:100%;"><a href="'.$image["sizes"]["large"].'"><img style="margin:0 auto;" alt="bones-thumb-300" src="'.$image["sizes"]["post-thumbnail"].'" data-caption="'.$image["caption"].'"></a></li>';
			 }else{ 
				$items .= '<li style="height:150px;overflow: hidden;"><a href="'.$image["sizes"]["large"].'"><img src="'.$image["sizes"]["large"].'" data-caption="'.$image["caption"].'"></a></li>';
			}
			$repeated = true;
		}
		$items .= "</ul></div>";
		echo $items;
	}
?>