<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="content-internas-categorias">
			<div class="content-internas-wrapper">
				<div class="post-box"><h1><?php echo get_the_title(); ?></h1></div>
			</div>
			<div id="content-internas" class="eight columns" role="main">
				<?php get_template_part('loop', 'page'); ?>
			</div>

		</div><!-- End Content row -->
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>