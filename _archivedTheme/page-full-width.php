<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix row">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header class="twelve column row"><h1 class="column"><?php the_title(); ?></h1></header>
		<div id="main" class="twelve columns clearfix" role="main">
			<section class="post_content">
				<?php the_content(); ?>
			</section> <!-- end article section -->
			<div>
				<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
			</div>
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

</div> <!-- end #content -->

<?php get_footer(); ?>