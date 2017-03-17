<?php ?>
<!DOCTYPE html>
<html>
<head>
<title>Wordpress Custom Theme</title>
<link rel="stylesheet" href="<?php  bloginfo("template_url"); ?>/style.css">
<script type='text/javascript' src='http://wordpress461.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src="<?php  bloginfo("template_url"); ?>/script.js"></script>


</head>
<body>

<div class="page-wrapper">
	<div class="page-inner-wrapper">
		<div class="navigation-area">
			<div class="navigation-inner-area">
				<h1 class="logo"><a href="<?php echo home_url(); ?>">Logo</a></h1>
				<div class="menunavigation">
					<?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
				</div>
			</div>
		</div>
		<div class="page-header-area">
			<div class="sliders">
				<div class="slider"><img src=""></div>
			</div>
		</div>
		<?php 


		?>
		<div class="page-content-section">
			
			<?php
				$currentPostId = get_the_ID();
				echo $currentPostId; 
				$postDetails = get_post($currentPostId);
				print_r($postDetails);
				//exit;

			?>
		</div>
		<div class="page-highlights-area">
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
			<div class="highlight-items">
				<div class="items-image"><img src=""></div>
				<div class="items-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			</div>
		</div>
		<div class="page-about-area">
			<div class="about-content-section">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur</div>
			<div class="about-image-section"></div>
		</div>
		<div class="page-moreinfo-section">
			<div class="moreinfo-subsection">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in 
			a piece of classical Latin literature from 45 BC</div>
			<div class="moreinfo-subsection">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</div>
			<div class="moreinfo-subsection">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</div>
			<div class="moreinfo-subsection">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</div>
		</div>
		<div class="page-action-section">
			<div class="action-section-content">
				Contrary to popular belief, <h2>Lorem Ipsum is not simply random text.</h2> It has roots in a piece of classical Latin literature from 45 BC.<a href="#">Create Account </a>
			</div>
		</div>
		<div class="page-footer-section">
			<div class="page-footer-inner-area">
				<div class="footer-menu-area">
					<?php wp_nav_menu(array('menu' => 'Footer Menu')); ?>
				</div>
				<h1 class="footer-logo"><a href="<?php echo home_url(); ?>">Footer Logo</a></h1>
			</div>
		</div>
	</div>

</div>

</body>
</html>
<?php