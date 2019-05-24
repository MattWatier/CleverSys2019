<?php
/**
* This is used in the product pages.
*/
function productbox($prodcutItem){
	$item_ID = $prodcutItem->ID;
	$item_title = $prodcutItem->post_title;
	$item_excerpt = get_field('excerpt',$item_ID);
	$item_slug = $prodcutItem->post_name;
	$item_type = $prodcutItem->post_type;
	$item_image = get_field("featured_image",$item_ID);
	$image_link = $item_image["sizes"]["thumbnail"];
	$baselink = get_bloginfo( 'wpurl' );
	if( $item_image == false || $image_link == "" ){ 
		$image_link = "http://placehold.it/300x150/333333/ffffff&text=".$item_title;
		}
	$item= "";
	$item .= <<<BLOCK
			<div class="prodcut_item panel">
				<img alt="$item_title $item_type" style="width:100%; margin-top:10px" src="$image_link">
				<h4 class="title">$item_title</h4>
				<p>$item_excerpt</p>
				<a href="/?$item_type=$item_slug" class="button small" title="learn more about $item_title">Learn More »</a>
			</div>
BLOCK;
	return $item;
}
?>
 