<?php
/*
Template Name: Products Page
*/
?>
<?php get_header(); ?>
<div id="content" class="clearfix row">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<header class="row">
				<h1 class="columns"><?php the_title(); ?></h1>
			</header>
			<div class="row">
				<div id="main" class="main columns seven">
					<section class="post_content">
						<?php the_content(); ?>
					</section> <!-- end article section -->
				</div> <!-- end #main -->
			<?php endwhile;
	else : ?>
			<div id="main" class="seven columns clearfix main" role="main">
				<article id="post-not-found">
					<header>
						<h1>Not Found</h1>
					</header>
					<section class="post_content">
						<p>Sorry, but the requested resource was not found on this site.</p>
					</section>
				</article>
			</div> <!-- end #main -->
		<?php endif; ?>
		<div class="sidebar columns four">
			<?php
			include 'blocks/block-contact.php';
			include 'blocks/block-software_suite.php';
			?>
		</div>
	</div>
</div> <!-- end #content -->
<div class="full-width row">
	<?php
	/*
	include renderer
	new productbox($post object)
	*/
	include 'blocks/renderer-productbox.php';
	$args_cat = array('taxonomy' => 'custom_product_cat');
	$custom_cat =  get_categories($args_cat);
	foreach ($custom_cat as $product) {
		$module =  "<div class='row Products' id='" . $product->slug . "' >";
		$module .= "<div class='columns twelve'>";
		$module .= "<h3 class='columns'>" . $product->name . "</h3></div>";
		$module .= '<div class="columns twelve"><p class="columns ten">' . $product->description . '</p><a class="columns two toplink" href="#top">Top<span class="icon">up_arrow</span></a><hr/>';
		$args_products = array(
			'numberposts' => -1,
			'post_type' => 'csi_products',
			'custom_product_cat' => $product->slug
		);
		$products = query_posts($args_products);

		$linkList = '<ul class="row isotope">';
		foreach ($products  as $single_product) {
			// $linkList .= '<li style="padding: 0 15px;" class="four brick">';
			
			$linkList .= '<li style="padding: 0 15px;" class="">';
			$linkList .= productbox($single_product);
			$linklist .= '</li>';
		}
		$linkList .= "</ul>";
		$module .= $linkList;
		$module .= "</div>";
		$module .= "</div>";
		echo $module;
	}  ?>
</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.isotope.min.js"></script>
<script type="text/javascript">
	window.onload = function() {

		// var $container = $('ul.isotope');
		// $container.isotope({
		// 	// options
		// 	itemSelector: '.brick',
		// 	layoutMode: 'masonry'
		// });
		// $('#filters a').click(function() {
		// 	var selector = $(this).attr('data-filter');
		// 	$container.isotope({
		// 		filter: selector
		// 	});
		// 	return false;
		// });


	};
</script>
<?php get_footer(); ?>