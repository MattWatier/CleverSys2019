<?php
/**
* 
*/

	function productbox($prodcutItem)
	{
	$item_ID = $prodcutItem->ID;
	$item_title = $prodcutItem->post_title;
	$item_excerpt = get_field('excerpt',$item_ID);
	$item_slug = $prodcutItem->post_name;
	$item_type = $prodcutItem->post_type;
	$item_image = get_field("featured_image",$item_ID);
	$image_link = $item_image["sizes"]["bones-thumb-300"];
	$baselink = get_bloginfo( 'wpurl' );
	if( $item_image == false || $image_link == "" ){ 
	$image_link = "http://placehold.it/300x150/333333/ffffff&text=".$item_title;
	}

	$item= "";


/*	$item .= <<<BLOCK
			<div class="prodcut_item revealer">
			<div class="reveal-holder">
			<img alt="$item_title $item_type" src="$image_link">
			<h2 class="title">$item_title</h2>
			</div>
			<div class="reveal-slide">
			<h2 class="title">$item_title</h2>
			<p class="column">$item_excerpt</p>
			<a href="/Cleversys/?$item_type=$item_slug" class="button" title="learn more about $item_title">Learn More »</a>
			</div>
			<div class="toggle"><span class="icon">toggle</span></div>
			</div>
BLOCK;
*/


	$item .= <<<BLOCK
			<div class="prodcut_item revealer">
			<div class="reveal-holder">
			<img alt="$item_title $item_type" src="$image_link">
			<h2 class="title">$item_title</h2>
			<p class="column">$item_excerpt</p>
			<a href="?$item_type=$item_slug" class="button" title="learn more about $item_title">Learn More »</a>
			</div>
			</div>
BLOCK;



			return $item;
	}



?>
