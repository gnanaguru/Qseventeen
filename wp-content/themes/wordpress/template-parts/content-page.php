<div class="content-area $currentPostId" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="page-title"><?php the_title(); ?></h1>
	<div class="page-image-details"><?php the_post_thumbnail('large'); ?></div>
	<div class="page-details"><?php the_content(); ?></div>
</div>