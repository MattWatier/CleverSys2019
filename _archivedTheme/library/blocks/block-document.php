<? $field = get_field("documents");
	if( $field != "" ){
 ?>
<div class="panel callout"> 
	<h3>Documents</h3>
	<? 
		$items ="";
		if($field==""){echo "empty";}
		foreach($field as $document){
			$items .= '<p>'.$document["name_of_document"].'</p>';
			$items .= '<a target="_blank" href="'.$document["link_to_document"] .'" class="button">Download PDF</a>';
			}
		echo $items;
	?>
</div> <!-- end .panel -->
<? } ?>