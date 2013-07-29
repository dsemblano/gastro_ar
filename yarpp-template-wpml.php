<?php /*
Example template for use with WPML (WP Multilingual, http://wpml.org)
Author: mitcho (Michael Yoshitaka Erlewine)
*/

if (function_exists("icl_register_string")) {
	icl_register_string("Yet Another Related Posts Plugin","related posts header","Related Posts");
	icl_register_string("Yet Another Related Posts Plugin","no related posts message","No related posts.");
}

?>
<div class="fb-comments fb-comments-materias" data-href="<?php echo the_permalink(); ?>" data-num-posts="10" data-width="609"></div>
<div class="related-posts">
	<h3><?php echo (function_exists("icl_t") ? icl_t("Yet Another Related Posts Plugin","related posts header","Related Posts") : "Leia tamb&eacute;m") ?></h3>
		<ul>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
			<li>									
				<a href="<?php the_permalink() ?>">
					<figure>
						<?php if (has_post_thumbnail()):?>
							<?php the_post_thumbnail( 'medium', array( 'title' => ''.get_the_title().'' )); ?>
						<?php endif; ?>
					</figure>
				</a>					
					<nav>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<h6><? the_title(); ?></h6>
						</a>															
						<a href="<?php the_permalink() ?>">
							<p><?php $short_title = get_the_excerpt(); $short_title_2 = substr($short_title, 0, 90);
							echo has_excerpt() ? get_the_excerpt() : ($short_title_2 . "..."); ?></p>							
						</a>
					</nav>
				</a>
			</li>		
		<?php endwhile; ?>	
		</ul>
	<?php else: ?>
	<p><?php echo (function_exists("icl_t") ? icl_t("Yet Another Related Posts Plugin","no related posts message","No related posts.") : "") ?></p>
	<?php endif; ?>
</div>
