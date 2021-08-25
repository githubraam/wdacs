<?php

/*

Template Name: Gallery

 */

get_header();?>

<?php get_template_part('template-part/hero');?>

<main class="otherPages">
	<div class="container container1682 galleryPageCont d-flex flex-wrap my-5">

        <?php
        $pageId = get_field('parent_page');
        $galeryImg = get_field('gallery_upload__select_images',$pageId);
        if( $galeryImg ): ?>
            <?php foreach( $galeryImg as $image ): $galImgcount++; ?>
                <div class="galleryImg">
                    <a class="d-block" href="<?php echo esc_url($image['url']); ?>" data-lightbox="gallery">
                        <img class="img-fluid" src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" >
                    </a>
                </div>
            <?php endforeach; ?>
        <?php
        else: echo "<p>Nothing Found</p>";
    endif; ?>
		
	</div>
</main>

<?php get_template_part('template-part/video-modal');?>

<?php get_footer();?>