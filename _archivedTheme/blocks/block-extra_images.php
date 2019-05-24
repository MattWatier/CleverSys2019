<?php 
	$field  = get_field('extra_photos');
	if(count($field) != 0 && $field != false){
		$repeated = false;
		$items ='<div><h5 class="title">Images</h5>';
		foreach ($field as $image) {
			$image = $image["image"];
			if( $repeated == false ){ 
				$items  .= '<a href="'.$image["sizes"]["large"].'"><img style="margin:0 auto 15px; display: block;" alt="bones-thumb-300" src="'.$image["sizes"]["medium"].'" data-caption="'.$image["caption"].'"></a><ul class="block-grid four-up" >';
			 }else{ 
				$items .= '<li style="height:80px;overflow: hidden;"><a href="'.$image["sizes"]["large"].'"><img src="'.$image["sizes"]["large"].'" data-caption="'.$image["caption"].'"></a></li>';
			}
			$repeated = true;
		}
		$items .= "</ul></div>";
		echo $items;
	}
?>