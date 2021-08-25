<?php get_header(); ?>
<main class="mainTopGap otherPages">
	<div class="heroWrapper" style="background-image: url('<?php echo get_template_directory_uri();?>/images/local-events.jpg');">
		<h1 class="heroTitle text-white text-center"><?php wp_title('',true,'right'); ?></h1>
	</div>

    <?php get_template_part('template-part/post-listing'); ?>

</main>
<?php get_footer(); ?>