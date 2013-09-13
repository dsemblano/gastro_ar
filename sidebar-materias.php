
<aside id="sidebar" class="four columns" role="complementary">
	<div id="busca-direita">
		<?php wp_nav_menu(array('menu' => 'Topper')); ?>
		<? get_search_form(); ?>
	</div>
	
	<div class="fb-like-box" data-href="http://www.facebook.com/gastroonline" data-width="295" data-height="110" data-show-faces="false" data-stream="false" data-header="false"></div>
	
	<aside id="rapidas">
		<div class="content-internas-wrapper content-rapidas-wrapper">
			<div class="post-box-rapidas">
				<h3>Veja mais de <?php $category = get_the_category(); echo $category[0]->cat_name; ?></h3>
			</div>
		</div>
			<?  // Busca no banco sobre categoria atual		
				$categories = get_the_category();
				$args = array ('numberposts' => 5, 'offset'=> 0, 'category' =>$categories[0]->cat_ID );
				$sidebar_posts = get_posts( $args );
				//var_export ($args); die();
			?>
		<? foreach( $sidebar_posts as $post ) : setup_postdata($post); ?>
			<article>
			<a href="<?the_permalink(); ?>">
				<div class="img-sidebar">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'sidebar-thumb', array( 'title' => ''.get_the_title().'' ));
					} ?>
				</div>
				<span>
					<h4>
						<?php $short_title = the_title("", "", false);
						$short_title_2 = substr($short_title, 0, 30);
						echo $short_title_2;
						if ($short_title_2 != $short_title) { echo "...";
						}
						?>
					</h4>
					<p class="teaser-materia">
					<? if ( empty( $post->post_excerpt ) ) {
						$rapidas_resumo = get_the_excerpt();
						echo ucfirst(string_limit_words($rapidas_resumo, 10));
						}else{
						echo get_the_excerpt();
						}
					?>
					</p>
				</span>
			</a>
			</article>
		<?php endforeach; ?>
	</aside>

	<div id="banner-direito">
		<?php
		if (function_exists('wp_bannerize'))
			wp_bannerize('group=Sidebar Google Ad Sense&no_html_wrap=1');
		?>
	</div>

</aside><!-- /#sidebar -->