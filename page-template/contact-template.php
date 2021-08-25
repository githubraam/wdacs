<?php 



/*

Template Name: Contact





*/

get_header();

?>





<!-- hero -->



<?php get_template_part('template-part/hero'); ?>



<!-- hero ending -->



<main class="otherPages">

	<div class="container container1200 my-5 contFormWrpr contactPageWrpr">

		

			<?php echo do_shortcode( '[contact-form-7 id="189" title="Contact Page"]' ); ?>

			<!-- <div class="col-md-4 mb-4">

				<input type="text" class="formControl" placeholder="Name">

			</div>

			<div class="col-md-4 mb-4">

				<input type="email" class="formControl" placeholder="Email">

			</div>

			<div class="col-md-4 mb-4">

				<input type="text" class="formControl" placeholder="Subject">

			</div>

			<div class="col-12 mb-4">

				<textarea class="formControl mb-0" placeholder="Message"></textarea>

			</div>

			<div class="col-12">

				<button type="submit" class="btn btn-yellow btnSubmit">SUBMIT</button>

			</div> -->





		<div class="row mt-5 pt-4 contactAddressWrpr">

			<div class="col-md-4">

				<address>

					<h3><span>Business Workforce Support Services</span></h3>

					<ul class="list-unstyled mt-4">

						<li class="d-flex mb-3">

							<i class="fa fa-map-marker" aria-hidden="true"></i> 123A Dummy Avenue, Suite 1A,<br> California, <br>458967

						</li>

						<li>

							<a href="" class="d-flex"><i class="fa fa-phone" aria-hidden="true"></i> 458 269 357 853</a>

						</li>

					</ul>

				</address>

			</div>

			<div class="col-md-4">

				<address>

					<h3><span>Community & Senior<br>Centers</span></h3>

					<ul class="list-unstyled mt-4">

						<li class="d-flex mb-3"><i class="fa fa-map-marker" aria-hidden="true"></i> 123A Dummy Avenue, Suite 1A, <br>California, <br>458967</li>

						<li>

							<a href="" class="d-flex"><i class="fa fa-phone" aria-hidden="true"></i> 458 269 357 853</a>

						</li>

					</ul>

				</address>

			</div>

			<div class="col-md-4">

				<address>

					<h3><span>Older & Dependent Adult Services</span></h3>

					<ul class="list-unstyled mt-4">

						<li class="d-flex mb-3"><i class="fa fa-map-marker" aria-hidden="true"></i> 123A Dummy Avenue, Suite 1A, <br>California,<br> 458967</li>

						<li>

							<a href="" class="d-flex"><i class="fa fa-phone" aria-hidden="true"></i> 458 269 357 853</a>

						</li>

					</ul>

				</address>

			</div>

		</div>

	</div>
</main>

	



<?php get_footer(); ?>