<div class="heroWrapper mtHeaderGap">

	<div class="searchBarWrpr container1682">

		<?php get_search_form(); ?>

		<h1 class="heroTitle">

			<?php 

				if (is_search()): echo "Search";

				else: the_title(); 

			endif; ?>				

		</h1>

		<?php dynamic_sidebar('breadcrumb'); ?>

	</div>

</div>