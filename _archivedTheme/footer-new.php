<div id="footer" role="contentinfo">
	<div class="row">
		<div class="columns three">
			<div class="row collapse">
				<h5>
					CleverSys Inc
				</h5>
			</div>
		</div>
		<div class="columns four">
			<div class="panel callout">
				<div class="row collapse">
					<h5>
						Support &amp; Sales
					</h5>
					<p>
						We want to make your experience with us as easy as possible. So please reach out if you have any questions
					</p>
				
				</div>	
				<div class="row collapse">
					<div class="columns six mobile-two"><a href="mailto:support@cleversysinc.com" class="button small secondary" style="width: 98%; margin: 0 auto;">Email Support</a></div>
					<div class="columns six mobile-two"><a href="mailto:sales@cleversysinc.com" class="button small secondary" style="width: 98%; margin: 0 auto;">Email Sales</a></div>
					
				</div>
			</div>
		</div>
		<div class="columns five">
			<div class="panel callout">
				<div class="row collapse">
					<h5>
						Contact Us Directly
					</h5>
				</div>
				<div class="row collapse">
					<p class="columns six mobile-two">
						11425 Isaac Newton Square - Suite 202<br>
						Reston, VA 20191
					</p>
					<p class="columns six mobile-two">
						Tel: <span class="phone">(703) 787 6946</span><br>
						Fax: <span class="fax">(703) 757 7467</span>
					</p>
				</div>
				<div class="row collapse">
					<p class="columns twelve" style="text-align:center;">
						CleverSys, Inc. © 2010
					</p>
				</div>
			</div>
		</div>
	</div>
</div><!-- end footer -->
<?php	
	$args = array('taxonomy' => 'custom_product_cat' );  
	$custom_cat =  get_categories( $args );

	
	$product_listing ="";
	foreach ($custom_cat as $product) {
		$product_listing .= "<li class=''>";
		$product_listing .= "<h5>".$product->name."</h5>";
	
		$product_listing.="<ul class=''>";
		$args = array(
		   'numberposts' => -1,
		   'post_type' => 'csi_products',
		   'custom_product_cat' => $product->slug,
		   'order'=> 'ASC', 
		   'orderby' => 'title' 
		);
		$links = get_posts ( $args );
		$linkList = "";
		foreach($links as $link){
			$linkList .='<li><a href="/?'.$link->post_type.'='.$link->post_name.'#blank">'.$link->post_title.'</a></li>';
		}
		
		$linkList .="</ul>";
		$product_listing .= $linkList;
		$product_listing .= "</li>";
			
		}?>
<nav id="bottomMenu" role="navigation" class="show-for-small">
	<h3>Full Product List</h3>
	<ul id="bottomNav">
		<?php echo $product_listing; ?>
	</ul>
</nav>


</div><!-- end of .container -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/foundation/jquery.foundation.accordion.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/foundation/jquery.foundation.clearing.js">
</script><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/foundation/app.js">
</script>
<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->
<?php wp_footer(); // js scripts are inserted using this function ?>
</body>
</html>