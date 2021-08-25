<?php get_header(); ?>

<div class="container-fluid notFound">
	<div class="container textPrimary text-center my-5 py-5 errorPage">
		<br>
		<br>
		<h2 class="title mt-5 pt-5">Oops!
				<span class="mt-4">404 - PAGE NOT FOUND</span>
		</h2>
		<p class="mt-4 mb-4 text-dark">The page you are looking  for might  have been removed,<br>had it's name changed or is temporarily unavailable.</p>
		<a class="btn btnPrimary px-5 py-2" href="<?php echo home_url(); ?>">GO TO HOMEPAGE</a>
	</div>
</div>

<?php get_footer(); ?>