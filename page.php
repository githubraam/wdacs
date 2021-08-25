<?php get_header(); ?>

<?php get_template_part('template-part/hero'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<main>
	<div class="container py-5 clearfix">
		<?php the_content(); ?>
		<?php the_field('content') ?>
	</div>
</main>

	

	



	<?php endwhile; else: ?>



		<p>Sorry, no posts matched your criteria.</p>



<?php endif; ?>

<?php get_footer(); ?>