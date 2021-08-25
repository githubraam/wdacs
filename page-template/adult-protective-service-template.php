<?php 

/*
Template Name: Adult Protective
*/


get_header();

?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">

	<div class="container programCont container1300">

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
            <div class="col-md-6 text-right <?php if( $checkEvenOdd == false ){ echo " order-1 order-md-2"; } ?> ">
               <?php get_template_part('template-part/image-or-video'); ?>
            </div>
            <div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-2 order-md-1"; } ?> ">
                <?php echo get_sub_field('content'); ?>
            </div>
        </div>
        <?php
        endwhile;  wp_reset_postdata(); endif;            
        endwhile; endif;
        ?>
	</div>


<?php $redBox = get_field('red_box_board'); if( $redBox ): ?>
	<div class="reportAbueSection py-5">
		<div class="container1300 container text-center">
			<?php if( $redBox['title'] ): ?>
			<h2 class="text-white d-flex justify-content-center align-items-center title"><img src="<?php echo get_template_directory_uri(); ?>/images/warning-ign.png" class="img-fluid"><?php echo $redBox['title']; ?></h2>
			<?php endif; ?>
		</div>

		<div class="infoSection container1300 container text-center bg-white py-4 mt-4 px-5 text-danger">
			<?php echo $redBox['white_box_blurb']; ?>
		</div>

		<div class="container1300 container text-center text-white footerInfo">
			<?php echo $redBox['after_box_content']; ?>
		</div>		
	</div>
<?php endif; ?>




	<div class="container programCont container1300 pb-5" id="meals">



		<div class="row">

			<div class="col-md-12">

				<h2 class="text-center mainTitle mt-5"><?php echo get_field('section_3')['title']; ?></h2>

				<?php echo get_field('section_3')['blurb']; ?>

			</div>

		</div>

		

        <?php
            if( have_rows('section_3') ): while ( have_rows('section_3') ) : the_row();
                if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();
                $checkEvenOdd = get_row_index();
                $checkEvenOdd = $checkEvenOdd % 2;
            ?>
        <div class="row mb-5">
            <div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-1 order-md-2"; } ?> ">
                <?php get_template_part('template-part/image-or-video'); ?>
            </div>
            <div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-2 order-md-1"; } ?> ">
                <?php echo get_sub_field('content'); ?>
            </div>
        </div>
        <?php
        endwhile;  wp_reset_postdata(); endif;            
        endwhile; endif;
        ?>

	</div>



	<div class="container-fluid bg-gray">



		<div class="row">

			<div class="col-md-12">
				<?php $t4 = get_field('section_4')['title']; if( $t4 ): ?>
				<h2 class="text-center mainTitle mt-5 mb-3"><?php echo $t4; ?></h2>
				<?php endif; ?>

				<?php $text4 = get_field('section_4')['short_descrption']; if( $text4 ): ?>
				<p class="text-center weight600"><?php echo $text4; ?></p>
				<?php endif; ?>
			</div>

		</div>



		<div class="container container1682 column3Box">



			<div class="row">


        <?php
            if( have_rows('section_4') ): while ( have_rows('section_4') ) : the_row();
                if( have_rows('content_box') ): while ( have_rows('content_box') ) : the_row();
        ?>
				<div class="col-md-6 col-lg-4 px-lg-2 mt-5">

					<div class="box borderBottomRed">
						<?php $cb4 = get_sub_field('title'); if( $cb4 ): ?>
						<h3 class="title my-2"><?php echo $cb4; ?></h3>
						<?php endif; ?>

						<?php $bt4 = get_sub_field('box_text'); if( $bt4 ): echo $bt4; ?>
							
						<?php endif; ?>

					</div>

				</div>

        <?php
        endwhile;  wp_reset_postdata(); endif;            
        endwhile; endif;
        ?>


				<div class="col-md-12 py-5">
					<?php $acb4 = get_field('section_4')['notice_box_after_content_box']; if( $acb4 ): ?>

					<div class="bg-white py-4 px-4">
						<?php echo $acb4; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>





	<div class="container programCont container1300 pb-5">

		<div class="row">

			<div class="col-md-12 text-left">

				<?php the_field('section_5')['full_text']; ?>

			</div>

		</div>



	</div>



	<div class="csrsCollapseWrpr container1300 container mb-5">


		<?php
		if( have_rows('mandated_reporter_tabs') ):
		    while( have_rows('mandated_reporter_tabs') ) : the_row();
		    $tabName = get_sub_field('tab_name');
		    $tabConte = get_sub_field('tab_content');
		    $tabcount = get_row_index();
		    $active = "active";
		    if( $tabName ){
		    	$tabs .= '<div class="collapseBtn ';

		    	if( $tabcount==1 ){ $tabs .= $active; }

		    	$tabs .='" data-id="mdreportTab'.$tabcount.'">'.$tabName.'</div>';
		    }
		    if( $tabConte ){
		    	$tabC .= '<div class="contentGroup container-fluid ';
		    	if( $tabcount==1 ){ $tabC .= $active; }
		    	else{ $tabC .= 'd-none'; }
		    	$tabC .='" id="mdreportTab'.$tabcount.'">'.$tabConte.'</div>';
		    }
		?>

		<?php
		    endwhile;
		?>
			<div class="btnWrapper d-flex flex-wrap">
				<?php echo $tabs; ?>
			</div>
			<div class="collapseContent">
				<?php echo $tabC; ?>
			</div>
		<?php
		endif;
		?>
	</div>



	<div class="container-fluid bg-gray py-5">

		<div class="container container1300">

			<?php $faqtitle = get_field('faq_title'); if( $faqtitle ): ?><h2 class="text-center title mb-4"><?php echo $faqtitle; ?></h2><?php endif; ?>

			<div class="familyAccordWrapper">

				<div class="toggleWrapper">

					<?php
					if( have_rows('faq') ):
					    while( have_rows('faq') ) : the_row();
					?>
					<button class="accordion btn"><?php the_sub_field('question'); ?></button>

					<div class="panel mb-2">

						<div><?php the_sub_field('answer'); ?></div>

					</div>
					<?php
					    endwhile;
					    wp_reset_postdata();
					endif;
					?>
				</div>

			</div>

		</div>

	</div>



<?php $apsBoard = get_field('notice_board'); if( $apsBoard ): ?>
	<div class="container-fluid text-center py-5 mt-4 mb-5">

		<?php if ( $apsBoard['title'] ): ?>
			<h2 class="mb-4"><?php echo $apsBoard['title']; ?></h2>
		<?php endif ?>


		<?php if ( $apsBoard['blurb'] ): ?>
			<?php echo $apsBoard['blurb']; ?>
		<?php endif ?>

	</div>
<?php endif; ?>



</main>

<?php get_footer(); ?>