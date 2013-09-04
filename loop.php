<?php /* Exibe páginas categorias em conjunto com archive.php (pai) */ ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
<div class="notice">
	<p class="bottom">
		<?php _e('Nenhum resultado encontrado', 'reverie'); ?>
	</p>
</div>
<?php get_search_form(); ?>
<?php endif; ?>

<section>	
	<?php if( have_posts() && !is_category( 'especiais' ) ) : // Mostrar em todas as páginas menos em especiais ?>
		
		<?php while (have_posts()) : the_post(); // Begin the loop ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class('category-page'); ?>>
				<section id="categoria-destaque-foto">
					<div class="img-busca">
						<a href="<?the_permalink();?>">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'category-pages', array( 'title' => ''.get_the_title().'' ));
							} ?>			
						</a>
					</div>
				</section>
				<header>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</header>
				<div class="entry-content">
					<?php
					if (empty($post -> post_excerpt)) {
						$rapidas_resumo = get_the_excerpt();
						echo ucfirst(strtolower(string_limit_words($rapidas_resumo, 10))) . ("<span class=leiamais>... Leia mais</span>");
					} else { echo get_the_excerpt();
					}
 ?>
				</div>
			</article>
			
		<?php endwhile; // End the loop ?>

		<?php if ($wp_query->max_num_pages > 1) : ?>
			<nav id="post-nav"><? wp_paginate(); ?></nav>	
		<?php endif; ?>
		
	<?php else: // End have_posts ?> 
	
	<?php /* Especiais page */

		$termID = 2543;
		// especiais ID
		$taxonomyName = "category";
		$termsIDchild = get_term_children($termID, $taxonomyName);
		$termsIDchild = array_reverse($termsIDchild);
		//print_r ($termsIDchild);
		foreach ($termsIDchild as $child) {
			$term = get_term_by('id', $child, $taxonomyName);
			s8_taxonomy_image($child, 'medium');
			print_r ($opts); die();
			echo '<div class="especiais-page"><a href="' . get_term_link($term->name, $taxonomyName) . '">' . $opts . '</a><h2><a href="' . get_term_link($term->name, $taxonomyName) . '">' . $term->name . '</a></h2></div>';
		}
	?>
	<?php endif; ?>
</section>