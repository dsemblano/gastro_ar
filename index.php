<?php get_header(); ?>

		<!-- Row for main content area -->
		
		<div id="content" class="eight columns" role="main">
			<?php //get_template_part('loop', 'index'); ?>
			<? get_template_part('home', 'slider'); ?>
			<? get_template_part('home', 'categorias'); ?>
		</div>
		<?php get_sidebar('home'); ?>
		<? get_template_part('home', 'busca_home'); ?>
		<!-- End Content row -->
		
<?php get_footer(); ?>