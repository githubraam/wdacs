<?php

	if( have_rows('inner_section_navigator') ): ?>

	<div class="internalNav">

		<ul class="list-unstyled d-flex justify-content-center">

	<?php

	    while( have_rows('inner_section_navigator') ) : the_row();

	    $pagetitle = get_the_title();

	    $title = get_sub_field('navigator_name');

	?>



	   	<li>

			<a href="<?php the_sub_field('link'); ?>"

				class="				

				<?php

				if( $pagetitle == $title ){ echo "active "; }

				$checkHash = get_sub_field('link');

				if( substr($checkHash, 0, 1 ) === "#" )

				{echo "moveToDiv"; }

				?> ">

				<?php the_sub_field('navigator_name'); ?>					

			</a>

		</li>





	<?php

	    endwhile; wp_reset_postdata();

	?>

		</ul>

	</div>

	<?php

	else :



	endif;

?>