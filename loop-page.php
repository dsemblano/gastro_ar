<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<?php the_content(); ?>

	<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<? wp_paginate(); ?>
	</nav>
<?php endif; ?>
	
<?php endwhile; // End the loop ?>