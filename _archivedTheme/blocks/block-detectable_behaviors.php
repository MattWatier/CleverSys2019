<?php 
$detectable_behaviors = wp_get_object_terms( get_the_ID() , 'behaviors');

if(!empty($detectable_behaviors)){
  if(!is_wp_error( $detectable_behaviors )){
    echo ' <div class="panel behaviors"><h5>Detectable Behaviors</h5><ul class="block-grid two-up">';
    foreach($detectable_behaviors as $term){
      echo '<li ><a href="'.get_term_link($term->slug, 'behaviors').'">'.$term->name.'</a></li>'; 
    }
    echo '</ul></div> ';
  }
} ?>
