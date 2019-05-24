<? $field = get_field("documents");
	
	if( count($field) != 0 && $field != false){
		$items ="<div class='panel callout'><h3>Documents</h3>";
		$repeated = false;
		foreach($field as $document){
			if($repeated == true){$items .= "<hr>";}
			$items .= '<p>'.$document["name_of_document"].'</p>';
			$items .= '<p>'.$document["description"].'</p>';
			$items .= '<a target="_blank" href="'.$document["link_to_document"] .'" class="button">Download PDF</a>';
			$repeated = true;
			}
		$items .='</div>';
		echo $items;
 } ?>