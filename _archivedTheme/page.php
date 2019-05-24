<?php
/*
Template Name: NormalPage
*/
?>

<?php get_header(); ?>

<div id="content" class="row">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="seven columns main">
		<header class="row"><h1 class="column"><?php the_title(); ?></h1></header>
		<section class="post_content row">
			<?php the_content(); ?>
		</section> <!-- end article section -->
	</div> <!-- end #main -->			
<?php endwhile; else : ?>
<div class="seven columns main" role="main">
	<article id="post-not-found">
	    <header class="row">
	    	<h1>Not Found</h1>
	    </header>
	    <section class="post_content row">
	    	<p>Sorry, but the requested resource was not found on this site.</p>
	    </section>
	</article>
</div> <!-- end #main -->
<?php endif; ?>
	<div class="sidebar columns five"> 
		<?php
			include 'blocks/block-publication.php';
			include 'blocks/block-advert.php';
			include 'blocks/block-contact.php';
			include 'blocks/block-software_suite.php';
		 ?>
	</div>
</div> <!-- end #content -->

<?php get_footer(); ?>