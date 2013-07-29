<?php
/**
 * @package WordPress
 * @subpackage Yoko
 
	->> Página Resultados Busca
 */

get_header();
?>

	<div id="content" class="eight columns" role="main">
		<div class="content-internas-wrapper">
			<div class="post-box"><h1>Busca</h1></div>
		</div>
		<div id="content-internas" class="eight columns" role="main">
		<?				
			$args['post_type']	=	'post';				
			if($_POST['city']):
				$args['city'] = $_POST['city'];
			endif;
			if($_POST['cuisine']):
				$args['cuisine'] = $_POST['cuisine'];
			endif;				
		// concatenate the query

		if($_POST['city'] && $_POST['cuisine']):
		$args2 = 'cat=4&tag='. $args['city'].'+'.$args['cuisine'];
		endif;
		if($_POST['city'] && !$_POST['cuisine']):
		$args2 = 'cat=4&tag='. $args['city'];
		endif;
		if(!$_POST['city'] && $_POST['cuisine']):
		$args2 = 'cat=4&tag='. $args['cuisine'];
		endif;

		query_posts($args2);
			if(have_posts()):
				while(have_posts()): the_post();
		?>

				<article class="category-page">
					<section id="categoria-destaque-foto">
					<div class="img-busca">
						<a href="<?the_permalink();?>">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'category-pages', array( 'title' => ''.get_the_title().'' ));
							} ?>			
						</a>
					</div>
					</section>
					<header><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></header>
					<div class="entry-content">
						<?php $short_title = get_the_excerpt(); $short_title_2 = substr($short_title, 0, 100);
							echo has_excerpt() ? get_the_excerpt() : ($short_title_2 . "... Leia mais"); 
						?>			
					</div>
				</article>


		<? endwhile;
			else:
		?>	
			<h3>Sem resultados</h3>					
		<? endif;?>
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ($wp_query->max_num_pages > 1) : ?>
			<nav id="post-nav">
				<? wp_paginate(); ?>
			</nav>
	<?php endif; ?>		
		</div>
	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>