<? $field = get_field("featured_publications");
if( $field != "" && $field != false){
	$items ="<div class='panel publication'><h3>Publications</h3>";
	$items .= '<p>'.$field.'</p>';
	$subfield = get_field("more_publications");
		if( $subfield != "" && $subfield != false){
			$items .="<ul class='accordion'><li><div class='title'><strong>More Publications</strong></div><div class='content'>";
			$items .=$subfield;
			$items .="</div></li></ul>";
		}
	$items .='</div>';
	echo $items;
 } ?>