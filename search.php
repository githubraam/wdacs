<?php get_header(); ?>


<?php get_template_part('template-part/hero'); ?>



<main class="otherPages newsList">

  <div class="container container1400 my-5">



    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>





    <div class="article bg-lightgray mb-4 p-3">

      <h4 class="mb-0 articleTitle"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>

      <div class="card-body">

        <?php echo  mb_strimwidth( get_the_excerpt(),0,250,'...' ); ?>

        <a class="readmoreLink" href="<?php the_permalink();?>">Read More</a>

      </div>

    </div>



















    <?php endwhile; else: ?>



            <h4 class="bg-blue p-3 text-white">Sorry, no results found.</h4>



    <?php endif; ?>



	</div>



</main>











<?php get_footer(); ?>