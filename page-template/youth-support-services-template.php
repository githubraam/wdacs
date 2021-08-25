<?php 

/*

Template Name: Youth Support Serv

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

			<div class="col-md-6 <?php if( $checkEvenOdd == false ){ echo " order-1 order-md-2"; } ?> ">
				
				<?php get_template_part('template-part/image-or-video'); ?>

			</div>



			<div class="col-md-6  <?php if( $checkEvenOdd == false ){ echo " order-2 order-md-1"; } ?> ">

				<?php echo get_sub_field('content'); ?>

			</div>



		</div>

<?php
    endwhile;  wp_reset_postdata(); endif;

endwhile; endif;

?>

	</div>







	<div class="container-fluid bg-gray py-5" id="housing-welfare">

		<h2 class="mainTitle text-center mb-4"><?php echo get_field('section_2')['title']; ?></h2>

		<div class="container programBoxCont">			


<?php
if( have_rows('section_2') ): while ( have_rows('section_2') ) : the_row(); 
    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();
?>
			<div class="box pb-3">



				<?php get_template_part('template-part/image-or-video'); ?>

				<?php echo get_sub_field('content'); ?>

			</div>
<?php
    endwhile;  wp_reset_postdata(); endif;
endwhile; endif;
?>
		</div>
	</div>

</main>


<?php get_footer(); ?>