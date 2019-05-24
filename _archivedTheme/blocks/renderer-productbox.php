<?php
/**
* This is used in the product pages.
*/
function productbox($productItem){

	$item_ID = $productItem->term_id;
	$item_title = $productItem->post_title;
	$item_excerpt = get_field('excerpt',$item_ID);
	$meta = get_post_meta($item_ID);
	$item_slug = $productItem->post_name;
	$item_type = $productItem->post_type;
	$item_image = get_field("featured_image",$item_ID);
	$image_link = $item_image["sizes"]["wpf-featured"];
	$baselink = get_bloginfo( 'wpurl' );
	$field = get_field("featured_image",$item_ID);
	// if( $item_image == false || $image_link == "" ){ 
	// 	$image_link = "http://placehold.it/300x150/333333/ffffff&text=".$item_title;
	// 	}
	//$image = '<img alt="$item_title $item_type" style="width:100%; margin-top:10px" src="$image_link">'
	$item= "";																																				
	$item .= <<<BLOCK
			<div class="prodcut_item panel row " data="$field"> 
			<div class="columns eight"><h4 class="title" style="
			margin-top: .25em;
			margin-bottom: 0;
		">$item_title</h4><p>$item_excerpt</p></div>
			<div class="columns three " style="margin:0;"><a href="/CleverSysInc/$item_type/$item_slug" class="button expand" title="learn more about $item_title">Learn More »</a></div>
				
				
				
			</div>
BLOCK;
	return $item;
}
?>
 