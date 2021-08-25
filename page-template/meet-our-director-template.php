<?php 

/*

Template Name: Meet Our Director

*/

get_header();


?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<main class="otherPages">
	<div class="container1300 container mt-5 mb-4 py-5">
		<div class="row">
			<div class="col-12">

				<div class="clearfix">
					<?php $img = get_field('big_image'); if( $img ): ?>
					<img src="<?php echo $img['url']; ?>" class="img-fluid float-right p-md-3" alt="<?php echo $img['alt']; ?>">
					<?php endif; ?>
				
					<?php $name = get_field('name'); if( $name ): ?>
					<h2 class=" mb-0"><?php echo $name; ?></h2>
					<?php endif; ?>

					<?php $pos = get_field('position'); if( $pos ): ?>
					<p class="text-blue mb-3"><?php echo $pos; ?></p>
					<?php endif; ?>

					<?php $content = get_field('about'); if( $content ): ?>
						<?php echo $content; ?>
					<?php endif; ?>


					

				</div>

			</div>


<!-- 

			<div class="col-md-6">
				<?php $name = get_field('name'); if( $name ): ?>
				<h2 class=" mb-0"><?php echo $name; ?></h2>
				<?php endif; ?>

				<?php $pos = get_field('position'); if( $pos ): ?>
				<p class="text-blue mb-3"><?php echo $pos; ?></p>
				<?php endif; ?>

				<?php $content = get_field('about'); if( $content ): ?>
					<?php echo $content; ?>
				<?php endif; ?>

			</div>

			<div class="col-md-6">
				<?php $img = get_field('big_image'); if( $img ): ?>
				<img src="<?php echo $img['url']; ?>" class="img-fluid" alt="<?php echo $img['alt']; ?>">
				<?php endif; ?>
			</div>

 -->




		</div>

	</div>

</main>



<?php get_footer(); ?>