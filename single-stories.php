<?php get_header(); 
$main_post_id=get_the_ID();
?>

<div class="heroWrapper mtHeaderGap">
	<div class="searchBarWrpr container1682">
		<?php get_search_form(); ?>
		<h1 class="heroTitle">Stories Details</h1>
		<?php dynamic_sidebar('breadcrumb'); ?>

	</div>

</div>

<main class="otherPages postDetails singleStories">


	<div class="container container1200 pt-4 my-5">
		<div class="row">

			<div class="col-md-7">
				<div class="storiesDetailsImgWrapper">
                <?php
                $group = get_field('featured_image_or_video');

                if( $group ):

                    $img_or_vid = $group['image__video'];
                    
                if( $img_or_vid == 'Image' ):


					$mainimage=wp_get_attachment_image( $group['image'], 'full', "", array( "class" => "img-fluid" ) );
					if(!$mainimage)
					{
						$mainimage='<img src="'.home_url().'/wp-content/uploads/2021/01/stories-thumb.jpg" alt="'.get_the_title().'" class="img-fluid">';
					}
					echo $mainimage;
                ?>

                

                <?php else: ?>

                    <div class="iframeClick">
                        
                        <?php echo wp_get_attachment_image( $group['video_thumbnail'], 'full', "", array( "class" => "img-fluid" ) ); ?>

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
                        <iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>

                <?php endif; ?>

                <?php else: ?>

                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2021/01/stories-details-thumb.jpg" alt="<?php the_title(); ?>" class="img-fluid">

                <?php endif; ?>
				</div>

			</div>
			<div class="col-md-5">

				<?php
				if( have_rows('post_testimonial') ):
				?>

				<div id="storiesTestimonial" class="carousel slide storiesCarouselWrapper" data-ride="carousel">
					<div class="carousel-inner">

						<?php
						while( have_rows('post_testimonial') ) : the_row(); $index = get_row_index();
						?>

						<div class="carousel-item <?php if ( $index ==1 ){ echo "active"; }  ?>">
							<div class="storiesSummaryWrapper">
							<img src="<?php echo home_url(); ?>/wp-content/uploads/2021/01/quote-icon.png" class="img-fluid">
							<?php the_sub_field('summary'); ?> 
							</div>
						</div>
						<?php
						endwhile; wp_reset_postdata();
						?>

					</div>

					<ol class="carousel-indicators">
						<?php
						while( have_rows('post_testimonial') ) : the_row(); $index = get_row_index();
						?>
					    <li data-target="#storiesTestimonial" data-slide-to="<?php echo $index-1; ?>" class="<?php if ( $index ==1 ){ echo "active"; }  ?>"></li>
					    <?php
						endwhile; wp_reset_postdata();
						?>
					 </ol>

				</div>

				<?php
				else :
				endif;
				?>



			</div>


			<div class="col-12 content">

			<?php
			$post_tags = wp_get_post_terms(get_the_ID(), 'stories-tags', array('fields' => 'all'));
			//$post_tags = get_the_tags();
			$post_used_tags=[];
			if ($post_tags):
			?>
			<div class="tagsWrapper mt-4 mb-3"><b class="text-blue">TAG: &nbsp;&nbsp;</b>
			
			<?php
			$i = 0;
			$tagLength = count($post_tags);
			foreach ($post_tags as $tag):
			$i++;
			array_push($post_used_tags,$tag->slug);
			?>
			<span>
			    <a class="" href="<?=bloginfo('url').'/stories-tags/'.$tag->slug;?>"><?php print_r($tag->name);?></a>
			</span>
			
			<?php endforeach;?>
			</div>
			
			<?php endif; ?>



				<?php the_title( '<h2 class="mainTitle mb-3">', '</h2>', true ); ?>

				<?php //the_title( '<h2 class="text-center">', '</h2>', true ); ?>
				<?php the_post_thumbnail( 'full',  ['class' => 'img-fluid'] ); the_content(); ?>
			</div>
		</div>

	</div>

<?php
if($post_tags)
{
	?>
<div class="container-fluid bg-gray">

		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mainTitle my-5">Related Stories</h2>
			</div>
		</div>

		<div class="container container1682 column3Box">

			<div class="owl-carousel pb-5 relatedStoriesCarousel" id="relatedStories">
				<?php
					global $wpdb;				

				// print_r($post_used_tags);
					$args = array(
						'post_type' => 'stories',	
						'post__not_in'=>[$main_post_id],		
						'post_status' => 'publish',
						'posts_per_page'=>12,
						'paged' => 1,				
					);
				
				
					$args['tax_query'] = array(		
						array(				
							'taxonomy' => 'stories-tags',			
							'field' => 'slug',			
							'terms' => $post_used_tags,				
						),				
					);			
								
					$loop = new WP_Query($args);
					// echo $wpdb->last_query;
					global $post;				
					$totalpost = $loop->found_posts;	

					if ($loop->have_posts()) {	

						while ($loop->have_posts()) {
				
									$loop->the_post();	
									//print_r($loop->the_post);			
									?>
									<div class="item">
										<div class="box borderBottomRed storyBox">
									<?php
									$group = get_field('featured_image_or_video');				
									if( $group )
									{
				
										$img_or_vid = $group['image__video'];
										
										if( $img_or_vid == 'Image' )
										{
											$image=wp_get_attachment_image( $group['image'], array("535","349",true), "", array( "class" => "img-fluid" ) );
											if(!$image)
											{
												$image='<img src="'.home_url().'/wp-content/uploads/2021/01/stories-thumb.jpg" alt="'.get_the_title().'" class="img-fluid">';
											}
											 echo '<div class="storyFeaturedImage"><a href="'.get_the_permalink().'" >'.$image.'</div>';
										}
										else
										{			
		
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
											?>
											<div class="iframeClick"><?=wp_get_attachment_image( $group['video_thumbnail'], 'full', "", array( "class" => "img-fluid" ) )?><button class="btn playbtn" onclick="play_tag_video(this)" data-src="<?=$onlySrc; ?>" >
											<img src="<?=site_url().'/wp-content/uploads/2020/12/play-btn.png';?>" loading="lazy" class="img-fluid" alt=""><span class="sr-only">Click to play video</span>
												</button>
											</div>
				
											<div class="iframeWrpr d-none">
												<p class="alert-gray text-center">Loading...</p>
												<iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
											</div>
											<?php
										}
									}
									else
									{
				
										?>
										<a href="<?=get_the_permalink()?>" ><img src="<?=home_url().'/wp-content/uploads/2021/01/stories-thumb.jpg'?>" alt="<?=get_the_title()?>" class="img-fluid"></a>
										<?php
									}
				
				
				
									echo '<div class="storyDescWrapper"><h3 class="title"><a href="'.get_the_permalink().'" >'.wp_trim_words( get_the_title(),7,'...').'</a></h3>';
									echo '<div class="excerpts">'.mb_strimwidth( get_the_excerpt(),0,200,'...' ).'</div></div>';
				
									?>
									<p class="readMoreBtnStory"><a class="readmoreLink d-block mt-3" href="<?=get_the_permalink()?>" >Read Full Story</a></p>
				
								</div>
								
							</div>
							<?php
							}
						}
				?>

				

			</div>

		</div>

</div>
<?php
}
?>

</main>

<?php get_footer(); ?>