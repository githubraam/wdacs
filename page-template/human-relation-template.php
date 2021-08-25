<?php 

/*

Template Name: Human Relation

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

<?php

$hist = get_field('history');

if($hist):

?>

	<div class="container-fluid historyWrpr">
		<div class="container text-white">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center"><?php echo $hist['title']; ?></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<?php echo $hist['left_content']; ?>
				</div>
				<div class="col-md-6">
					<?php echo $hist['right_content']; ?>
				</div>
			</div>

		</div>

	</div>

<?php endif; ?>



	<div class="container programCont container1400 my-5">

<?php



if( have_rows('section_3') ): while ( have_rows('section_3') ) : the_row(); 
    if( have_rows('columns') ): while ( have_rows('columns') ) : the_row();
    $checkEvenOdd = get_row_index();
    $checkEvenOdd = $checkEvenOdd % 2;
?>



		<div class="row mb-5">

			<div class="col-md-6  <?php if( $checkEvenOdd == false ){ echo " order-1 order-md-2"; } ?>">
				<?php get_template_part('template-part/image-or-video'); ?>

			</div>



			<div class="col-md-6  <?php if( $checkEvenOdd == false ){ echo " order-2 order-md-1"; } ?>">

				<?php echo get_sub_field('content'); ?>

			</div>

		</div>

<?php

    endwhile;  wp_reset_postdata(); endif;

endwhile; endif;

?>

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

					<!-- <div class="iframeClick">
					    <img src="http://demoservers.net/pm/wdacs/wp-content/uploads/2020/12/mission.jpg" class="img-fluid" alt="" loading="lazy">
					    <button class="btn playbtn" data-src="
					    https://player.vimeo.com/video/404844532?dnt=1&amp;app_id=122963&amp;controls=1&amp;hd=1&amp;autohide=1&amp;loop=1&amp;autoplay=1">
					        <img src="http://demoservers.net/pm/wdacs/wp-content/uploads/2020/12/play-btn.png" loading="lazy" class="img-fluid" alt=""><span class="sr-only">Click to play video</span>
					    </button>
					</div>

					<div class="iframeWrpr d-none">
					    <p class="alert-gray text-center">Loading...</p>
					    <iframe allow="autoplay; fullscreen" allowfullscreen="" frameborder="0"></iframe>
					</div> -->
					
<?php
                $group = get_field('history_image_video');

                if( $group ):

                    $img_or_vid = $group['image__video'];
                    
                if( $img_or_vid == 'Image' ):


					if($group['image'])
					{
						echo '<img src="'.$group['image'].'" alt="'.get_the_title().'" class="img-fluid">';
					}
                ?>

                

                <?php else: ?>

                    <div class="iframeClick">
                        <?php
					if($group['video_thumbnail'])
					{
						echo '<img src="'.$group['video_thumbnail'].'" alt="'.get_the_title().'" class="img-fluid">';
					}
					?>

                        <button class="btn playbtn"
                        data-src="
                        <?php
                            $vidLink = $group['video'];
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
                        ?>"
                        >
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/12/play-btn.png" loading="lazy" class="img-fluid" alt=""><span class="sr-only">Click to play video</span>
                        </button>
                    </div>

                    <div class="iframeWrpr d-none">
                        <p class="alert-gray text-center">Loading...</p>
                        <iframe allow="autoplay; fullscreen" allowfullscreen="" frameborder="0"></iframe>
                    </div>

                <?php endif; ?>

                <?php else: ?>

                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2021/01/stories-details-thumb.jpg" alt="<?php the_title(); ?>" class="img-fluid">

                <?php endif; ?>


				</div>

			</div>

		</div>

	</div>





</main>

	



<?php get_footer(); ?>