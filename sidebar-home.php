<aside id="sidebar" class="four columns" role="complementary">
	<div id="busca-direita">
		<?php wp_nav_menu(array('menu' => 'Topper')); ?>
		<? get_search_form(); ?>
	</div>
	
	<div class="fb-like-box" data-href="http://www.facebook.com/gastroonline" data-width="295" data-height="110" data-show-faces="false" data-stream="false" data-header="false"></div>
	
	<div id="tabs" class="rapidas-home">		
		<ul>
			<!--<li><a href="#tabs-2">S&atilde;o Jo&atilde;o 2013</a></li>-->
			<li><a href="#tabs-1">R&aacutepidas</a></li>
			<li><a href="#tabs-2">&Uacute;ltimas Not&iacute;cias</a></li>
		</ul>
		
		<div id="tabs-1">
			<?php
				$args = array( 'post_type' => 'post', 'category_name' => 'rapidas', 'showposts' => 10 );
				$the_query = new WP_Query($args);
				while ( $the_query->have_posts() ) : $the_query->the_post();
			?>			
			<div class="date-rapidas">
				<a href="<?php the_permalink(); ?>">
					<div class="img-sidebar">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'sidebar-thumb', array( 'title' => ''.get_the_title().'' ));
						} ?>
					</div>
					<span>
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
			<?php endwhile; wp_reset_postdata(); ?>		
		</div>
		
		<div id="tabs-2">
			<?php 
				$args = array( 'post_type' => 'post', 'showposts' => 10 );
				$the_query = new WP_Query($args);
				while ( $the_query->have_posts() ) : $the_query->the_post();
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
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
	
	<div class="sidebar-box">
		<?php dynamic_sidebar("Sidebar"); ?>
	</div>

</aside><!-- /#sidebar -->