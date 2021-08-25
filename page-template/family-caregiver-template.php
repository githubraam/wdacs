<?php 

/*

Template Name: Family-caregiver


*/

get_header();
?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">

	<div class="container programCont container1050 mt-5 pt-5 text-center">

		<?php if ( get_field('section_1') ): the_field('section_1'); ?>
			
		<?php endif ?>

	</div>



	<div class="container container1300 mt-4">

			<div class="familyAccordWrapper">

				<div class="toggleWrapper">

					<?php
					if( have_rows('toggler') ):
					    while( have_rows('toggler') ) : the_row();
					?>
					<button class="accordion btn"><?php the_sub_field('tab_name'); ?></button>

					<div class="panel mb-2">

						<div><?php the_sub_field('tab_content'); ?></div>

					</div>
					<?php
					    endwhile;
					    wp_reset_postdata();
					endif;
					?>
				</div>

			</div>

	</div>



	<div class="container programCont container1300">

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
        endwhile;  wp_reset_postdata(); endif;            
        endwhile; endif;
        ?>

	</div>



	<div class="container-fluid text-center py-5 my-4">
		<?php the_field('bottom_notice'); ?>

		<!-- <button data-toggle="modal" data-target="#fcsp" class="btn btn-yellow fcspBtn">Family Caregiver Support Program (FCSP) Providers</button> -->

	</div>



</main>





<!-- modal -->

<div class="modal fade ssplModal" id="fcsp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header">

        <h3 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-heartbeat" aria-hidden="true"></i> &nbsp;Family Caregiver Support Program (FCSP) Providers</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>



      <div class="modal-body">
      	<?php the_field('popup_content'); ?>

      </div>


    </div>

  </div>

</div>





<!-- ending of modal -->



<?php get_footer(); ?>