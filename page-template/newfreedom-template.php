<?php 

/*

Template Name: newfreedom

*/

get_header();

?>
<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->
<?php
$introduction=get_field('introduction');
$introduction_section_2=get_field('introduction_section_2');
$transportation_resources=get_field('transportation_resources');
$wdacs_new_freedom=get_field('wdacs_new_freedom');
$wdacs_transportation_announcements=get_field('wdacs_transportation_announcements');
?>

<main class="otherPages">

	<?php get_template_part('template-part/inner-page-navigation'); ?>

	<div class="container programCont container1682 pt-4">

		<div class="row">
			<div class="col-md-6">
				<h2 class="mainTitle mb-3"><?=$introduction['title']; ?></h2>

				<p>
				<?=$introduction['description']; ?>
				</p>

			</div>

			<div class="col-md-6">
				<div id="newfreedom" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
					<?php
					$i=1;
					foreach ($introduction['images'] as $imagearr)
					{
					 ?>
						<div class="carousel-item <?=$i==1?'active':NULL?>">
							<img src="<?=$imagearr['image']?>"  loading="lazy" class="d-block w-100" alt="">
						</div>
						<?php
						$i++;
					}
					 ?>
					</div>
					<a class="carousel-control-prev" href="#newfreedom" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#newfreedom" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

		</div>

		<div class="row mt-5">
			<div class="col-md-6">
				
				<div class="iframeClick">
				    <img src="<?=$introduction_section_2['thumbnail_image'];?>" class="img-fluid" alt="" loading="lazy" >
				    <button class="btn playbtn"
				    data-src="<?php
                        $vidLink = $introduction_section_2['video_link'];
                        preg_match('/src="(.+?)"/', $vidLink, $matches);
                        $src = $matches[1];
                        $params = array(
                        
                            'controls'  => 1,                        
                            'hd'        => 1,                        
                            'autohide'  => 1,                        
                            'loop'      => 1,
                            'autoplay'  => 1
                        
                        );
                        
                        $onlySrc = add_query_arg($params, $src);                        
                        echo $onlySrc;                        
                    ?>">
				        <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/12/play-btn.png" loading="lazy" class="img-fluid" alt=""><span class="sr-only">Click to play video</span>
				    </button>
				</div>

				<div class="iframeWrpr d-none">
				    <p class="alert-gray text-center">Loading...</p>
				    <iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
				</div>


			</div>
			<div class="col-md-6">
				<h2 class="mainTitle mb-3"><?=$introduction_section_2['title']?></h2>
				<?=$introduction_section_2['description']?>
			</div>
		</div>

	</div>


	<div class="container-fluid bg-gray py-5 mt-5" id="trlac">
		<div class="container container1682">
			<h2 class="text-center mainTitle pb-5"><?=$transportation_resources['title'];?></h2>
			<p class="text-center"><?=$transportation_resources['description'];?></p>
		</div>

		<div class="container container1682 mt-5">
		
<?php


// print_r($transportation_resources['columns']);exit;
if( have_rows('transportation_resources') ): while ( have_rows('transportation_resources') ) : the_row(); 
    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();
    $checkEvenOdd = get_row_index();
    $checkEvenOdd = $checkEvenOdd % 2;
?>



		<div class="row mb-5">

			<div class="col-md-6  <?php if( $checkEvenOdd == true ){ echo " order-1 order-md-2"; } ?>">
				<?php get_template_part('template-part/image-or-video'); ?>

			</div>



			<div class="col-md-6  <?php if( $checkEvenOdd == true ){ echo " order-2 order-md-1"; } ?>">

				<?=get_sub_field('content'); ?>

			</div>

		</div>

<?php

endwhile;  wp_reset_postdata(); endif;
endwhile; endif;

?>


		</div>

	</div>


	<div class="container programCont container1682 pb-5" id="nfts">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center mainTitle my-5">WDACS New Freedom Transportation Services</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?=$wdacs_new_freedom?>


			</div>
		</div>
	</div>

	<div class="container-fluid bg-gray py-5 mt-5" id="tna">
		<div class="container programCont container1682 pb-5">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center mainTitle my-5">WDACS Transportation Announcements & Newsletters	</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h3 class="prTitle mb-4">For Existing Clients</h3>

					<div class="row bg-dark text-white p-4">
						<div class="col-12">
							<h4 class="mb-3 text-center">Contractor Information:</h4>
						</div>
						<?php 
						if( have_rows('wdacs_transportation_announcements') ): while ( have_rows('wdacs_transportation_announcements') ) : the_row(); 
							if( have_rows('contact_informations') ): while ( have_rows('contact_informations') ) : the_row();
							?>
						<div class="col-md-6">
							<?=get_sub_field('informations');?>
						</div>
						<?php
						
							endwhile;  wp_reset_postdata(); endif;
						endwhile; endif;
						?>
					</div>

					<?=$wdacs_transportation_announcements['description']?>

				</div>
			</div>
		</div>
	</div>


</main>


<?php get_footer(); ?>