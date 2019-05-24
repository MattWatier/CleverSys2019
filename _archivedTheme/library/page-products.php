<?php
/*
Template Name: Products Page
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix row">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header class="twelve column row"><h1 class="column"><?php the_title(); ?></h1></header>
		<div class="main">
			<section class="post_content">
				<?php the_content(); ?>
			</section> <!-- end article section -->

		</div> <!-- end #main -->			

	<?php endwhile; else : ?>

		<div id="main" class="twelve columns clearfix" role="main">
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
		</div> <!-- end #main -->

	<?php endif; ?>
	<div class="sidebar">
		<?php
				include 'blocks/block-contact.php';
				include 'blocks/block-software_suite.php';

			 ?>


	</div>
</div> <!-- end #content -->	
<div class="full-width row">
	<? 	

			/*include renderer

			new productbox($post object)
			*/
			include 'blocks/renderer-productbox.php';
			$args = array('taxonomy' => 'custom_product_cat' );  
			$custom_cat =  get_categories( $args );
		
			
			foreach ($custom_cat as $product) {
				$module =  "<div class='row Products' >";
				$module .= "<div class='column twelve'>";
				$module .= "<h3 class='column'>".$product->name."</h3></div>";
				$module .= '<div class="column twelve"><p class="column ten">'.$product->description.'</p><a class="column two toplink" href="#top">Top<span class="icon">up_arrow</span></a><hr/>';
				$module .= "</div>";
					$args = array(
							   'numberposts' => -1,
							   'post_type' => 'csi_products',
							   'custom_product_cat' => $product->slug
							);
							$products = get_posts ( $args );
							$linkList ='<ul class="column twelve">';
							foreach($products  as $single_product){
								$item_image = get_field("featured_image",$single_product->ID);
								$image_link = $item_image["sizes"]["post-thumbnail"];	
								$linkList .= '<li>';
								$linkList .= productbox($single_product);
								$linklist .= '</li>';
								/*$linkList .= '<li class="column four"><div class="panel">';
								$linkList .= '<h4>'.$link->post_title.'</h4>';
								$linkList .= '<img src="'..'">';
								$linkID = $link->ID;

								$linkList .= '<p>'.get_field('excerpt',$linkID).'</p>';
								$linkList .= '<a href="/?'.$link->post_type.'='.$link->post_name.'#blank">Learn more about '.$link->post_title.' »</a></div></li>';
								*/

								
							}
				$linkList .="</ul>";
				$module .= $linkList;
				$module .= "</div>";
				echo $module;
				}
			
			
			?>	
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		$(".revealer").hover(
			function(){
			$(this).find('.reveal-slide').animate({ top: -1 }, 500, function(){});
			$(this).find('.toggle').addClass('on') ;
			$(this).find('.toggle').animate({ top: -1 }, 500);
			
			}
			,
			function(){
			$(this).find('.reveal-slide').animate({ top: 233.5 }, 500,function(){
				$(this).parent().find('.toggle').removeClass('on').animate({ top: 203.5 }, 200) ;
				

				 });
			
			$(this).find('.toggle').animate({ top: 233.5 }, 500);
			
			});

		
		
	});
$
	</script>


<?php get_footer(); ?>