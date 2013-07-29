<aside id="categorias-home">
	<nav>
		<? wp_reset_query();
			$args['category_name']='experimenta';
			$args['posts_per_page']=1;
			query_posts($args);
			if(have_posts()):
				while(have_posts()): the_post(); $c++;
		?>
			<article>
				<a href="<? the_permalink();?>">
				<div class="img-categorias">				
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-destaques', array( 'title' => ''.get_the_title().'' ));
				} ?>				
				</div>
				<h3>EXPERIMENTA</h3>
				<p><? the_title();?></p>
				<?php $short_title = the_excerpt("", "", false);
				$short_title_2 = substr($short_title, 0, 50);
				echo $short_title_2;
				if ($short_title_2 != $short_title) {
					echo "...";
				}
				?>
				</a>
			</article>
			<? endwhile; endif;?>

		<? wp_reset_query();
			$args['category_name']='noticias';
			$args['posts_per_page']=1;
			query_posts($args);
			if(have_posts()):
				while(have_posts()): the_post(); $c++;
		?>
			<article>
				<a href="<? the_permalink();?>">
				<div class="img-categorias">				
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-destaques', array( 'title' => ''.get_the_title().'' ));
				} ?>				
				</div>
				<h3>NOTÍCIAS</h3>
				<p><? the_title();?></p>
				<?php $short_title = the_excerpt("", "", false);
				$short_title_2 = substr($short_title, 0, 50);
				echo $short_title_2;
				if ($short_title_2 != $short_title) {
					echo "...";
				}
				?>
				</a>
			</article>
			<? endwhile; endif;?>

		<? wp_reset_query();
			$args['category_name']='cloche';
			$args['posts_per_page']=1;
			query_posts($args);
			if(have_posts()):
				while(have_posts()): the_post(); $c++;
		?>
			<article class="last">
				<a href="<? the_permalink();?>">
				<div class="img-categorias">				
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-destaques', array( 'title' => ''.get_the_title().'' ));
				} ?>				
				</div>
				<h3>CLOCHE</h3>
				<p><? the_title();?></p>
				<?php $short_title = the_excerpt("", "", false);
				$short_title_2 = substr($short_title, 0, 50);
				echo $short_title_2;
				if ($short_title_2 != $short_title) {
					echo "...";
				}
				?>
				</a>
			</article>
			<? endwhile; endif;?>
	</nav>
	
	<nav>
		<? wp_reset_query();
			$args['category_name']='sopa-de-letrinhas';
			$args['posts_per_page']=1;
			query_posts($args);
			if(have_posts()):
				while(have_posts()): the_post(); $c++;
		?>
			<article>
				<a href="<? the_permalink();?>">
				<div class="img-categorias">				
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-destaques', array( 'title' => ''.get_the_title().'' ));
				} ?>				
				</div>
				<h3>SOPA DE LETRINHAS</h3>
				<p><? the_title();?></p>
				<?php $short_title = the_excerpt("", "", false);
				$short_title_2 = substr($short_title, 0, 50);
				echo $short_title_2;
				if ($short_title_2 != $short_title) {
					echo "...";
				}
				?>
				</a>
			</article>
			<? endwhile; endif;?>

		<? wp_reset_query();
			$args['category_name']='le-chef';
			$args['posts_per_page']=1;
			query_posts($args);
			if(have_posts()):
				while(have_posts()): the_post(); $c++;
		?>
			<article>
				<a href="<? the_permalink();?>">
				<div class="img-categorias">				
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-destaques', array( 'title' => ''.get_the_title().'' ));
				} ?>				
				</div>
				<h3>LE CHEF</h3>
				<p><? the_title();?></p>
				<?php $short_title = the_excerpt("", "", false);
				$short_title_2 = substr($short_title, 0, 50);
				echo $short_title_2;
				if ($short_title_2 != $short_title) {
					echo "...";
				}
				?>
				</a>
			</article>
			<? endwhile; endif;?>

		<? wp_reset_query();
			$args['category_name']='videos';
			$args['posts_per_page']=1;
			query_posts($args);
			if(have_posts()):
				while(have_posts()): the_post(); $c++;
		?>
			<article class="last">
				<a href="<? the_permalink();?>">
				<div class="img-categorias">				
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-destaques', array( 'title' => ''.get_the_title().'' ));
				} ?>				
				</div>
				<h3>VÍDEO</h3>
				<p><? the_title();?></p>
				<?php $short_title = the_excerpt("", "", false);
				$short_title_2 = substr($short_title, 0, 50);
				echo $short_title_2;
				if ($short_title_2 != $short_title) {
					echo "...";
				}
				?>
				</a>
			</article>
			<? endwhile; endif;?>
	</nav>
</aside>