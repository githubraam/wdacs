<?php get_header(); ?>



<main class="mtHeaderGap">
    <?php $banner = get_field('banner'); ?>
    <div class="homebanner container-fluid" style="background-image: url(<?php echo $banner['background_image']; ?>);">
        <div class="searchBarWrpr container1682">
            <?php get_search_form(); ?>
        </div>
        <div class="container1682">
            <div class="caption">

                <h1><?php echo $banner['title']; ?></h1>

                <!-- <p class="subHeading">A sub heading here, need content... </p> -->
                <p><?php echo $banner['caption']; ?></p>
<?php 

$button = $banner['button'];

if( $button ): 

    $link_url = $button['url'];
    $link_title = $button['title'];
    $link_target = $button['target'] ? $button['target'] : '_self';
    ?>

    <a class="btn btn-yellow d-inline-block" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

<?php endif; ?>

            </div>
        </div>
    </div>

    <div class="container1682 afterBanner">

    <?php

    if( have_rows('after_banner_stats_box') ): ?>
            <ul class="afterBannerList list-unstyled d-flex justify-content-center">
    <?php
        while( have_rows('after_banner_stats_box') ) : the_row();
    ?>

            <li>
                <a href="<?php the_sub_field('link'); ?>">

                    <?php $icons = get_sub_field('icon'); ?>

                    <img src="<?php echo $icons['url']; ?>" alt="<?php echo $icons['alt']; ?>" loading="lazy" class="img-fluid">
                    <h2 class="title"><?php the_sub_field('title'); ?></h2>
                    <?php if (get_sub_field('short_desciption')): ?>
                        <p><?php the_sub_field('short_desciption'); ?></p>
                    <?php endif ?>
                </a>

            </li>

    <?php

        endwhile; ?>

            </ul>

    <?php endif;?> 
    </div>


    <div class="container-fluid my-90">
        <div class="container1682 aboutCont">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="aboutVidWrpr iframeClick">

                        <?php
                        $img_or_vid = get_field('message_from_wdacs')['video__image'];
                        if( $img_or_vid == "Video" ):  ?>

                        <?php $vidThumb = get_field('message_from_wdacs')['video_thumbnail']; ?>
                        <img src="<?php echo $vidThumb['url']; ?>" class="img-fluid" alt="<?php echo $vidThumb['alt']; ?>" loading="lazy" >

                        <button class="btn playbtn" 
                        data-src="
                        <?php
                            $iframe = get_field('message_from_wdacs')['video_link'];
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];

                            $params = array(
                                'controls'  => 1,
                                'hd'        => 1,
                                'autohide'  => 1,
                                'autoplay' => 1
                            );
                            $new_src = add_query_arg($params, $src);
                            echo $new_src;
                            ?>
                        ">

                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/12/play-btn.png" class="img-fluid" alt="" loading="lazy" >
                            <span class="sr-only">Play</span>

                        </button>                        
                        <?php else: ?>
                            <?php $img = get_field('message_from_wdacs')['image']; ?>
                            <img loading="lazy" src="<?php echo $img['url']; ?>" class="img-fluid" alt="<?php echo $img['alt']; ?>">
                        <?php endif; ?>
                    </div>
                    <?php if( $img_or_vid == "Video" ): ?>
                    <div class="iframeWrpr d-none">
                        <p class="alert-gray text-center">Loading...</p>
                        <iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                    <?php endif; ?>



                </div>



                <div class="col-md-6">
                    <h2><?php echo get_field('message_from_wdacs')['title']; ?></h2>

                    <?php echo get_field('message_from_wdacs')['description']; ?>

                    <?php 

                    $mLink = get_field('message_from_wdacs')['button'];

                    if( $mLink ): 

                        $link_url = $mLink['url'];

                        $link_title = $mLink['title'];

                        $link_target = $mLink['target'] ? $mLink['target'] : '_self';

                        ?>

                        <a class="btn learnBtn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <div id="carouselExampleIndicators" class="storiesCarousel carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">

        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
    	<div class="carousel-inner">



<?php 

$args = array( 

'post_type' => 'stories' , 'posts_per_page'=>5,   

); 

  $story = new WP_Query( $args ); 

      if( $story->have_posts() ) {

        $storyCount = 0;

      while( $story->have_posts() ) {

        $storyCount++;

          $story->the_post(); 

       ?> 

        <div class="carousel-item <?php if($storyCount ==1 ){echo "active"; } ?> ">

          <div class="carousel-caption">

            <h2 class="storyTitle"><?php the_title(); ?></h2>

            <?php echo  mb_strimwidth( get_the_excerpt(),0,400,'...' ); ?>
            
            <a href="<?php the_permalink( ); ?>">Read Full Story</a>



            <?php 

            $sLink = get_field('internal__external_link');

            if( $sLink ): 

                $link_url = $sLink['url'];

                $link_title = $sLink['title'];

                $link_target = $sLink['target'] ? $sLink['target'] : '_self';

                ?>

                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

            <?php endif; ?>



                      </div>



                    </div>

                

              <?php 

                       } 

                       wp_reset_postdata();

                       } 

                       else { 

                  echo 'No post available!'; 

                }                          

            ?>

      </div>



      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">



        <img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png" alt="">

        <span class="sr-only">Previous</span>


      </a>


      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

        <img src="<?php echo get_template_directory_uri(); ?>/images/left-arrow.png" alt="">

        <span class="sr-only">Next</span>

      </a>

      <a href="<?php echo home_url();?>/stories" class="btn btn-yellow allStoriesBtn">VIEW ALL STORIES</a>

    </div>


    <div class="container-fluid countConF my-90">
        <div class="container1682 countCont d-flex justify-content-between">


<?php



// Check rows exists.

if( have_rows('counting_box') ):
    while( have_rows('counting_box') ) : the_row();
?>

            <div class="countBox">
                <div class="box-<?php echo get_row_index(); ?>">
                    <?php $icon = get_sub_field('icon'); ?>
                    <img loading="lazy" src="<?php echo $icon['url']; ?>" class="img-fluid" alt="<?php echo $icon['alt']; ?>">
                </div>
                <div class="boxCaption">
                    <h3 class="number"><?php the_sub_field('number') ?></h3>
                    <p><?php the_sub_field('blurb') ?></p>
                </div>
            </div>
<?php

    endwhile;
else :

    echo "Nothing found";

endif;

?>
          

        </div>

        <div class="container1682 countCont">
            <div class="row">
                <div class="col-12">
                    <p class="text-danger mt-2 text-right"><?=get_field('highlighted_date_text')?></p>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="container1682 newsCont">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-6">
                    <h2 class="mb3">News</h2>

        <?php 

        $args = array( 

        'post_type' => 'post' , 'posts_per_page'=>2,   

        );

        $posts = new WP_Query( $args ); 

        if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post(); ?>



                    <div class="newsBox d-flex">

                        <div class="newsDateBox d-flex flex-column">

                            <div class="iconBox">

                                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/date-icon.png" class="img-fluid" alt="">

                            </div>

                            <div class="datebox">

                                <span class="month"><?php echo get_the_date( 'M ', $posts->ID ) ?></span>

                                <span class="day"><?php echo get_the_date( 'j ', $posts->ID ) ?></span>

                            </div>

                        </div>

                        <div class="newscont">
                            <?php the_title( '<h3 class="newstite">', '</h3>', true ); ?>
                            <p><?php echo mb_strimwidth( get_the_excerpt(),0, 275,'' );?></p>
                            <a title="click to read more news" href="<?php the_permalink(); ?>" class="readMore">Read More</a>
                        </div>



                    </div>

    



            <?php endwhile; else: ?>

                <p class="alert alert-info">Sorry, no posts matched your criteria.</p>

            <?php endif; ?>



                <?php if( wp_count_posts()->publish > 2 ) : ?>

                    <a href="<?php echo home_url(); ?>/news" class="btn btnNews">MORE NEWS</a>

                <?php endif; ?>





                </div>



                <div class="col-lg-5">



                    <div class="mt-5 mt-lg-0 pt-5 pt-lg-0">

                        <h2 class="mb3">Upcoming Events</h2>

                        <div class="homeMiniCal">

                            <?php  echo do_shortcode( ' [tribe_events view="month" tribe-bar="true" featured="false" ]' ); ?>

                        </div>
                 
                    </div>
                </div>



            </div>

            <br>
            <br>
            <br>



            <hr>


            <br>
            <br>
            <br>

        </div>



    </div>







    <div class="container-fluid mb-4">

        <div class="container1682 mapToggleWrapper pb-3">
            <h2 class="text-center mb3">Locate Our Services </h2>
<?php 
  $args = array( 
  'post_type' => 'maps' , 'posts_per_page'=>-1,
  'orderby' => array( 'title' => 'ASC', 'menu_order' => 'ASC' )
   ); 
  $maps = new WP_Query( $args ); 
      if( $maps->have_posts() ):
      $mapTitleCount = 0;  
?>
<div class="btnWrapper d-flex justify-content-center flex-wrap mb-5">

<?php
      while( $maps->have_posts() ): $mapTitleCount++;
          $maps->the_post(); ?>

          <?php $mapSrc = get_field('map_embed_code'); preg_match('/src="(.+?)"/', $mapSrc, $matches); $src = $matches[1]; ?>
    <button class="mapBtn collapseBtn btn <?php if( $mapTitleCount == 1 ){echo "active"; } ?>" data-mapsrc="<?php echo $src; ?>" data-id="cont<?php echo "$mapTitleCount"; ?>"><?php the_title(); ?></button>

<?php          
       endwhile;
       wp_reset_postdata();
?>
</div>
<?php
           else : 
      echo 'No post available!'; 
  endif;                    
?>



<?php 
  $args = array( 
  'post_type' => 'maps' , 'posts_per_page'=>-1,
  'orderby' => array( 'title' => 'ASC', 'menu_order' => 'ASC' )

   ); 
  $maps = new WP_Query( $args ); 
      if( $maps->have_posts() ):
      $mapTitleCount = 0;  

      while( $maps->have_posts() ): $mapTitleCount++;
          $maps->the_post(); ?>
            <div id="cont<?php echo "$mapTitleCount"; ?>" class="contentGroup mapContent container-fluid <?php if( $mapTitleCount == 1 ){echo "active"; } else{echo ""; } ?> ">
            	<div class="row">
            		<div class="col-lg-9 order-2 order-lg-1">
            			<div class="mapIframeWRapper">
            				<?php if( $mapTitleCount == 1 ){ the_field('map_embed_code'); } ?>
            			</div>
            		</div>
            		<div class="col-lg-3 order-1 order-lg-2">

            			<!-- <h3 class="title mb-3">Locations</h3> -->
                        
                		<div class="mapAddressWrapper">
                			<?php
							if( have_rows('location') ):
							    while( have_rows('location') ) : the_row();
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
<?php          
       endwhile; wp_reset_postdata();
?>
<?php
           else : 
      echo 'No post available!'; 
  endif;                    
?>

        </div>        



    </div>




</main>


<?php get_footer(); ?>