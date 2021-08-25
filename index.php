<?php

get_header(); ?>

<div class="heroWrapper mtHeaderGap">

    <div class="searchBarWrpr container1682">

        <?php get_search_form(); ?>

        <h1 class="heroTitle">News</h1>

        <?php dynamic_sidebar('breadcrumb'); ?>

    </div>

</div>



<main class="otherPages newsList">

	<div class="container container1400 my-5">

		<div class="row">



	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	





            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

                <figure class="article bg-lightgray">

                    <div class="articleImg">

                        <a href="<?php the_permalink(); ?>">

                            <?php if( get_the_post_thumbnail() ):

                               the_post_thumbnail('event-thumbnail');

                            else:

                            ?>

                            <img src="<?php echo get_template_directory_uri(); ?>/images/dummy-post.jpg" alt="<?php the_title(); ?>" class="img-fluid">

                            <?php endif; ?>            

                        </a>

                                                    

                        <?php

                            $post_tags = get_the_tags();                                

                            if($post_tags):

                        ?>

                        <ul class="tags list-unstyled mb-0 d-flex">

                                <li><i class="fa fa-tag" aria-hidden="true"></i></li>

                                <?php

                                    $i = 0;

                                    $tagLength = count($post_tags);

                                    foreach( $post_tags as $tag ):

                                    $i++;

                            ?>

                                <li>

                                    <a class="text-white" href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug); ?>"><?php print_r($tag->name); ?></a>

                                </li>

                                <?php if($i!==$tagLength){ echo "<li class='text-white'> | </li>"; } ?>

                                <?php endforeach; ?>

                        </ul>

                        <?php endif; ?>

                    </div>

                    <figcaption class="px-3 pb-3">

                        <h3 class="articleTitle"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo  mb_strimwidth( get_the_title(),0,46,'...' ); ?></a></h3>

                        <p class="text-blue date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php echo get_the_date( 'F j, Y' ) ?></p>

                        <p><?php echo  mb_strimwidth( get_the_excerpt(),0,113,'...' ); ?></p>

                        <a href="<?php the_permalink(); ?>"  class="readmoreLink">Read More <i class="fa fa-angle-right" aria-hidden="true"></i></a>

                    </figcaption>

                </figure>

            </div>







	<?php endwhile;
    else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>

		</div>

        <div class="row">
            <div class="col-12 text-center paginationWrapper">
                <?php echo paginate_links(); ?>
            </div>
        </div>





	</div>

</main>















<?php get_footer(); ?>