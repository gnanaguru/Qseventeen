<?php
	/*$the_query = new WP_Query(array(
		'post_type'			=> 'page',
		'posts_per_page'	=> -1,
		'meta_key'			=> 'display_in_front_page',
		'orderby'			=> 'meta_value',
		'order'				=> 'DESC'
	));*/


	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'page',
		'meta_query'	=> array(
			array(
				'key'		=> 'display_in_front_page',
				'compare'	=> '=',
				'value'		=> '1',
			)
		)
	);

	$the_query = new WP_Query($args);

	?>
	<?php if( $the_query->have_posts() ): ?>

		<?php while( $the_query->have_posts() ) : $the_query->the_post();  ?>
			
		<div class="page-frontpage-sectionarea <?php the_title(); ?>">
			<div class="page-frontpage-section-innerarea">
				<div class="page-frontpage-section-leftarea">
					<div class="page-front-page-section-title"><?php the_title(); ?></div>
					<div class="page-front-page-content-section">
					<?php the_content(); ?>
					</div>
				</div>
				<div class="page-frontpage-section-rightarea">
					<div class="page-front-page-image-section"><?php the_post_thumbnail(); ?></div>
				</div>
			</div>
		</div> 
		<?php endwhile; ?>

	<?php endif; ?>

	<div class="page-frontpage-service-sectionarea">
			<div class="page-frontpage-service-section-innerarea">
			<?php 
				$the_query = new WP_Query(array(
					'post_type'			=> 'service',
					'posts_per_page'	=> -1,
					'orderby'			=> 'title',
					'order'   => 'DESC',
				));

				

			?>

			<?php if( $the_query->have_posts() ): ?>

				<?php while( $the_query->have_posts() ) : $the_query->the_post();  ?>
					
				<div class="page-frontpage-service-section">
					<div class="page-frontpage-service-section-rightarea">
						<div class="page-front-page-service-image-section"><?php $currentPostId = get_the_ID();  $image = get_field('service_image', $currentPostId); ?><img src="<?php echo $image; ?>"></div>
					</div>
					<div class="page-frontpage-service-section-leftarea">
						<div class="page-front-page-service-content-section">
						<?php the_content(); ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div> 

		<div class="page-frontpage-call-action-section">
			<div class="page-frontpage-call-action-inner-section">
				<?php
					$the_query = new WP_Query(array(
					'post_type'			=> 'call_action',
					'posts_per_page'	=> -1,
					'orderby'			=> 'title',
					'order'   => 'DESC',
				));
				?>
				<div class="page-frontpage-action-content-section">
					<?php if( $the_query->have_posts() ): ?>
						<?php while( $the_query->have_posts() ) : $the_query->the_post();  ?>
								<?php the_content(); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

	<?php wp_reset_query();	 ?>