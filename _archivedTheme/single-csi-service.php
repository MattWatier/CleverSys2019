<?php
/* Research Services

  Featured Images
  Title
  Content
  Extra Images
  Related Products

   */
?>


<?php get_header(); ?>
<div id="content" class="clearfix row csi-products">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header class="csi-product column twelve"><h1 class="column"><?php the_title(); ?></h1></header>
        <div class="main column seven" role="main">
          <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
            <? 
              $field = get_field("featured_image");
              if($field!=''){
              $items = ' <div class=" panel"><img style="margin:0 auto;display:block;" src="'.$field["sizes"]["medium"].'" alt="'.$field["caption"].'"></div>';
              echo $items;
            }?>
            <section class="post_content clearfix">
              	<div class="row">
                  <? $field = get_field("image");
                  	 if(count($field) != 0 && $field != false  && $field != ''){
  	                    $item = '<img src="'.$field["sizes"]["medium"].'" alt="'.$field["caption"].'">';
  	                    echo $item;
  	                }
                   ?>
           		</div>
						<?php the_content(); ?>
          </section> <!-- end article section -->
				</article> <!-- end article -->
			</div> <!-- end #main -->
			<div class="sidebar">
				<? 
				include 'blocks/block-document.php'; 
				include 'blocks/block-extra_images.php';
				include 'blocks/renderer-related_products.php';
				related_products($postID); 
			     include 'blocks/block-publication.php';
				
				?>
			</div> <!-- end sidebar -->
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
</div> <!-- end #content .clearfix .row .csi-products -->
<script type="text/javascript">
  $('#more').click(function(){ 
    $('.hiddencontent').show();
    $('#more').hide();
  })
</script>


<?php get_footer(); ?>