<?php /* Exibe bloco da matéria internas (posts) - Start loop */ ?>

<div id="content-internas-materias">
	<div class="content-internas-wrapper">
		<div class="post-box">
			<h1><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h1>
		</div>
	</div>
	
	<div id="content-internas" class="eight columns" role="main">
		<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php reverie_entry_meta(); ?>
				<?php //echo leitura_estimada($post->post_content); ?>
			</header>
			<div class="fb-like" data-href=<?php the_permalink()?> data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
			<div class="entry-content">
			<?php if ( 'gallery' == get_post_format( get_the_ID() ) ); ?>
				<?php the_content(); ?>				
			</div>						
		</article>
		
		<?php endwhile; // End the loop ?>
	</div>
	
</div>


