<?php ?>
<!DOCTYPE html>
<html style="margin-top: 0 !important;">
<head>
<title>Wordpress Custom Theme</title>
<link rel="stylesheet" href="<?php  bloginfo("template_url"); ?>/style.css">
<script type='text/javascript' src='http://wordpress461.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src="<?php  bloginfo("template_url"); ?>/script.js"></script>
<?php wp_head(); ?>
</head>
<body>

<div class="page-wrapper">
	<div class="page-inner-wrapper">
		<?php
			get_template_part('template-parts/content','header-nav');
		?>
		
		<?php 
			get_template_part('template-parts/content','slider');
		?>

		<?php 
		?>
		<div class="page-content-section">
			<?php 
				if(is_front_page()){
					get_template_part('template-parts/content','front');
				}else{
					while ( have_posts() ) : the_post();
						get_template_part('template-parts/content','page');
					endwhile;					
				}
			?>
		</div>
	</div>
		<?php
			get_template_part('template-parts/content','footer');
		?>
</div>
</body>
</html>
<?php