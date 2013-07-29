<?php get_header(); ?>
		<!-- Row for main content area -->
		<div id="content" class="eight columns" role="main">			
			<?php get_template_part('loop', 'single'); ?>
		</div><!-- End Content row -->		
		<?php get_sidebar('materias'); ?>		
<?php get_footer(); ?>