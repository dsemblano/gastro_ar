<?
/*
Template name: Restaurant list
*/
?>
<? get_header(); ?>
	<div id="main">
		<div class="main-holder">
			<div class="twocolumns">
				<div class="content">
					<div class="t"></div>
					
					<?
				
					$args['post_type']	=	'restaurant';				
				

				query_posts($args);


				if(have_posts()):
					while(have_posts()): the_post();
					?>
					<div class="c">
						<div class="section">
							
							<div class="post">
								<div class="heading heading-mark">
									<h3><? the_title(); ?></h3>
								</div>
								<div class="text">
									<div class="text-holder">
										<? the_content(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<? endwhile; 
				else:
				?>
					<div class="c">
						<div class="section">
							
							<div class="post">
								<div class="heading heading-mark">
									<h3>No results</h3>
								</div>
							</div>

						</div>
					</div>

				<?endif; ?>
				<div class="b"></div>
				</div><!-- / content -->

				<? get_sidebar('single'); ?>

			</div><!-- / twocolumns -->
		</div>
	</div><!-- / main -->


<? get_template_part('footer', 'banners'); ?>

<?php get_footer(); ?>