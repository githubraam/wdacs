<?php 

/*

Template Name: Meet Executive Team



*/



get_header();



?>



<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->



<main class="otherPages">



	<div class="container1200 container mt-5 mb-4 py-5">

		<div class="row">



<?php



if( have_rows('team') ):

    while( have_rows('team') ) : the_row();
    $count = get_row_index();

?>

			<div class="col-sm-6 col-lg-4">

				<?php $haveLink = get_sub_field('page_link');?>

				<?php if( $haveLink ): ?>
				<a class="teamWrapper <?php if( $count%3 == false ) echo " third"; ?> " href=" <?php if( $haveLink ){ echo $haveLink; } else{ echo "#"; } ?> ">
				<?php else: ?>
					<div class="teamWrapper <?php if( $count%3 == false ) echo " third"; ?> " >
				<?php endif; ?>

				

					<figure>
						<?php $profileImg = get_sub_field('team_image'); ?>
						<img loading="lazy" src="<?php echo $profileImg['url']; ?>" alt="<?php echo $profileImg['alt']; ?>" class="img-fluid">
						<figcaption class="text-center">
							<h4 class="mb-0 text-blue title"><?php the_sub_field('name'); ?></h4>
							<h4 class="mb-2 text-dark title2"><?php the_sub_field('title'); ?></h4>
							<p><?php the_sub_field('designation'); ?></p>
						</figcaption>
					</figure>
					<?php if( get_sub_field('hover_caption') ): ?>
					<div class="hoverCaption"><?php echo get_sub_field('hover_caption'); ?></div>
					<?php endif; ?>

				<?php if( $haveLink ): ?>
				</a>
				<?php else: ?>
				</div>
				<?php endif; ?>



				<?php //if( $haveLink ){  echo "</a>"; } else{"</div>";} ?>

				

			</div>

<?php

    endwhile;

else :

endif;

?>

<!-- 

			<div class="col-sm-6 col-lg-4">

				<a href="<?php echo home_url(); ?>/about-us/meet-our-director/" class="teamWrapper">

					<figure>

						<img src="<?php echo get_template_directory_uri(); ?>/images/otto.jpg" class="img-fluid">

						<figcaption class="text-center">

							<h4 class="mb-0 text-blue title">Otto Solorzano</h4>

							<p>Acting Director</p>

						</figcaption>

					</figure>

					<div class="hoverCaption">Otto Solórzano has served as Acting Director of Los Angeles County Department of Workforce Development, Aging and Community Services (WDACS) since February 2019. In this capacity, he leads efforts to achieve the Department’s strategic priorities while overseeing all departmental programs and operations, including Adult Protective Services, the Area Agency on Aging, Human Relations, and the America’s Job Centers (AJCCs). Prior to serving as Acting Director, Otto served as the Chief Deputy Director of WDACS since 2006.</div>

				</a>

			</div>

			<div class="col-sm-6 col-lg-4">

				<div class="teamWrapper">

					<figure>

						<img src="<?php echo get_template_directory_uri(); ?>/images/paul.jpg" class="img-fluid">

						<figcaption class="text-center">

							<h4 class="mb-0 text-blue title">Paul Goldman, AD</h4>

							<p>Administrative Services & Contracts</p>

						</figcaption>

					</figure>

					<div class="hoverCaption">Lorem, ipsum dolor sit, amet consectetur adipisicing elit. Quisquam sit, perspiciatis vitae quo rerum. Molestiae quia autem voluptatibus, quo provident et, culpa incidunt, eveniet suscipit veritatis a molestias, perferendis soluta.</div>

				</div>

			</div>

			<div class="col-sm-6 col-lg-4">

				<div class="teamWrapper third">

					<figure>

						<img src="<?php echo get_template_directory_uri(); ?>/images/lorenza.jpg" class="img-fluid">

						<figcaption class="text-center">

							<h4 class="mb-0 text-blue title">Lorenza Sanchez, AD</h4>

							<p>Aging & Adult Services</p>

						</figcaption>

					</figure>

					<div class="hoverCaption">Lorem ipsum dolor sit amet consectetur adipisicing, elit. Alias sapiente, veniam aperiam numquam, dicta eum doloribus cupiditate fuga nisi maiores nihil modi aut magni obcaecati, molestias ut officia ipsum. Ut.</div>

				</div>

			</div>

			<div class="col-sm-6 col-lg-4">

				<div class="teamWrapper">

					<figure>

						<img src="<?php echo get_template_directory_uri(); ?>/images/robin.jpg" class="img-fluid">

						<figcaption class="text-center">

							<h4 class="mb-0 text-blue title">Robin Toma, AD</h4>

							<p>Human Relations</p>

						</figcaption>

					</figure>

				</div>

			</div>

			<div class="col-sm-6 col-lg-4">

				<div class="teamWrapper">

					<figure>

						<img src="<?php echo get_template_directory_uri(); ?>/images/jose.jpg" class="img-fluid">

						<figcaption class="text-center">

							<h4 class="mb-0 text-blue title">Jose Perez, AD</h4>

							<p>Workforce Development</p>

						</figcaption>

					</figure>

				</div>

			</div>

 -->



		</div>

	</div>

</main>



<?php get_footer(); ?>