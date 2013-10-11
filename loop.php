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

<?php if( have_posts() && !is_category( 'especiais' ) ) : // Mostrar em todas as páginas menos em especiais ?>
	
	<?php while (have_posts()) : the_post(); // Begin the loop ?>	
		<article id="post-<?php the_ID(); ?>" <?php post_class('category-page'); ?>>
			<a href="<?the_permalink();?>">
				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'category-pages', array( 'title' => ''.get_the_title().'' ));
					}
				?>
				<div class="chamada_texto">
					<h2><?php the_title(); ?></h2>
					<p>
						<?php
							if (empty($post -> post_excerpt)) {
								$rapidas_resumo = get_the_excerpt();
								echo ucfirst(strtolower(string_limit_words($rapidas_resumo, 10))) . ("<span class=leiamais>... Leia mais</span>");
							}
							else { echo get_the_excerpt(); }
						?>
					</p>
				</div>
			</a>
		</article>		
	<?php endwhile; // End the loop ?>

	<?php if ($wp_query->max_num_pages > 1) : ?>
		<nav id="post-nav"><? wp_paginate(); ?></nav>	
	<?php endif; ?>
	
<?php else: // End have_posts ?> 
	<?php 
		// PÁGINA ESPECIAIS	
		$taxonomyName = 'category';	
		$id_pagina = get_queried_object()->term_id;
		$child_terms_especiais = array_reverse(get_term_children ($id_pagina, $taxonomyName));
		//print_r($child_terms_especiais);
		
		foreach ($child_terms_especiais as $child) {
			//Termo individual baseado na interação do array
			$term = get_term_by('id', $child, $taxonomyName);
			print_r($term);
			//print_r ($term);
			$image_html = s8_get_taxonomy_image(get_term( $term->term_id, $taxonomyName ), 'category-pages');
			if (empty($image_html)) {
				echo '<article><a href="' . get_term_link($term->slug, $taxonomyName) . '"><div class="especiais-img-default"></div><h2 class="chamada_texto">' . $term->name . '</h2></a></article>';
			}

			else {
				echo '<article><a href="' . get_term_link($term->slug, $taxonomyName) . '">' . $image_html . '<h2 class="chamada_texto">' . $term->name . '</h2></a></article>';
			}
		}
	?>
<?php endif; ?>