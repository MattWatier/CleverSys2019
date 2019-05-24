<?php get_header(); ?>
	<div id="content" class="row clearfix">
		<div class="main column seven" >
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<header class=" row ">
				<h1 class="column"><?php the_title(); ?></h1>
			</header>
			<article id="post-<?php the_ID(); ?>"  role="article" class="row">
				<section class="post_content clearfix" itemprop="articleBody">
					<?php the_content(); ?>
					<cite><?php the_date(); ?></cite>
				</section> <!-- end article section -->
			</article> <!-- end article -->
		
			<?php comments_template(); ?>
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
	</div> <!-- end #main -->
	<div class="sidebar column five">
		<?php
			include 'blocks/block-contact.php';
			include 'blocks/block-software_suite.php';
		?>
	</div>
	</div> <!-- end #content -->

<?php get_footer(); ?>