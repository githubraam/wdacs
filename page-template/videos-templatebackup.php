<?php

/*

Template Name: Videos backup
*/

get_header(); ?>


<?php get_template_part('template-part/hero'); ?>

<main class="otherPages videoList">
	<div class="container container1400 my-5">
		<div class="row">
            <div class="col-12 text-right pb-2">
                <label class="text-blue weight600 vidCatSortLabel" >Sort by: </label>
                <?php               
                $taxonomies = get_terms( array(
                    'taxonomy' => 'video_category',
                    'hide_empty' => true
                ) );
                 
                if ( !empty($taxonomies) ) :
                    $output = '<select class="vidDopdown" id="vidCat"> <option value="0" selected >Select Category</option>';

                    $countS = 0;
                    foreach( $taxonomies as $category ) {
                       
                        if( $category->parent == 0 ) {
                           $output.= '<option value="'. esc_attr( $category->term_id ).'"';                           
                            $output.= '>'.esc_attr( $category->name );
                            $output.='</option>';
                        }
                    }
                    $output.='</select> <i class="fa fa-angle-down" aria-hidden="true"></i>';
                    echo $output;
                endif;
                ?>
                <hr class="my-3">
            </div>

	<?php
    $args = array( 
    'post_type' => 'videos' , 'posts_per_page'=>9,
    );
    $videos = new WP_Query( $args );
    if ($videos->have_posts()) : while ($videos->have_posts()) : $videos->the_post(); ?>	


            <div class="col-md-6 col-lg-4 col-sm-6 mb-4">
                <div class="article">
                    <div class="videoWrapper" >
                    <?php

                    // Load value.
                    $iframe = get_field('video_link');                    

                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];

                    // Add extra parameters to src and replcae HTML.
                    $params = array(
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);

                    $iframe = str_replace($src, $new_src, $iframe);                    

                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0"  id="iframe'. get_the_ID() .'" ';
                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                    echo $iframe;
                    ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/play-btn.png" class="playbtn img-fluid" data-videoid="<?php echo get_the_ID(); ?>" data-videotitle="<?php the_title(); ?>" >
                    </div>
                    <div class="my-3">
                        <?php
                            $post_tags = wp_get_post_terms(get_the_ID(), 'video_tags', array( 'fields' => 'all' ));
                        //$post_tags = get_the_tags();
                            if($post_tags):
                        ?>
                        <ul class="tags list-unstyled mb-2 d-flex">
                                <?php
                                    $i = 0;
                                    $tagLength = count($post_tags);
                                    foreach( $post_tags as $tag ):
                                    $i++;
                            ?>
                                <li>
                                    <a class="d-flex align-items-center" href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug); ?>"><i class="fa fa-tag mr-2" aria-hidden="true"></i> <?php print_r($tag->name); ?></a>
                                </li>
                                <?php if($i!==$tagLength){ echo "<li class='text-white'> | </li>"; } ?>
                                <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>

                        <h3 class="articleTitle" data-videoid="<?php echo get_the_ID(); ?>" data-videotitle="<?php the_title(); ?>" ><?php echo  mb_strimwidth( get_the_title(),0,55,'...' ); ?></h3>                       

                    </div>
                </div>
            </div>



	<?php endwhile; wp_reset_postdata(); else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
            
		</div>
        <div id="loadMoreHere" class="row"></div>
        <div class="row">
            <div class="col-12 text-center">
            <?php $count_posts = wp_count_posts( 'videos' )->publish;
                if($count_posts>9):
            ?>
            <button id="loadMoreVidBtn" class="btn btn-yellow">LOAD MORE</button>
            <?php endif; ?>
            </div>
        </div>


	</div>
</main>





<?php get_template_part('template-part/video-modal'); ?>

<?php get_footer(); ?>