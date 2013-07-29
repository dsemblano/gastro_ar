<aside id="sidebar" class="four columns" role="complementary">
	<div id="busca-direita">
		<?php wp_nav_menu(array('menu' => 'Topper')); ?>
		<? get_search_form(); ?>
	</div>
	
	<div class="fb-like-box" data-href="http://www.facebook.com/gastroonline" data-width="295" data-height="110" data-show-faces="false" data-stream="false" data-header="false"></div>
	
	<aside id="rapidas" class="tabs rapidas-home">		
		<ul class="content-rapidas-wrapper-home">
			<!--<li><a href="#tabs-2">S&atilde;o Jo&atilde;o 2013</a></li>-->
			<li><a href="#tabs-1">R&aacutepidas</a></li>
			<li><a href="#tabs-2">&Uacute;ltimas Not&iacute;cias</a></li>
		</ul>
		
		<div id="tabs-1">
			<?php query_posts('category_name=rapidas&showposts=10'); ?>
			<?php //query_posts('cat=2709&showposts=10'); ?>
			<?php while (have_posts()) : the_post(); ?>
				<article>
					<a href="<?php the_permalink(); ?>">
						<div class="img-sidebar">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'sidebar-thumb', array( 'title' => ''.get_the_title().'' ));
							} ?>
						</div>
						<span>
							<h4><?php the_title(); ?></h4>
								<p class="teaser-materia">
									<?php $excerpt = get_the_excerpt();								  
									if (empty($post->post_excerpt)) {
										$excerpt = ucfirst(strtolower($excerpt));
										echo string_limit_words($excerpt,15) . (' ...');
									}
									else { echo ($excerpt); }
									?>
								</p>
						</span>
					</a>
				</article>
			<?php endwhile; ?>		
		</div>
		
		<div id="tabs-2">
			<?php 
			$postslist = //get_posts('category_name=sao-joao-2013&numberposts=10&order=DESC&orderby=date');
			$postslist = get_posts('numberposts=10&order=DESC');
			foreach ($postslist as $post) :
				setup_postdata($post);
			?>
			<div class="date-rapidas">
				<a href="<?php the_permalink(); ?>">
					<div class="img-sidebar">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'sidebar-thumb', array( 'title' => ''.get_the_title().'' ));
						} ?>
					</div>
					<span>
						<?php the_time('d/m/y - G:i'); ?>
						<h6>						
							<?php
							$short_title = the_title("", "", false);
							$short_title_2 = substr($short_title, 0, 45);
							echo $short_title_2;
							if ($short_title_2 != $short_title) { echo "...";
							}
							?>						
						</h6>
					</span>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</aside>
	
	<div class="sidebar-box">
		<?php dynamic_sidebar("Sidebar"); ?>
	</div>

</aside><!-- /#sidebar -->