<?php 
/*

Template Name: CSRC

*/

get_header();

?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">

	<div class="container1300  container my-5">

		<div class="row">
			<?php the_field('above_carousel'); ?>

			<div class="col-lg-9">

				<div id="csrcCarousel" class="csrcCaroselWrpr carousel slide carousel-fade" data-ride="carousel">

<!-- 					<ol class="carousel-indicators">

						<li data-target="#csrcCarousel" data-slide-to="0" class="active"></li>

						<li data-target="#csrcCarousel" data-slide-to="1"></li>

						<li data-target="#csrcCarousel" data-slide-to="2"></li>

					</ol> -->

					<div class="carousel-inner">

			<?php
			if( have_rows('carousel') ):
			    while( have_rows('carousel') ) : the_row();
			        $image = get_sub_field('image');
			        $vid = get_sub_field('video');
			        $rows = get_row_index();
			        ?>
						<div class="carousel-item <?php if( $rows==1 ){ echo "active"; } ?>">


						<!-- 	<?php if( $image ): ?>
							<img src="<?php echo $image['url']; ?>" class="d-block w-100" alt="<?php echo $image['alt']; ?>">
							<?php endif; ?> -->

							<?php if( $vid ): ?>

							<div class="iframeWrpr">


<?php

// Load value.
$iframe = get_sub_field('video');

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replcae HTML.
$params = array(
    'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1,
    'autoplay'  => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// Display customized HTML.
echo $iframe;
?>

							</div>


							<?php endif; ?>


							<?php if( get_sub_field('caption') ): ?>

								<div class="carousel-caption text-left">
									<?php the_sub_field('caption'); ?>
								</div>
							<?php endif; ?>
						</div>
			<?php
			    endwhile;

			else :
			    // Do something...
			endif;
			?>

					</div>

					<a class="carousel-control-prev" href="#csrcCarousel" role="button" data-slide="prev">

						<img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png" alt="">

						<span class="sr-only">Previous</span>

					</a>

					<a class="carousel-control-next" href="#csrcCarousel" role="button" data-slide="next">

						<img src="<?php echo get_template_directory_uri(); ?>/images/left-arrow.png" alt="">

						<span class="sr-only">Next</span>

					</a>

				</div>

			</div>

			<div class="col-lg-3">

				<div class="csrcNewsWrpr">
<?php $ne = get_field('sidebar_n_e');
if( $ne ): ?>
					<h3 class="mb-2"><?php echo $ne['sidebar_title']; ?></h3>

					<hr class="mt-3">
				<?php
				if( have_rows('sidebar_n_e') ): while ( have_rows('sidebar_n_e') ) : the_row(); 
				    if( have_rows('link_with_text') ): ?>
						<ul class="list-unstyled my-3">
				<?php
				    	while ( have_rows('link_with_text') ) : the_row();
				?>

					<?php 
					$link = get_sub_field('insert_link');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<li>
							<a target="<?php echo esc_attr( $link_target ); ?>" class="linkInherit" href="<?php echo esc_url( $link_url ); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo esc_html( $link_title ); ?></a>
						</li>

					<?php endif; ?>

        				

		    	<?php endwhile; ?>
		    			</ul>
		<?php
			endif;
		endwhile; endif;
		?>

<?php endif; ?>


<?php $wg = get_field('sidebar_ways_to_give');
if( $wg ): ?>
					<h3 class="mb-2"><?php echo $wg['title']; ?></h3>

					<hr class="mb-3 mt-3">
					<?php if( $wg['image'] ): ?>
					<a target="_blank" href="<?php echo $wg['image_link']; ?>">
						<img src="<?php echo $wg['image']['url']; ?>" class="img-fluid" alt="<?php echo $wg['image']['alt']; ?>">
					</a>
					<?php endif; ?>
<?php endif; ?>
				</div>

			</div>

		</div>

	</div>


<div class="csrsCollapseWrpr container1300 container mb-5">

<?php
// Check rows exists.
if( have_rows('tabs') ): ?>
	<div class="btnWrapper d-flex flex-wrap">
<?php
    while( have_rows('tabs') ) : the_row();
    	$btnCount = get_row_index();
?>
        <div class="collapseBtn <?php if( $btnCount == 1 ){ echo "active"; } ?>" data-id="tadid-<?php echo $btnCount; ?>"><?php the_sub_field('tab_name') ?></div>
<?php
    endwhile; wp_reset_postdata(); ?>
	</div>
	<div class="collapseContent">
		<?php
		    while( have_rows('tabs') ) : the_row();
		    	$btnCount = get_row_index();
		?>
			<div class="contentGroup projects <?php if( $btnCount == 1 ){ echo "active"; } ?>" id="tadid-<?php echo $btnCount; ?>" style="<?php if( $btnCount!== 1 ){ echo "display: none"; } ?>">
				<?php the_sub_field('tab_content'); ?>
			</div>
		<?php endwhile; ?>
	</div>
<?php
else :
endif;
?>

</div>


	<br>

</main>

	



<?php get_footer(); ?>