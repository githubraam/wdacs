<?php 

/*

Template Name: Community Service Center

*/

get_header();

?>
<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">

	<div class="container text-center container1200 pt-4">

		<h2 class="mainTitle mt-5 mb-3"><?php echo get_field('section_1')['title']; ?></h2>

		<?php echo get_field('section_1')['blurb']; ?>

		<br>

		<br>

	</div>

	<div class="container container1200">

		<div class="row">

<?php

if( have_rows('section_1') ): while ( have_rows('section_1') ) : the_row(); 
    if( have_rows('feature_listing') ): while ( have_rows('feature_listing') ) : the_row();
?>
			<div class="col-md-6">
				<div class="iconWithText d-flex">
					<div class="iconWrapper listNo<?php echo get_row_index(); ?>">

						<img src="<?php echo get_sub_field('icon')['url']; ?>" class="img-fluid" alt="<?php echo get_sub_field('icon')['alt']; ?>">

					</div>

					<div class="iconContent">

						<h3 class="title"><?php echo get_sub_field('title'); ?></h3>

						<p><?php echo get_sub_field('blurb'); ?></p>

					</div>

				</div>

			</div>

<?php

    endwhile;  wp_reset_postdata(); endif;

endwhile; endif;

?>



		</div>

	</div>



	<div class="container-fluid bg-dark text-center text-white py-5 mt-4">

		<?php the_field('gray_notice_board'); ?>

	</div>



	<div class="container centerAndServiceFilterWrapper py-5">

		<div class="d-flex justify-content-between selectformWrapper mt-4">



			<div class="form-group mb-4">

				<label for="center" class="text-blue d-block mb-2">Select Center</label>

				

				<?php				

				$taxonomies = get_terms( array(

				    'taxonomy' => 'center_categories',

				    'hide_empty' => true

				) );

				 

				if ( !empty($taxonomies) ) :

				    $output = '<select id="center">';

				    $countS = 0;

				    foreach( $taxonomies as $category ) {

				    	$countS++;

				        if( $category->parent == 0 ) {

				           $output.= '<option value="'. esc_attr( $category->term_id ).'"';

				            if($countS == 1){

				            	$output.= ' selected';

				            }

				            $output.= '>'.esc_attr( $category->name );

				            $output.='</option>';

				        }

				    }

				    $output.='</select>';

				    echo $output;

				endif;

				?>

		

			</div>



			<div class="form-group mb-4">

				<label for="servics" class="text-blue d-block mb-2">Select Services</label>



				<?php				

				$taxonomies = get_terms( array(

				    'taxonomy' => 'services_categories',

				    'hide_empty' => true

				) );

				 

				if ( !empty($taxonomies) ) :

				    $output = '<select id="services">';

				    $countS = 0;

				    foreach( $taxonomies as $category ) {

				    	$countS++;

				        if( $category->parent == 0 ) {

				            $output.= '<option value="'. esc_attr( $category->term_id ).'"';

				            if($countS == 1){

				            	$output.= ' selected';

				            }

				            $output.= '>'.esc_attr( $category->name );

				            $output.='</option>';

				        }

				    }

				    $output.='</select>';

				    echo $output;

				endif;

				?>



			</div>

		</div>

		<div class="centerServiceResultWrpr">



			<div class="title bg-blue py-1">

				<h2 class="text-center text-white title">Program Name & Description</h2>

			</div>





			<div class="resultContent bg-lightgray" id="serviceAndCenterData">



			<?php

			$args = array(

				'posts_per_page' => 6,

				'post_type' => 'community',

				'orderby' => 'date',

				'order' => 'DESC',

				'tax_query' => array(

					array(

						'taxonomy' => 'center_categories',

						'field' => 'id',

						'terms' => 8,

					),

					array(

						'taxonomy' => 'services_categories',

						'field' => 'id',

						'terms' => 42,

					),

				),

			);



			$q = new WP_Query($args);

			if ($q->have_posts()) {

				while ($q->have_posts()) {

					$q->the_post();

			?>

				<div class="rRow d-flex">

					<div class="programName"><?php the_title(); ?></div>

					<div class="description"><?php the_excerpt(); ?></div>

				</div>



			<?php				

				}
				wp_reset_postdata();

			}

			else{

				echo "Sorry No data Found";

			}

			?>


			</div>

			<div id="loader" class="text-center mt-3" style="display: none;">

				<img src="<?php echo get_template_directory_uri();?>/images/loader.gif" class="img-fluid" alt="">

			</div>

		</div>

	</div>





	<div class="container container1682 galleryCont">

		<?php if ( get_field('gallery_title') ): ?>
			<h2 class="text-center mb-4"><?php the_field('gallery_title'); ?></h2>
		<?php endif ?>


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


		<p class="text-center my-5"><a href="<?php echo home_url();?>/community-seniors-centers-gallery/" class="btn btn-yellow viewAll">VIEW ALL IMAGES</a></p>


	</div>



    <div class="container-fluid mb-5 pt-4">

        <div class="container1682 px-2">



<?php
$map_program_post = get_field('choose_program');
if( $map_program_post ):
?>
            <div class="contentGroup mapContent container-fluid active">
            	<div class="row">
            		<div class="col-lg-9 order-2 order-lg-1">
            			<div class="mapIframeWRapper">
            				<?php the_field('map_embed_code',$map_program_post); ?>
            			</div>
            		</div>
            		<div class="col-lg-3 order-1 order-lg-2">
            			<h3 class="title mb-3">Locations</h3>
                		<div class="mapAddressWrapper">
                			<?php
							if( have_rows('location',$map_program_post) ):
							    while( have_rows('location',$map_program_post) ) : the_row();
							?>
							<address class="addressGroup">
                				<p class="centerName text-blue mb-0"><?php the_sub_field('location_name'); ?></p>
                				<p class="addr mb-0"><?php the_sub_field('address'); ?></p>
                				<p class="contNum"><i class="fa fa-phone mr-2" aria-hidden="true"></i> <?php the_sub_field('phone_number'); ?></p>
                			</address>

							<?php
							    endwhile;
							    wp_reset_postdata();
							else :
							endif;
							?>

                		</div>
            		</div>
            	</div>
            </div>

<?php endif; ?>


        </div>
    </div>
</main>
<?php get_footer(); ?>