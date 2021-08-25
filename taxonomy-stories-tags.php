<?php

get_header(); ?>

<div class="heroWrapper mtHeaderGap">

    <div class="searchBarWrpr container1682">
        <?php get_search_form(); ?>

        <h1 class="heroTitle"><?php wp_title( '', true, '' ); ?></h1>

        <?php dynamic_sidebar('breadcrumb'); ?>

    </div>

</div>



<main class="otherPages newsList">
<?php

$tag = get_queried_object();
?>
    <input type="hidden" id="tag_page_name" value="<?=$tag->slug?>">
    <div class="container container1682 my-5 column3Box">


		<div class="row related_tag_stories">

		</div>

        <div class="row">
            <div class="col-12 text-center">
                   <img id="loader_image_tag" src="<?=get_template_directory_uri().'/images/Pulse-160px.gif';?>" width="60" style="display:none;">
                <button id="loadMoreVidBtnstory" class="btn btn-yellow">LOAD MORE</button>
            </div>
        </div>
    </div>

</main>




<?php get_footer(); ?>