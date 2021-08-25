<?php

/*

Template Name: Stories

*/

get_header(); ?>


<?php get_template_part('template-part/hero'); ?>

<main class="storiesList">
	<div class="container container1400 my-5">
		<div class="row">
<?php 

    $args = array( 

    'post_type' => 'stories' , 'posts_per_page'=>-1,   

    );

    $story = new WP_Query( $args );

	if ($story->have_posts()) : while ($story->have_posts()) : $story->the_post(); ?>	
            <div class="col-12 mb-4">
                <div class="article bg-lightgray p-4">                    
                    <h3 class="articleTitle"><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <p><a href="<?php the_permalink(); ?>">Read in details</a></p>                   
                </div>
            </div>

	<?php endwhile; else: ?>
		<p>No Stories Found</p>
	<?php endif; ?>
		</div>
	</div>

</main>

<?php get_footer(); ?>