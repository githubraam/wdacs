<?php get_header(); ?>

<?php get_template_part('template-part/hero'); ?>

<main class="otherPages postDetails">
	<div class="container container1200 my-5">
		<div class="row">
			<div class="col-12 content">

				<?php //the_title( '<h2 class="text-center">', '</h2>', true ); ?>
				<?php the_post_thumbnail( 'full',  ['class' => 'img-fluid'] ); the_content(); ?>
			</div>
		</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php endwhile; else: ?>
		<p class="alert alert-warning">Sorry, no posts matched your criteria.</p>
<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>