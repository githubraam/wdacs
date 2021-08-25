<?php 

/*

Template Name: About

*/

get_header();

?>

<!-- hero -->

<?php get_template_part('template-part/hero'); ?>

<!-- hero ending -->

<?php
$section1=get_field('section_1');
$section2=get_field('section_2');
$videolink=get_field('video_link');
// print_r($section1);
?>
<main class="otherPages">
	<section class="container1300 container py-5 mb-4 misVisCont wow slideInRight">
		<div class="row">
			<div class="col-md-12 text-center mb-4 bg-blue text-white py-4">
				<h2><?=$section1['heading']; ?></h2>
				<p><?=$section1['description']; ?></p>
			</div>
			<div class="col-12">
				<hr>
			</div>
			<div class="col-md-12 bg-blue text-center text-white py-4">
				<h2><?=$section2['heading']; ?></h2>
				<p><?=$section2['description']; ?></p>
			</div>
		</div>
	</section>

 

	<section class="wow fadeIn fullWidthVideo" id="videoBg" data-link="<?php
                        $vidLink = $critical['right_side']['video'];
                        preg_match('/src="(.+?)"/', $videolink, $matches);
                        $src = $matches[1];
                        $params = array(
                        
                            'controls'  => 1,                        
                            'hd'        => 1,                        
                            'autohide'  => 1,                        
                            'loop'      => 1,
                            'autoplay'  => 1
                        
                        );
                        
                        $onlySrc = add_query_arg($params, $src);                        
                        echo $onlySrc;                        
                    ?>" >
		<iframe class="wow fadeIn" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" src="" frameborder="0"></iframe>
	</section>
	
	<br>
	<br>


<!-- 


	<section id="a2" class="parallax carousel slide">
	  <ol class="carousel-indicators">
	    <li data-target="#a2" data-slide-to="0" class="active"></li>
	    <li data-target="#a2" data-slide-to="1" class=""></li>
	    <li data-target="#a2" data-slide-to="2"></li>
	  </ol>

	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg.jpg" alt="" class="parallaxImg" >
	    </div>
	    <div class="carousel-item">
	      <img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg3.jpg" alt="" class="parallaxImg" >
	    </div>
	    <div class="carousel-item">
	      <img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg2.jpg" alt="" class="parallaxImg">
	    </div>
	  </div>
		<div class="content text-center">
			<h2 class="text-white">This is content for slider mockup, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, maxime. Culpa quidem corrupti rerum.</h2>
		</div>
	</section>

	<section class="parallax-window container-fluid parallax para1" data-view="1" id="sec1">
		<img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg.jpg" class="parallaxImg" alt="">
		<div class="content text-center" id="con1">
			<h2 class="text-white">As the County takes on the challenge of meeting the needs of its diverse communities, WDACS is forging a unique path.</h2>
		</div>
	</section>
	<section class="parallax-window container-fluid parallax para2" data-view="2" id="sec2">
		<img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg2.jpg" class="parallaxImg" alt="">
			
		<div class="content text-center" id="con2">
			<h2 class="text-white">With over 10.1 million people and 244,000 businesses, the community we represent is one of the most diverse populations in the world, with equally immense and varied needs.</h2>
		</div>
	</section>
	<section class="parallax-window container-fluid parallax para3" data-view="3" id="sec3">
		<img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg3.jpg" class="parallaxImg" alt="" >
		<div class="content text-center" id="con3">
			<h2 class="text-white">We make a tangible difference in people’s lives. We enable people to connect. We encourage people to uplift. And we empower our most underserved to get on their feet and transform their own lives.</h2>
		</div>
	</section>
	<section class="parallax-window container-fluid parallax para4" data-view="4" id="sec4">
		<img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg4.jpg" class="parallaxImg" alt="">	
		<div class="content text-center" id="con4">
			<h2 class="text-white">We actively roll up our sleeves and work on the frontlines with local organizations to provide services at a grassroots level. Through teamwork with our community, partners and County departments, we are an unstoppable force for social and economic empowerment.</h2>
		</div>
	</section>
	<section class="parallax-window container-fluid parallax para5" data-view="5" id="sec5" >
		<img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg5.jpg" class="parallaxImg" alt="">
		<div class="content text-center" id="con5">
			<h2 class="text-white">We hold ourselves accountable to measurable social impact for those we serve with transparent data-driven and results oriented goals. We embrace innovation and invest in technological solutions to build a government for the future of Los Angeles.</h2>
		</div>
	</section>
	<section class="parallax-window container-fluid parallax para6" data-view="6" id="sec6">
		<img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg6.jpg" class="parallaxImg" alt="">
		<div class="content text-center" id="con6">
			<h2 class="text-white">We collaborate towards meaningful, transformative change taking place every single day in our communities…in both big and small ways. And we admire the awe-inspiring strength of the people we serve.</h2>
		</div>
	</section>
	<section class="parallax-window container-fluid parallax para7" data-view="7" id="sec7" >
		<img src="<?php echo get_template_directory_uri(); ?>/images/about-us-bg7.jpg" class="parallaxImg" alt="">
		<div class="content text-center" id="con7">
			<h2 class="text-white">Together, let us forge a path ahead for all of LA County.</h2>
		</div>
	</section>


 -->



</main>



<!-- <script src="https://player.vimeo.com/api/player.js"></script> -->
<?php get_footer(); ?>

<script type="text/javascript">
	$(document).ready(function(){



$(window).scroll(function() {
    if( $("#videoBg").isInViewport() ){
            var link = $("#videoBg").data("link");
            console.log(link);
            $("#videoBg>iframe").attr("src",link);
            $(window).unbind("scroll");
        }
});

/*
    var thrivePlayer1 = thriveLoadVideo('videoBg',486614519);
    $(window).scroll(function(){ thrivePlayPause('videoBg',thrivePlayer1); });*/





	});
</script>

