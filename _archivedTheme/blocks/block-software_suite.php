<div class="panel software-suite">
<h3>Software Suites</h3>
<?php 
	$args = array('taxonomy' => 'software-suite' );  
	$custom_cat =  get_categories( $args );
	$baselink = '';
	$items = '<ul  class="accordion">';
		foreach ($custom_cat as $Suite) {
			$items .= '<li><div class="title"><h4>'.$Suite->name.'</h4></div><div class="content"><p>'.$Suite->description.'</p>';
			$items .= '<h5>Included Software</h5>';

	
			$args = array(
			   'post_type' => 'csi_products',
			   'taxonomy' => $Suite->slug,
			   'software-suite' => $Suite->slug
			);
			$softwaresuite = get_posts ( $args );
			$items .= '<ul class="row">';
			foreach ($softwaresuite as $software) {
				$items .= '<li class="column six"><a href="'.$baselink.'/?post_type=csi_products&amp;p='.$software->ID.'">'.$software->post_title.'</a></li>'."\n";
			}
			
			$items .='</ul>'."\n".'</div></li>'."\n";
		}
		$items .='</ul>';
		echo $items;
	?>
</div>