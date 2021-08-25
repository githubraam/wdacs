<?php 
/*
Template Name: Native America

*/

get_header();

?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">

	<?php get_template_part('template-part/commission-inner-page-navigation'); ?>

<?php

$hRel = get_field('human_relation_info');

if($hRel):

?>

	<div class="container mt-5 mb-5" id="">

		<div class="row">

			<div class="col-md-12">

				<h2 class="text-center mainTitle"><?php echo $hRel['title']; ?></h2>

				<?php echo $hRel['description']; ?>

			</div>

		</div>

	</div>

<?php endif; ?>



	<div class="container-fluid pb-4">

		<div class="container container1400 mb-5">

<?php

if( have_rows('section_2') ): while ( have_rows('section_2') ) : the_row(); 

    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();

    $checkEvenOdd = get_row_index();

    $checkEvenOdd = $checkEvenOdd % 2;

?>

			<div class="row">

				<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-1 order-md-2"; } ?>">

					<?php get_template_part('template-part/image-or-video'); ?>
				</div>

				<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-2 order-md-1"; } ?>">

					<?php echo get_sub_field('content'); ?>

				</div>

			</div>



		</div>

	</div>

<?php

    endwhile;  wp_reset_postdata(); endif;
endwhile; endif;

?>


<?php if( have_rows('reports') || have_rows('events_schedule') ): ?>
	<div class="container-fluid bg-lightgray py-5">

		<div class="container1400 container my-4">

			<div class="row">

				<div class="col-lg-7 col-md-6">
					<?php if( get_field('title_for_reports') ): ?>
					<h2 class="mb-4"><?php the_field('title_for_reports'); ?></h2>
					<?php endif; ?>

					<div class="pr-4 reportWrpr">

				<?php
				if( have_rows('reports') ):
				    while( have_rows('reports') ) : the_row();
				?>
						<div class="reportListwrpr pb-3 mb-4 d-flex">
							<div class="reportIcon pr-4">
								<a target="_blank" href="<?php echo get_sub_field('upload__select_pdf')['url']; ?>" download >
									<img src="<?php echo get_template_directory_uri(); ?>/images/pdf-icon.png" class="img-fluid">
								</a>
							</div>
							<div class="reportDesc"><p><a target="_blank" href="<?php echo get_sub_field('upload__select_pdf')['url']; ?>" download ><?php the_sub_field('short_description'); ?></a></p></div>
						</div>
				<?php
				    endwhile; wp_reset_postdata();
				endif;
				?>

					</div>

				</div>

				<div class="col-lg-5 col-md-6">

					<table class="reportPubTable" cellpadding="0">

						<thead>
							<tr>
								<th><?php the_field('date_title'); ?></th>
								<th><?php the_field('description_title'); ?></th>
							</tr>

						</thead>

						<tbody>


					<?php
					if( have_rows('events_schedule') ):
					    while( have_rows('events_schedule') ) : the_row();
					?>
							<tr>
								<td><?php the_sub_field('choose_date'); ?></td>
								<td><?php the_sub_field('description'); ?></td>
							</tr>
					<?php
					    endwhile; wp_reset_postdata();
					endif;
					?>

						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>

<?php endif; ?>

</main>

	



<?php get_footer(); ?>