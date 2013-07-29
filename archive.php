<?php /* Exibe páginas categorias */ ?>

<?php get_header(); ?>

		<!-- Row for main content area -->
		<div class="content-internas-categorias">
			<div class="content-internas-wrapper">
				<div class="post-box">
					<h1><?php single_cat_title(); ?></h1>
				</div>
			</div>
			<div id="content-internas" class="eight columns" role="main">
				<?php get_template_part('loop', 'category'); ?>
			</div><!-- End Content row -->
		</div>
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>