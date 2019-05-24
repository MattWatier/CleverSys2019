<?php
/*
Template Name: News Page
*/
?>
<?php get_header(); ?>
	<div id="content" class="clearfix row ">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<header class="twelve column row"><h1 class="column"><?php the_title(); ?></h1></header>
        <div><?php the_content(); ?></div>
	<div id="sidebar" class="column two">
		<?php 
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
		$categories = get_categories( $args ); 
		//print_r($categories);
		$item ='<ul id="filters" class="side-nav"><li><a href="#" data-filter="*">All News</a></li>';
		foreach ($categories as $category) {
			$item .= '<li><a href="#" data-filter=".'.$category->cat_name.'">'.$category->cat_name.'</a></li>';
			}
			$item .= '</ul>';
			echo $item;
		?>

	</div>			
	<?php endwhile; endif; ?>


	<div id="tumblelog" class="colum ten">

		<?php
			$args = array(
			    'numberposts'     =>  -1,
				'orderby'         => 'post_date',
			    'order'           => 'DESC',
			    'post_type'       => 'post', ); 
			$news_arrya = get_posts( $args );
			$newsItem="";
			foreach ($news_arrya as $news) {
				$newsItem .='<div class="twelve columns item ' ;
				$cats = get_the_category($news->ID);
				$catList ='';
				foreach ($cats as $cat) {
					$catList .= ' '.$cat->name.' ';
				}
				$newsItem .= $catList;
				$newsItem .= '"><div class="post panel"><h3>'.$news->post_title.'</h3>';
				$newsItem .= '<p class="meta">Posted <time datetime="2'.$news->post_date.'" pubdate="">'.$news->post_date.'</time>  <span class="amp">&amp;</span> filed under '.$catList.'.</p>';
				$newsItem .= '<p>'.$news->post_excerpt.'</p><a class="tiny button"href="?p='.$news->ID.'">Read More</a></div></div>';
			}
			echo $newsItem;
			?>
		
	</div> <!-- end #Main -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.isotope.min.js"></script>
	<script type="text/javascript">
		window.onload = function() {
			
			var $container = $('#tumblelog');
			$container.isotope({
			  // options
			  itemSelector : '.item',
			  layoutMode : 'fitRows'
			});
			$('#filters a').click(function(){
			  var selector = $(this).attr('data-filter');
			  $container.isotope({ filter: selector });
			  return false;
			});


		};
	</script>
	<style>
	.post{border-top: 4px solid #ccc;padding: 10px 10px 20px; }
	</style>
	</div> <!-- end #content -->

<?php get_footer(); ?>