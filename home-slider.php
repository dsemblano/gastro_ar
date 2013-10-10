<div class="flexslider">
<span id="post-box-slider"></span>
	<ul class="slides">
	<?php
	query_posts(array('category_name' => 'destaques', 'posts_per_page' => 6));
	if(have_posts()) :
		while(have_posts()) : the_post();
	?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'slider2', array( 'title' => ''.get_the_title().'' )); // Imagem do Slider ?>
			</a>
		<div class="caption">	
			<h5 class="gallery-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a></h5>
			<p class="flex-caption">						
				<a href="<?php the_permalink(); ?>">
					<?php $excerpt = get_the_excerpt();								  
						if (empty($post->post_excerpt)) {
							$excerpt = ucfirst(strtolower($excerpt));
							echo string_limit_words($excerpt,10) . (' ...');
						}
						else { echo string_limit_words($excerpt,10); }
					?>
				</a>
			</p>
		</div>
		</li>
		<?php endwhile;endif; wp_reset_query(); ?>
	</ul>
</div>
