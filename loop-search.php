<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Nenhum resultado encontrado.', 'reverie'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
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
					<header>
						<h2>
							<a href="<?php the_permalink(); ?>">
								<?php
							$h2_title = the_title("", "", false);
							$short_title = substr($h2_title, 0, 60);
							echo $short_title;
							if ($short_title != $h2_title) { echo "...";
							}
							?>	
							</a>
						</h2>
					</header>
					<div class="entry-content">
						<?php $excerpt = get_the_excerpt(); $postbody = substr($excerpt, 0, 100);
							echo has_excerpt() ? get_the_excerpt() : ($postbody . "..."); 
						?>			
					</div>
	</article>

<?php endwhile; // End the loop ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<? wp_paginate(); ?>
	</nav>
<?php endif; ?>