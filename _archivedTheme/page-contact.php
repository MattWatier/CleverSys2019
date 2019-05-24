<?php
/*
Template Name: CONTACT Page
Pulls in two contact pages contact page & basic oncatct form.
*/
?>
<?php get_header(); ?>
	<script>
  		fbq('track', 'Contact');
	</script>


	<div id="content" class="contact clearfix row ">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="article main columns six" role="main">
	    			<div class="header row">
	    				<h1><?php the_title(); ?></h1>
	    			</div>
					<div class="post_content section row">
						<?php the_content(); ?>
					</div>
			</div> <!-- end #main -->
	<?php endwhile; ?>	
	<?php else : ?>
		<div id="post-not-found" class="main columns six article">
		    <div class="header row">
		    	<h1>Not Found</h1>
		    </div>
		    <div class="post_content section row">
		    	<p>Sorry, but the requested resource was not found on this site.</p>
		    </div>
		</div> <!-- End of Main -->
			
	<?php endif; ?>

	<div class="sidebar column six">
		<?php

		    $secondContent = new WP_Query('pagename=content-sidebar');
		    
		?>
		<?php while ($secondContent->have_posts()) : $secondContent->the_post(); ?>
		   <?php the_content(); ?>
		<?php endwhile; ?>
		</div> <!-- end of sidebar -->
	</div> <!-- end #content -->

<?php get_footer(); ?>