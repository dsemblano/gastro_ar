<aside id="sidebar" class="four columns" role="complementary">
	<div id="busca-direita">
		<?php wp_nav_menu(array('menu' => 'Topper')); ?>
		<? get_search_form(); ?>
	</div>

	<div class="fb-like-box" data-href="http://www.facebook.com/gastroonline" data-width="295" data-height="110" data-show-faces="false" data-stream="false" data-header="false"></div>

	<aside id="rapidas">
		<? //Exibe a busca na lateral direita nas páginas de categorias e buscas ?>
		<? if ((is_category()) || (!is_page('restaurants'))): ?>
			<? get_template_part('home', 'busca_interna'); ?>
		<? else: ?>		
		<div class="content-internas-wrapper content-rapidas-wrapper">
			<div class="post-box-rapidas">
				<h3>Veja mais de <? single_cat_title(); ?></h3>
			</div>
		</div>
			<?  // Busca no banco sobre categoria atual				
				$args = array ('numberposts' => 5, 'offset'=> 5, 'category' => get_cat_id( single_cat_title("",false) ));
				$sidebar_posts = get_posts( $args );
			?>
		<? foreach( $sidebar_posts as $post ) : setup_postdata($post); ?>
			<article>
				<a href="<?the_permalink(); ?>"><?php the_post_thumbnail( 'small', array( 'title' => ''.get_the_title().'' )); ?></a>
				<h4>
					<a href="<?the_permalink(); ?>"> <?php $short_title = the_title("", "", false);
					$short_title_2 = substr($short_title, 0, 30);
					echo $short_title_2;
					if ($short_title_2 != $short_title) { echo "...";
					}
					?></a>
				</h4>
				<a href="<?the_permalink(); ?>">
					<p class="teaser-materia">
						<? if ( empty( $post->post_excerpt ) ) {
								$rapidas_resumo = get_the_excerpt();
								echo ucfirst(strtolower(string_limit_words($rapidas_resumo, 10))) . ("<span class=leiamais>... Leia mais</span>");
							}else{
							echo get_the_excerpt();
							}
						?>
					</p>
				</a>
			</article>
		<?php endforeach; ?>
	</aside>
	<? endif; ?>

	<div id="banner-direito">
		<?php
		if (function_exists('wp_bannerize'))
			wp_bannerize('group=Sidebar Google Ad Sense&no_html_wrap=1');
		?>
	</div>
	
</aside><!-- /#sidebar -->