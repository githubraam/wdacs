<?php 

/*

Template Name: Veterans Support

*/



get_header();



?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>


<!-- hero ending -->


<main class="otherPages">



	<div class="container programCont container1400 pb-5" id="employment-program">

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

</main>


<?php get_footer(); ?>