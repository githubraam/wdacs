<?php 
/*

Template Name: Business develop services

*/

get_header();

?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">

<?php

	if( have_rows('inner_section_navigator') ): ?>

	<div class="internalNav">

		<ul class="list-unstyled d-flex justify-content-center">

	<?php

	    while( have_rows('inner_section_navigator') ) : the_row();

	    $count = get_row_index();

	?>

	   	<li>

			<a href="<?php the_sub_field('link'); ?>"

				class="				

				<?php

				if( $count == 1 ){ echo "active "; }

				$checkHash = get_sub_field('link');

				if( substr($checkHash, 0, 1 ) === "#" )

				{echo "moveToDiv"; }

				?> ">

				<?php the_sub_field('navigator_name'); ?>					

			</a>

		</li>

	<?php
	    endwhile;

	?>
		</ul>

	</div>

	<?php

	else :



	endif;

?>



	<div class="container-fluid" id="business-counseling">

		<div class="row">

			<div class="col-md-12">

				<h2 class="text-center mainTitle my-5"><?php echo get_field('section_1')['title']; ?></h2>

			</div>

		</div>

		<div class="container container1682 column3Box">

			<div class="row">

<?php



if( have_rows('section_1') ): while ( have_rows('section_1') ) : the_row(); 



    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();

?>

				<div class="col-md-6 col-lg-4 px-lg-2 mb-3">
					<div class="box borderBottomRed">
						<?php get_template_part('template-part/image-or-video'); ?>

						<?php echo get_sub_field('content'); ?>
					</div>
				</div>

<?php

    endwhile;  wp_reset_postdata(); endif;
endwhile; endif;
?>

			</div>
		</div>
	</div>
<br>



	<div class="container-fluid bg-gray mt-5" id="employee-development">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center mainTitle my-5"><?php echo get_field('section_2')['title']; ?></h2>
				</div>
			</div>
		</div>
		<div class="container container1050 pb-4">
<?php

if( have_rows('section_2') ): while ( have_rows('section_2') ) : the_row(); 
    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();

    $checkEvenOdd = get_row_index();
    $checkEvenOdd = $checkEvenOdd % 2;
?>

			<div class="row mb-5">

				<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-md-2"; } ?>">

				<?php get_template_part('template-part/image-or-video'); ?>

				</div>
				<div class="col-md-6  <?php if( $checkEvenOdd == false ){ echo " order-md-1"; } ?>">

					<?php echo get_sub_field('content'); ?>

				</div>

			</div>
<?php

    endwhile;  wp_reset_postdata(); endif;

endwhile; endif;

?>



			
			<?php echo get_field('section_2')['after_boxes']; ?>



		</div>
	</div>



	<div class="container-fluid pt-5 mb-3" id="layoff">



		<h2 class="mainTitle text-center mb-4"> <?php echo get_field('section_3')['title']; ?></h2>
		<div class="container programBoxCont">
			<?php echo get_field('section_3')['description']; ?>
				

<?php

if( have_rows('section_3') ): while ( have_rows('section_3') ) : the_row(); 

    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();

?>

			<div class="box">

				<?php get_template_part('template-part/image-or-video'); ?>

				<?php echo get_sub_field('content'); ?>

			</div>

<?php

    endwhile;  wp_reset_postdata(); endif;
endwhile; endif;

?>

		</div>

	</div>

	<div class="container-fluid bg-dark jobNotice">
		<div class="container text-white py-5">
			<!-- content coming from page id 21 ie.  Job Training and Placement Services -->
			<?php the_field('job_center',21); ?>
		</div>

	</div>
</main>



	







<?php get_footer(); ?>