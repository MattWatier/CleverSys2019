<?php
/*
Template Name: ABOUT Page
Pulls in two contact pages contact page & basic oncatct form.
*/
?>
<?php get_header(); ?>
	<div id="content" class="contact clearfix row ">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="article main seven columns" role="main">
			<header class="row">
				<h1 ><?php the_title(); ?></h1>
			</header>
			<div class="section row"><?php the_content(); ?></div>
		</div> <!-- end #main -->
	<?php endwhile; ?>	
	<?php else : ?>
		<div id="post-not-found" class="article  main seven columns">
		    <header>
		    	<h1>Not Found</h1>
		    </header>
		    <div class="section" class="post_content">
		    	<p>Sorry, but the requested resource was not found on this site.</p>
		    </div>
		</div>
			
	<?php endif; ?>
	<div class="sidebar columns five">
	<?php $secondContent = new WP_Query('pagename=content-sidebar'); ?>
		<?php while ($secondContent->have_posts()) : $secondContent->the_post(); ?>
		   <?php the_content(); ?>
		<?php endwhile; ?>
	</div>
	</div> <!-- end #content -->
<?php get_footer(); ?>