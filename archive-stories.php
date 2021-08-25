<?php

get_header(); ?>

<div class="heroWrapper mtHeaderGap">

    <div class="searchBarWrpr container1682">
        <?php get_search_form(); ?>

        <h1 class="heroTitle"><?php wp_title( '', true, '' ); ?></h1>

        <?php dynamic_sidebar('breadcrumb'); ?>

    </div>

</div>



<main class="otherPages storiesArchive">


    <div class="container container1682 mt-5">
        <div class="row mb-4">
            <div class="col-12">
                


            <?php
            // $post_tags = wp_get_post_terms(get_the_ID(), 'stories-tags');
            
            $post_tags = get_terms('stories-tags');
            // print_r($post_tags);
            if ($post_tags):
            ?>
            <div class="csrsCollapseWrpr">
                <div class="btnWrapper d-flex flex-wrap">
                <div class="collapseBtn tag_stories_tab active" data-tagurl="" data-id="tadid-5">ALL</div>
            <?php
            $i = 0;
            $tagLength = count($post_tags);
            foreach ($post_tags as $tag):
            $i++;
            ?>


            <div class="collapseBtn tag_stories_tab" data-tagurl="<?php print_r($tag->slug);?>" data-id="tadid-5"><?php print_r(strtoupper($tag->name));?></div>
            
            <?php endforeach;?>
            </div>
        </div>
            
            <?php endif; ?>


            </div>
        </div>
    </div>


    <div class="container container1682 my-5 column3Box">


		<div class="row related_tag_stories">
        <?php /*if (have_posts()) : while (have_posts()) : the_post(); ?> 

			<div class="col-md-6 col-lg-4 px-lg-2 mb-5">
				<div class="box borderBottomRed">

                <?php
                $group = get_field('featured_image_or_video');

                if( $group ):

                    $img_or_vid = $group['image__video'];
                    
                if( $img_or_vid == 'Image' ):

                    echo wp_get_attachment_image( $group['image'], array("535","349"), "", array( "class" => "img-fluid" ) );
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

                    <img src="<?php echo home_url(); ?>/wp-content/uploads/2021/01/stories-thumb.jpg" alt="<?php the_title(); ?>" class="img-fluid">

                <?php endif; ?>



					<?php the_title( '<h3 class="title">', '</h3>', true ); ?>

                    <?php echo  mb_strimwidth( get_the_excerpt(),0,200,'...' ); ?>

                    <p><a class="readmoreLinkNorm" href="<?php the_permalink(); ?>" >Read Full Story</a></p>

				</div>
                
			</div>


        <?php endwhile;
        else: ?>

        <p>Sorry, no posts matched your criteria.</p>

        <?php endif; */?>

		</div>

        <div class="row">
            <div class="col-12 text-center">
                   <img id="loader_image_tag" src="<?=get_template_directory_uri().'/images/Pulse-160px.gif';?>" width="60" style="display:none;">
                <button id="loadMoreVidBtnstory" class="btn btn-yellow">LOAD MORE</button>
            </div>
        </div>
    </div>

</main>




<?php get_footer(); ?>