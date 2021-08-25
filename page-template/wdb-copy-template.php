<?php 

/*

Template Name: WDB copy

*/

get_header();

?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>
<!-- hero ending -->

<main class="otherPages">

	<?php get_template_part('template-part/commission-inner-page-navigation'); ?>

<br>

	<div class="container container1400 my-5">

<?php

if( have_rows('section_2') ): while ( have_rows('section_2') ) : the_row(); 

    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();

    $checkEvenOdd = get_row_index();

    $checkEvenOdd = $checkEvenOdd % 2;

?>	

		<div class="row mb-5">

			<div class="col-md-6">

				<?php echo get_sub_field('content'); ?>				

			</div>



			<div class="col-md-6">

				<?php get_template_part('template-part/image-or-video'); ?>

			</div>			

		</div>

<?php

    endwhile;  wp_reset_postdata(); endif;

endwhile; endif;

?>

	</div>




	<div class="container-fluid py-5">

		<div class="boxGridWrpr container d-flex flex-wrap justify-content-center">

			<a target="_blank" href="https://wdacs.legistar.com/Calendar.aspx" class="box text-center">

				<img src="<?php echo get_template_directory_uri(); ?>/images/agenda.png" class="img-fluid">

				<p class="title">Board Agendas</p>

			</a>

			<a target="_blank" href="https://workforce.lacounty.gov/wdb/legislation/" class="box text-center">

				<img src="<?php echo get_template_directory_uri(); ?>/images/policies.png" class="img-fluid">

				<p class="title">Board Policies</p>

			</a>

			<a target="_blank" href="https://workforce.lacounty.gov/wdb/board/" class="box text-center">

				<img src="<?php echo get_template_directory_uri(); ?>/images/comnissioners.png" class="img-fluid">

				<p class="title">Board Commissioners</p>

			</a>

			<a target="_blank" href="https://workforce.lacounty.gov/wdb/lwda/" class="box text-center">

				<img src="<?php echo get_template_directory_uri(); ?>/images/area.png" class="img-fluid">

				<p class="title">LA County's Local Workforce Development Area</p>

			</a>

			<a target="_blank" href="https://workforce.lacounty.gov/wdb/workforcepartners/" class="box text-center">

				<img src="<?php echo get_template_directory_uri(); ?>/images/partners.png" class="img-fluid">

				<p class="title">LA County's Local Workforce Development Partners</p>

			</a>

			<a target="_blank" href="https://workforce.lacounty.gov/wdb/staff/" class="box text-center">

				<img src="<?php echo get_template_directory_uri(); ?>/images/staff.png" class="img-fluid">

				<p class="title">Board Staff</p>

			</a>

		</div>

	</div>




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




	<div class="container-fluid bg-dark jobNotice">

		<div class="container text-center text-white py-5">
			<!-- taken from job and training page -->
			<?php the_field('job_center',21); ?>

		</div>



	</div>



	<div class="container container1682 galleryCont my-5 pb-2">

		<h2 class="text-center mb-4">Workforce Development Board Gallery</h2>



		<div class="galleryWrapper d-flex flex-wrap">

		<?php 
		$galeryImg = get_field('gallery_upload__select_images');
		if( $galeryImg ): $galImgcount = 0; ?>
		    <?php foreach( $galeryImg as $image ): $galImgcount++; if( $galImgcount<7 ): ?>
		        <div class="galleryImg">
					<img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" >
				</div>
		    <?php endif; endforeach; ?>
		<?php endif; ?>

		</div>



		<p class="text-center my-5"><a href="<?php echo home_url();?>/workforce-development-board-gallery/" class="btn btn-yellow viewAll">VIEW ALL IMAGES</a></p>

	</div>



</main>

	



<?php get_footer(); ?>