<!doctype html>  



<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->

<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->

<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->

<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->

<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	

	<head>

		<meta charset="utf-8">

		<title><?php wp_title('', true, 'left'); ?></title>

				

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--[if lt IE 9]>

<script src="<?php echo get_template_directory_uri(); ?>/javascripts/html5shiv.js"></script>

<![endif]-->		

<!-- media-queries.js (fallback) -->

<!--[if lt IE 9]>

	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			

<![endif]-->

		<!-- icons & favicons -->

		<!-- For iPhone 4 -->

		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">

		<!-- For iPad 1-->

		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">

		<!-- For iPhone 3G, iPod Touch and Android -->

		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">

		<!-- For Nokia -->

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">

		<!-- For everything else -->

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">





  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		

		<!-- wordpress head functions -->

		<?php wp_head(); ?>

		<!-- end of wordpress head -->



		<!-- Facebook Pixel Code -->

<script>

  !function(f,b,e,v,n,t,s)

  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?

  n.callMethod.apply(n,arguments):n.queue.push(arguments)};

  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

  n.queue=[];t=b.createElement(e);t.async=!0;

  t.src=v;s=b.getElementsByTagName(e)[0];

  s.parentNode.insertBefore(t,s)}(window, document,'script',

  'https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '278322202833597');

  fbq('track', 'PageView');

</script>

<noscript><img height="1" width="1" style="display:none"

  src="https://www.facebook.com/tr?id=278322202833597&ev=PageView&noscript=1"

/></noscript>

<!-- End Facebook Pixel Code -->



<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>

  (adsbygoogle = window.adsbygoogle || []).push({

    google_ad_client: "ca-pub-5061696867766142",

    enable_page_level_ads: true

  });

</script>	





	</head>





<?php	

	$args = array('taxonomy' => 'custom_product_cat' );  

	$custom_cat =  get_categories( $args );



	

	$product_listing ="";

	$tabs ="";

	foreach ($custom_cat as $product) {

		$tabs .= '<dd class="mobile-four"><a href="#'.$product->slug.'">'.$product->name.'</a></dd>';

		$product_listing .= "<li id='".$product->slug."Tab' class='columns twelve'>";

		$product_listing.="<ul class='column twelve'>";

		$args = array(

		   'numberposts' => -1,

		   'post_type' => 'csi_products',

		   'custom_product_cat' => $product->slug,

		   'order'=> 'DESC', 

		   'orderby' => 'modified_date' 

		);

		$links = get_posts ( $args );

		$linkList = "";

		foreach($links as $link){

			$linkList .='<li class="column three mobile-two"><a href="/CleverSysInc/'.$link->post_type.'/'.$link->post_name.'#blank">'.$link->post_title.'</a></li>';

		}

		

		$linkList .="</ul>";

		$product_listing .= $linkList;

		$product_listing .= "</li>";

			

		}?>

<body <?php body_class("off-canvas slide-nav"); ?> >

        <script>

        	fbq('track', 'ViewContent');

        </script>

	<div class="container">


		<div role="banner" id="top-header">

			<div class="row">		

				<div id="top-nav" class="twelve columns  hide-for-small">

					<?php  wp_nav_menu( array( 'menu' => 'main_nav', 'menu_class' => 'utility-nav hide-for-small') ); ?>

					<?php  wp_nav_menu( array( 'menu' => 'utility_nav', 'menu_class' => 'utility-nav hide-for-small') ); ?>

				</div>	

			</div>	

			<div id="mobile-nav" class="show-for-small menu-action row">

		  	    <div class="column mobile-two"><a class='menu-button button' id="menuButton" href="#menu">Menu</a></div>

				<div class="column mobile-two"><a class="menu-button button " href="#bottomMenu">Products</a></div>

			</div>

		</div> <!-- end header -->

		<div id="product_collection" class="hide-for-small">

				<div id="drop-down"><div class="row">

					<ul id="collapse-nav" class="tabs-content" >

						<li  id='blankTab' class='row'>&nbsp;</li>

						<?php echo $product_listing; ?>

					</ul>

				</div><!-- .row -->

			</div><!-- #dropdown -->

			<div class="row">

				<dl class="tabs">

					 <?php echo $tabs; ?> 

					 <dd class="active" >

					 	<!--<a href="#blank">Close</a>-->

					 </dd>

					 <dt><strong>Products: </strong></dt>

				</dl>

			</div>

		</div> <!-- #product_collection -->

		<div class="row" style="overflow:visible;">

				<div class="logo columns six"><h1>Cleversys Inc</h1><cite class="cite">behavior recognition technology of the next generation</cite></div>

				<div class="columns five"><?php get_search_form(); ?></div>

		</div>



				