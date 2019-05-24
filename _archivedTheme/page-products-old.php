<?php
/*
Template Name: Products Page
*/
?>
<?php get_header(); ?>
<div id="content" class="clearfix row">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header class="twelve column row"><h1 class="columns"><?php the_title(); ?></h1></header>
		<div class="main column seven">
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
	<div class="sidebar column five" style="display: flex;justify-content: flex-end;">
		<?php
			include 'blocks/block-contact.php';
			include 'blocks/block-software_suite.php';
		?>
	</div>
</div> <!-- end #content -->	
<div class="full-width">
	<?php 	
	/*
	include renderer
	new productbox($post object)
	*/
	include 'blocks/renderer-productbox.php';
	$args = array('taxonomy' => 'custom_product_cat' );  
	$custom_cat =  get_categories( $args );
	foreach ($custom_cat as $product) {
		$module =  "<div class='Product' >";
		$module .= "<div class='row' style='position:relative;'><div class='columns ten'><h3>".$product->name."</h3><p>".$product->description."</p></div>";
		$module .= "<div class='columns two toplink' style='position:absolute; right:0; bottom:0;'><a href='#top'>Top<span class='icon'>up_arrow</span></a></div></div><hr/>";
		$module .= "<div class='row collapse'>";	
			$args = array(
					   'numberposts' => -1,
					   'post_type' => 'csi_products',
					   'custom_product_cat' => $product->slug
					);
			$products = get_posts ( $args );
			$linkList ='<ul class="row isotope">';
			foreach($products  as $single_product){
				$linkList .= '<li style="padding: 0 15px;" class="four brick mobile-two">';
				$linkList .= productbox($single_product);
				$linklist .= '</li>';
			}
		$linkList .="</ul>";
		$module .= $linkList;
		$module .= "</div>";//div.row
		$module .= "</div>";//div.Products
		echo $module;
		}  ?>	
</div> <!-- full-width row -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.isotope.min.js"></script>
<script type="text/javascript">
	window.onload = function() {
		
		var $container = $('ul.isotope');
		$container.isotope({
		  // options
		  itemSelector : '.brick',
		  layoutMode : 'masonry'
		});
		$('#filters a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container.isotope({ filter: selector });
		  return false;
		});


	};
</script>
<?php get_footer(); ?>