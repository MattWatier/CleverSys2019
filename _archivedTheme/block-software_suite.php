<div class="panel software-suite">
<h3>Software Suites</h3>
<?php 
	$args = array('taxonomy' => 'software-suite' );  
	$custom_cat =  get_categories( $args );
		$items = '<ul  class="accordion">';
		foreach ($custom_cat as $Suite) {
			$items .= '<li><div class="title"><h4>'.$Suite->name.'<h4></div><div class="content"><p>'.$Suite->description.'<p>';
			$items .= '<h5>Included Software</h5>';

	
			$args = array(
			   'post_type' => 'csi_products',
			   'software-suite' => $product->slug
			);
			$software = get_posts ( $args );

			$items .= '<ul class="row"><li class="column six">Software A</li><li class="column six">Software B</li></ul>';
			$items .='</div></li>';
		}
		$items .='</ul>';
		echo $items;
	?>
</div>