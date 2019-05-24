<?php

/*

Template Name: Home Page

*/

?>



<?php get_header(); ?>

<!-- Home Main -->

<script>

  fbq('track', 'ViewContent');

</script>

		

<?php 

	$renderItem = '';

	if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- Carousal Wrapper -->

		<?php 

		$renderItem .= '<div class="row clearfix"> <div id="Carousal" class="twelve columns"> <div class="wrapper" style="border:1px solid #333;"> <div id="featuredContent">';

		$gallery = get_field("gallery_panel");

			foreach($gallery as $galleryPanel):

				$renderItem .= '<div class="';

				$renderItem .= $galleryPanel["light_text"] ? 'light':'dark';

				$renderItem .= '" style="background-image:url( '.$galleryPanel["image"].');background-repeat: no-repeat;background-color:#fff;">';

				$renderItem .= '<h3 class="column four">'.$galleryPanel["title"].'</h3>';

				$renderItem .= '<p class="column four">'.$galleryPanel["explination"].'</p>';

				$renderItem .='<a href="'.$galleryPanel["link"].'">'.$galleryPanel["link_label"].'</a>';

				$renderItem .= '</div>';

			endforeach;

		$renderItem .= '</div></div></div></div><!-- End of Rotation -->	';

		

		echo $renderItem;

		endwhile; endif; ?>

		<!-- End of Carousal Wrapper -->

		<script type="text/javascript"> 

		   $(window).load(function() {

		       $('#featuredContent').orbit({ 

		       	   animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push

		           animationSpeed: 800,                // how fast animtions are

		           timer: true, 			 // true or false to have the timer

		           resetTimerOnClick: false,           // true resets the timer instead of pausing slideshow progress

		           advanceSpeed: 4000, 		 // if timer is enabled, time between transitions 

		           pauseOnHover: false, 		 // if you hover pauses the slider

		           startClockOnMouseOut: false, 	 // if clock should start on MouseOut

		           startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again

		           directionalNav: true, 		 // manual advancing directional navs

		           captions: true, 			 // do you want captions?

		           bullets: false,			 // true or false to activate the bullet navigation

		           bulletThumbs: false,		 // thumbnails for the bullets

		           bulletThumbLocation: '',		 // location from this file where thumbs will be

		           fluid: '16x6' });

		   });

		</script>

		<!-- End of Carosel -->

		<div class="row home-main">

			<div class="main columns seven">

				<?  the_content(); ?>

			</div>	

			<div class="sidebar columns five">

			<?php

				include 'blocks/block-howto.php';

				include 'blocks/block-contact.php';

				include 'blocks/block-advert.php';

			?>

			</div>

		</div><!-- End of .home-main -->

		<br>

		<?php 

			$args = array('taxonomy' => 'custom_product_cat' );  

			$custom_cat =  get_categories( $args );

			$module ="<div class='product-buckets' ><ul class='row'>";

			foreach ($custom_cat as $product) {

				$module .= "<li class='column four'>";

				$module .= "<h3>".$product->name."</h3>";

				$module .= "<p>".$product->description."</p>";

				$module .= "<a href='/CleverSysInc/home/products/#".$product->slug." class='button'>Read More »</a></li>";

				}

			$module .= "</ul></div>";

			echo $module;

		?>	

		<div id="news" class="row">

			<h4 class="column twelve" >New Product Releases</h4>

			<?php 

			$args = array(

			    'numberposts'     => 6,

				'orderby'         => 'post_date',

			    'order'           => 'DESC',

			    'post_type'       => 'post', ); 

			$news_arrya = get_posts( $args );

			$newsItem="";

			$binary=0;

			foreach ($news_arrya as $news) {
				$newsItem .='<article class="column four mobile-two" role="article"';
				$newsItem .= '><div class="panel radius " style="height:21em;"><h5 style=" max-height: 3.25em;   overflow: hidden;line-height: 1.5em;">'.$news->post_title.'</h5>'."\n";
				$newsItem .='<section class="post_content"><p style="margin-top:-17px"><small> Date: '.$news->post_date.'</small></p><p style="height:6.5em;overflow:hidden;display:block">'.$news->post_content.'</p>';
				$newsItem .='<p><a class="tiny button" href="p/'.$news->ID.'">Read More</a></p></section></div></article>';
				++ $binary;
				}
			$newsItem .='<div class="clearfix"></div>';

			echo $newsItem;

			 ?>

	</div>  <!-- End of #news .row -->



<?php get_footer(); ?>