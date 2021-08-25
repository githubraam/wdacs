<?php 

/*

Template Name: Covid

*/

get_header();
?>
<main class="covidPage mtHeaderGap">
	<div class="homebanner covideBanner container-fluid" style="background-image: url(<?php echo get_field('hero')['background_image']; ?>);">

        <div class="searchBarWrpr container1682">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
			    <div class="formWrpr">
			        <input type="text" name="s" class="searchBox" placeholder="I am looking for..">
			        <button class="btn btn-warning"><i class="fa fa-search" aria-hidden="true"></i> <span>SEARCH NOW</span></button>
			    </div>
			</form>
        </div>
<br>
<br>
        <div class="container1682 mt-5">
            <div class="caption">
                <?php $covidHero = get_field('hero'); ?>
                <?php if ( $covidHero['big_title'] ): ?>
                    <h1><?php echo $covidHero['big_title']; ?></h1>
                <?php endif; ?>
                <?php if ( $covidHero['short_description'] ): ?>
                    <p><?php echo $covidHero['short_description']; ?></p>
                <?php endif; ?>

                <?php 
                $covidHeroLink = $covidHero['button_and_link'];
                if( $covidHeroLink ): 
                    $link_url = $covidHeroLink['url'];
                    $link_title = $covidHeroLink['title'];
                    $link_target = $covidHeroLink['target'] ? $covidHeroLink['target'] : '_self';
                    ?>
                    <a class="btn btn-yellow d-inline-block" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>

            </div>

        </div>

    </div>





    <div class="container1682 container my-5">
    	<div class="row">
    		<div class="col-md-6">
                <?php
                $cVorI = get_field('covid_19_updates')['left_side'];
                $img_or_vid = $cVorI['image__video'];
                    
                if( $img_or_vid == 'Image' ): ?>
                <img src="<?php echo $cVorI['image']['url']; ?>" class="img-fluid" alt="<?php echo $cVorI['image']['alt']; ?>">
                <?php else: ?>

                <div class="iframeClick">
                    <img src="<?php echo $cVorI['video_thumbnail']['url']; ?>" class="img-fluid" alt="<?php echo $cVorI['video_thumbnail']['alt']; ?>" >
                    <button class="btn playbtn"
                    data-src="
                    <?php
                        $vidLink = $cVorI['video'];
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
                        <img src="<?php echo get_template_directory_uri(); ?>/images/youtube-play-btn.png" class="img-fluid">
                    </button>
                </div>

                <div class="iframeWrpr d-none">
                    <p class="alert-gray text-center">Loading...</p>
                    <iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>

                <?php endif; ?>


    		</div>

    		<div class="col-md-6">
                <?php if ( get_field('covid19_title') ): ?>
                    <h2 class="mainTitle"><?php the_field('covid19_title'); ?></h2>
                <?php endif; ?>
    			
<!-- 
<?php
if( have_rows('covid_19_updates') ):
    while( have_rows('covid_19_updates') ) : the_row();
        if( have_rows('right_side') ): ?>
            <ul class="list-unstyled covidLatesNewsList mt-3">
            <?php while( have_rows('right_side') ) : the_row(); ?>

                <li class="mb-2"><a href="<?php $linkorPdf = get_sub_field('link_or_pdf'); if( $linkorPdf == "Link" ) { the_sub_field('link'); } else{ the_sub_field('pdf'); } ?>" target="_blank" ><span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php the_sub_field('date'); ?></span> <span><?php the_sub_field('short_description'); ?></span> </a></li>

            <?php endwhile; ?>
            </ul>
        <?php
        endif;
    endwhile;
    wp_reset_postdata();
endif;
?>

 -->



<?php
if( have_rows('covid_19_updates') ):
    while( have_rows('covid_19_updates') ) : the_row();
        if( have_rows('right_side') ): ?>
            <ul class="list-unstyled covidLatesNewsList mt-3">
            <?php while( have_rows('right_side') ) : the_row(); ?>

                <li class="mb-2">
                    <?php $linkorPdf = get_sub_field('link_or_pdf'); if( $linkorPdf == "Link" ) {
                        
                        $link = get_sub_field('link');
                        
                            $link_url = $link['url'];
                            //$link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';

                        ?>

                        <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php the_sub_field('date'); ?></span>
                            <span><?php the_sub_field('short_description'); ?></span>
                        </a>
                        

                       <!--  <a href="<?php the_sub_field('pdf'); ?>" target="_blank" ><span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php the_sub_field('date'); ?></span> <span><?php the_sub_field('short_description'); ?></span> </a> -->


                    <?php } else{
                        ?>
                        <a href="<?php the_sub_field('pdf'); ?>" target="_blank" ><span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php the_sub_field('date'); ?></span> <span><?php the_sub_field('short_description'); ?></span> </a>
                    <?php } ?>
                    
                </li>

            <?php endwhile; ?>
            </ul>
        <?php
        endif;
    endwhile;
    wp_reset_postdata();
endif;
?>





    		</div>

    	</div>

    </div>



    <div class="container1682 container text-center">

        <?php $servResource = get_field('service_and_resource'); ?>
        <?php if ( $servResource['title'] ): ?>
            <h2 class="mainTitle"><?php echo $servResource['title']; ?></h2>
        <?php endif ?>

        <?php if ( $servResource['blurb'] ): ?>
            <p><?php echo $servResource['blurb']; ?></p>
        <?php endif ?>

        <?php 
        if( have_rows('service_tabs_accord') ): ?>
            <div class="covidToggleBtnWrapper d-flex flex-wrap flex-md-nowrap justify-content-center my-5">
            <?php while( have_rows('service_tabs_accord') ) : the_row(); $btnC = get_row_index(); ?>

                <button class="btn collapseBtn <?php if( $btnC == 1 ){ echo "active"; } ?>" data-id="covidserv-<?php echo $btnC; ?>"><?php the_sub_field('tab_name'); ?></button>

            <?php endwhile; ?>
            </div>
        <?php
        endif;
        ?>


    </div>



    <div class="container-fluid mt-4 contentGroup" id="covidserv-1">

<?php
$tab1 = get_field('tab_1_data');

$tab1MapData = $tab1['map_data'];
?>
        <div class="container container1682 text-left mb-5">

            <?php if ( $tab1MapData['title'] ): ?>
                <h3><?php echo $tab1MapData['title']; ?></h3>
            <?php endif ?>

            <?php if ( $tab1MapData['blurb'] ): ?>
                <?php echo $tab1MapData['blurb']; ?>
            <?php endif ?>

        </div>





<!-- Map and it's content

        <div class="container1682 covidmapInfoWrpr container d-flex ">

            <div class="covidMap">

                <a target="_blank" href="https://www.google.com/maps/d/embed?mid=1paBMfsRqsS4r9Px4xiOGYCfxA4-J9y2E&ll=34.03076789104819%2C-118.13568714999201&z=9"><img src="<?php echo get_template_directory_uri(); ?>/images/covidmap.jpg" class="img-fluid"></a>

            </div>

            <div class="rightInfo">

                <?php if ( $tab1MapData['on_map_data1'] ): ?>
                <div class="d-flex mb-4">
                    <div class="icon"><i class="fa fa-map" aria-hidden="true"></i></div>
                    <div><?php echo $tab1MapData['on_map_data1']; ?></div>
                </div>
                <?php endif; ?>

                <?php if ( $tab1MapData['on_map_data2'] ): ?>
                <div class="d-flex mb-4">
                    <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <div><?php echo $tab1MapData['on_map_data2']; ?></div>
                </div>
                <?php endif; ?>


                <?php if ( $tab1MapData['on_map_data3'] ): ?>
                <div class="d-flex">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div><?php echo $tab1MapData['on_map_data3']; ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>

 -->



        <div class="container1682 container my-5 ">

            <?php $tab1afterMap = $tab1['after_map_-_blurb']; ?>
            <?php if ($tab1afterMap): 
                echo $tab1afterMap;
            endif ?>
 
        </div>

        <div class="container1682 container mb-5">

            <div class="row">
<?php $tab1afterMapdbox = $tab1['district_box']; ?>

<?php
if( have_rows('tab_1_data') ):

    while( have_rows('tab_1_data') ) : the_row();
        if( have_rows('district_box') ): ?>

            
            <?php
            while( have_rows('district_box') ) : the_row(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="districtWrapper bg-lightgray">

                    <div class="heading bg-blue text-white text-center"><h4 class="title"><?php the_sub_field('box_title'); ?></h4></div>

                    <div class="districtContent">
                    <?php if( have_rows('list_points') ): ?>
                        <ul class="list-unstyled">
                            <?php while( have_rows('list_points') ) : the_row(); ?>

                            <li class="district"><span><?php the_sub_field('text'); ?></span>

                                <ul class="list-unstyled lang d-flex">

                                    <li>
                                        <a href="<?php the_sub_field('english_pdf'); ?>">English</a>
                                    </li>

                                    <li class="sep">|</li>

                                    <li>
                                        <a href="<?php the_sub_field('spanish_pdf'); ?>">Spanish</a>
                                    </li>
                                    <li class="sep">|</li>

                                    <li>
                                        <a href="<?php the_sub_field('chinese_pdf'); ?>">Chinese</a>
                                    </li>

                                </ul>

                            </li>
                            <?php endwhile; ?>

                        </ul>
                    <?php endif; ?>

                    </div>

                </div>
            </div>
            <?php
            endwhile;
            ?>
<?php
        endif;
    endwhile;
    wp_reset_postdata();
endif;
?>
            </div>

        </div>

        <?php echo $tab1['great_plates']; ?>

<!--
        <div class="container1682 container mb-5 mt-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>Great Plates Delivered</h3>
                    <p class="mb-3">WDACS is offering a first-in-the-nation meal delivery service in LA County to assist those in need of home-delivered meals and to help get our restaurant, hospitality and transportation community back to work.</p>
                    <p>Qualifying older adults can now enroll online for three free home delivered meals a day from local participating restaurants.</p>
                    <div class="gpBtnGroup">
                        <a target="_blank" href="https://lafound.wdacs.lacounty.gov/great-plates-program/participant-enrollment" class="btn btn-yellow">APPLY ONLINE HERE</a>
                        <a target="_blank" href="https://lafound.wdacs.lacounty.gov/great-plates-program/participant-enrollment/espanol" class="btn btn-primary">Aplique Aquí</a>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <figure>
                                <a href="https://vimeo.com/428161503" target="_blank">
                                    <img src="http://demoservers.net/pm/wdacs/wp-content/uploads/2020/11/gplenglish.png" class="img-fluid">
                                </a>
                                <figcaption>
                                    <p><a class="linkInherit" target="_blank" href="https://vimeo.com/428161503">Great Plates PSA English</a></p>
                                </figcaption>
                            </figure>
                            
                        </div>
                        <div class="col-md-6">
                            <figure>
                                <a href="https://vimeo.com/428161621" target="_blank">
                                    <img src="http://demoservers.net/pm/wdacs/wp-content/uploads/2020/11/gp-spanish.png" class="img-fluid">
                                </a>

                                <figcaption>
                                    <p><a class="linkInherit" target="_blank" href="https://vimeo.com/428161621">Great Plates PSA Spanish</a> from <a class="grayUnderLine" href="https://vimeo.com/lacountynewsroom">Los Angeles County Newsroom</a> on <a class="linkInherit" href="https://vimeo.com">Vimeo</a>.</p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->
        <div class="container1682 container">

            <div class="row align-items-center">

                <div class="col-md-6">
                    <?php $critical = $tab1['critical_delivery_serice']; echo $critical['left_content']; ?>

                    <div class="row">
                        <div class="col-12 mt-3 mb-5 factBtnWrapper d-flex">
                            <?php 
                            if( have_rows('tab_1_data') ):
                                while( have_rows('tab_1_data') ) : the_row();
                                    if( have_rows('fact_sheet') ):
                                        while( have_rows('fact_sheet') ) : the_row();
                                            ?>
                                            <a href="<?php the_sub_field('sheet_attach'); ?>" target="_blank" class="btn btn-primary"><?php the_sub_field('sheet_name'); ?></a>
                                            <?php
                                        endwhile;
                                    endif;
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                <?php
                $img_or_vid = $critical['right_side']['image__video'];
                    
                if( $img_or_vid == 'Image' ): ?>
                <img src="<?php echo $critical['right_side']['image']['url']; ?>" class="img-fluid" alt="<?php echo $critical['right_side']['image']['alt']; ?>">
                <?php else: ?>

                <div class="iframeClick">
                    <img src="<?php echo $critical['right_side']['video_thumbnail']['url']; ?>" class="img-fluid" alt="<?php echo $critical['right_side']['video_thumbnail']['alt']; ?>" >
                    <button class="btn playbtn"
                    data-src="
                    <?php
                        $vidLink = $critical['right_side']['video'];
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
                        <img src="<?php echo get_template_directory_uri(); ?>/images/youtube-play-btn.png" class="img-fluid">
                    </button>
                </div>

                <div class="iframeWrpr d-none">
                    <p class="alert-gray text-center">Loading...</p>
                    <iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>

                <?php endif; ?>



                </div>

            </div>

            <!-- fact box was here -->


            <div class="row">

                <?php echo $tab1['after_factsheetdata']; ?>

            </div>



            <div class="row">
                <div class="col-6"></div>

                <div class="col-6 my-5">
                <?php 
                $link = $tab1['cta'];
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-yellow covidLearnMoreBtn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                </div>

            </div>

        </div>

    </div>



    <div class="container-fluid mt-4 contentGroup d-none" id="covidserv-2">

        <?php the_field('tab_2_data'); ?>

    </div>



    <div class="container-fluid mt-4 contentGroup p-0 d-none" id="covidserv-3">

        <?php $tab3Data = get_field('tab_3_data'); echo $tab3Data['content']; ?>


<?php if( $tab3Data['boxes_for_card'] ): ?>
        <div class="container1682 container my-5">
            <div class="row">

    <?php
    if( have_rows('tab_3_data') ):
        while( have_rows('tab_3_data') ) : the_row();
            if( have_rows('boxes_for_card') ):
                while( have_rows('boxes_for_card') ) : the_row();
    ?>
                <div class="col-md-4">
                    <div class="districtWrapper bg-lightgray">
                        <div class="heading bg-blue text-white text-center"><h4 class="title"><?php the_sub_field('box_name'); ?></h4></div>

                        <div class="districtContent">
                            <ul class="list-unstyled">
                                <li class="district"><span><a class="linkInherit" target="_blank" href="<?php the_sub_field('english_file'); ?>">English</a></span>
                                </li>
                                <li class="district"><span><a class="linkInherit" target="_blank" href="<?php the_sub_field('traditional_chinese_file'); ?>">Traditional Chinese</a></span>
                                </li>
                                <li class="district"><span><a class="linkInherit" target="_blank" href="<?php the_sub_field('simplified_chinese_file'); ?>">Simplified Chinese</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

    <?php
                endwhile;
            endif;
        endwhile;
    endif;
    ?>
            </div>

        </div>
<?php endif; ?>

        <div class="container-fluid pt-4">
            <div class="container container1682 py-5">
                <?php echo $tab3Data['dispute_resolution_services']; ?>
            </div>

        </div>

    </div>



    <div class="container-fluid mt-4 contentGroup p-0 d-none" id="covidserv-4">

        <div class="container container1682">
            <?php the_field('tab_4_data'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>