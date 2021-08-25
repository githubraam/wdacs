<?php

/*

Template Name: Gallery backup

 */

get_header();?>

<?php get_template_part('template-part/hero');?>

<main class="otherPages videoList">

    <div class="container container1400 my-5 galleryPageWrapper">
        <?php 
        $images = get_field('images');
        $imgCount=1;
        $loop_time=1;
        if( $images ): 

            foreach( $images as $image ):  

                if($loop_time==1 && $imgCount<=7)
                {
                    $imgCount++;
                    ?>
                }
                ?>

                <a href="#" class="imageBox d-block">
                    <!-- show 7 item -->
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                </a>
                <a href="#" class="imageBox d-block">
                    <!-- show 6 item -->
                     <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>

</main>

<?php get_template_part('template-part/video-modal');?>

<?php get_footer();?>