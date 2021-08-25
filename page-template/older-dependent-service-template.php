<?php 

/*
Template Name: Older Dependent
*/

get_header();

?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">

	<?php get_template_part('template-part/inner-page-navigation'); ?>

	<div class="container programCont container1050 pb-5" id="meals">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mainTitle my-5"><?php echo get_field('section_1')['title']; ?></h2>
			</div>
		</div>
<?php



if( have_rows('section_1') ): while ( have_rows('section_1') ) : the_row(); 
    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();
    $checkEvenOdd = get_row_index();
    $checkEvenOdd = $checkEvenOdd % 2;
?>

		<div class="row mb-5">
			<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-1 order-md-2"; } ?>">
				<?php get_template_part('template-part/image-or-video'); ?>
			</div>

			<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-2 order-md-1"; } ?>">
				<?php echo get_sub_field('content'); ?>
			</div>
		</div>

<?php
    endwhile;  wp_reset_postdata(); endif;
endwhile; endif;
?>

	</div>







	<div class="container-fluid bg-gray" id="supportservices">

		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mainTitle my-5"><?php echo get_field('section_2')['title']; ?></h2>
			</div>
		</div>

		<div class="container container1682 column3Box">
			<div class="row">
<?php



if( have_rows('section_2') ): while ( have_rows('section_2') ) : the_row(); 

    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();

?>

				<div class="col-md-6 col-lg-4 px-lg-2">



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



			<div class="row">

				<div class="col-md-12 text-center py-5">



					<?php 

					$aLink = get_field('section_2')['action_button'];

					if( $aLink ): 

					    $link_url = $aLink['url'];

					    $link_title = $aLink['title'];

					    $link_target = $aLink['target'] ? $aLink['target'] : '_self';

					    ?>

					    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>





	<div class="container programCont container1400 pb-5" id="caregiving">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mainTitle my-5"><?php echo get_field('section_3')['title']; ?></h2>
			</div>
		</div>

<?php



if( have_rows('section_3') ): while ( have_rows('section_3') ) : the_row(); 
    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();
    $checkEvenOdd = get_row_index();
    $checkEvenOdd = $checkEvenOdd % 2;
?>

		<div class="row mb-5">
			<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-1 order-md-2"; } ?>">

				<?php get_template_part('template-part/image-or-video'); ?>

			</div>

			<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-2 order-md-1"; } ?>">
				<?php echo get_sub_field('content'); ?>
			</div>
		</div>

<?php

    endwhile; wp_reset_postdata(); endif;
endwhile; endif;
?>

	</div>



	<div class="container-fluid bg-gray" id="improve">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mainTitle my-5"><?php echo get_field('section_4')['title']; ?></h2>
			</div>
		</div>



		<div class="container container1682 column3Box pb-5">



			<div class="row">

			<?php

			if( have_rows('section_4') ): while ( have_rows('section_4') ) : the_row(); 

			    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();

			?>
				<div class="col-md-6 col-lg-4 px-lg-2 mb-4">
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


	<div class="container-fluid text-center py-5 my-4">

		<?php the_field('notice'); ?>

	</div>

</main>







<!-- modal -->

<?php the_field('modal__popup'); ?>

<!-- ending modal -->







<?php get_footer(); ?>