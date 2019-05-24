<?php
/* Hardware Package

  Hardware Screen Shots
  Title
  Content
  Documents
  Dimensions
  Cite
  Associated Software


   */
?>

<?php get_header(); ?>
			
			<div class="clearfix row csi-products">
			
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<header class="csi-product column twelve"><h1 class="column"><?php the_title(); ?></h1></header>
					<div class="main clearfix" role="main">
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						

						<section class="post_content clearfix">
                           
                                
                                <? $field = get_field("featured_image");
                                	if($field!=''){
                                	$items = ' <div class=" panel"><img style="margin:0 auto;display:block;" src="'.$field["sizes"]["wpf-featured"].'" alt="'.$field["caption"].'"></div>';
                                	echo $items;}
                                 ?>
                            
                            <div>
                            	<h4>Description</h4>
								<?php the_content();
								 $postID = get_the_ID();?>
                            </div>
	                       <h4>Dimensions</h4>
                       		<? $field = get_field("dimenstions");
                       		if($field != ''){
                       			$bool = true;
                       			$items = "";
                       			$items .= "<table cellspacing='0' cellpadding='0' class='dimensions'><thead><td>item</td><td>width</td><td>length</td><td>height</td><td>animal</td></thead><tbody>";
                       			foreach($field as $dimenstion):
									$items .= '<tr';
									$items .= ($bool)? " clas='even '" : " clas='odd' " ;
									$items .= '><td>'.$dimenstion["extra"].'</td><td>'.$dimenstion["width"].'<em>&nbsp;'.$dimenstion["scale"].'</em></td><td>'.$dimenstion["length"].'<em>&nbsp;'.$dimenstion["scale"].'</em></td><td>'.$dimenstion["height"].'<em>&nbsp;'.$dimenstion["scale"].'</em></td><td>'.implode(",", $dimenstion["animal"]).'</td></tr>';
                       				$bool = !$bool;


                       			endforeach;
                       			$items .= '</tbody></table>';
                       			echo $items;}
                       		?>                            
						</section> <!-- end article section -->
						

					
					</article> <!-- end article -->
				</div> <!-- end #main -->
				<div class="sidebar">
						<?php 
						include 'blocks/block-document.php'; 
						include 'blocks/block-extra_images.php';
						include 'blocks/renderer-related_products.php';
						$related_products = related_products($postID);
						echo $related_products;
	                    include 'block-behavior_recognition.php'; ?>	
				</div> <!-- end sidebar -->
			</div> <!-- end #content -->

		<?php endwhile; ?>			
		<?php else : ?>
			<article id="post-not-found">
			    <header>
			    	<h1>Not Found</h1>
			    </header>
			    <section class="post_content">
			    	<p>Sorry, but the requested resource was not found on this site.</p>
			    </section>
			    <footer>
			    </footer>
			</article>
		<?php endif; ?>
<?php get_footer(); ?>