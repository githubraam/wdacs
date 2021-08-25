<?php $footer = get_field('footer', 'option'); ?>
<div class="d-flex w-100 socialWrpapper">
    <div class="socialBox social1">
        <i class="fa fa-twitter featureIcon" aria-hidden="true"></i>
        <?php echo do_shortcode('[fts_twitter twitter_name=TestingWeb017 tweets_count=1 cover_photo=no stats_bar=no show_retweets=no show_replies=no]'); ?>
    </div>
    <div class="socialBox social2">
        <i class="fa fa-facebook featureIcon" aria-hidden="true"></i>
        <?php echo do_shortcode('[fts_facebook type=page id=1982447922035933 access_token=EAAP9hArvboQBAJvjRzxxd5l9lqD9UTBQEkZCvZA9MmZAAwSSFK9ZCW5aPXbMKrN5SSsWhgVQK0MT97b1cOFjz0d2KyJdffMzozKvkvlzlHnwdiadxZAxrlU1KEHN06DXcZAlzyFLhv9UdNSQ5fWZCWmxZBqZCyRXdZBUFkyFlyvkzOpJtnyLnNhukngZBnJOjZBNl34ZD posts=1 description=yes posts_displayed=page_only]'); ?>
    </div>
    <div class="socialBox social3">
        <i class="fa fa-vimeo featureIcon" aria-hidden="true"></i>
        <div class="socialVimeoWrapper">
            <div style="padding:56.25% 0 0 0;position:relative;">
                <?php 
                $iframe = $footer['vimeo_video_feed_link'];
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];
                $params = array(
                    'controls'  => 1,
                    'hd'        => 1,
                    'autohide'  => 1,
                    'title'     => 0,
                    'byline'    => 0,
                    'portrait'  => 0,
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);
                $attributes = 'frameborder="0" allow="autoplay; fullscreen" style="position:absolute;top:0;left:0;width:100%;height:100%;"';
                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                echo $iframe;
                ?>
            </div>
            <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
    </div>
    <div class="socialBox social4">
        <i class="fa fa-instagram featureIcon" aria-hidden="true"></i>
        <?php echo do_shortcode( '[fts_instagram instagram_id=17841445382072748 access_token=IGQVJWLU1TaDhNdWF2S2xuR2lDOEtNck1nd1k4YTF6bTRpSDJkQUhmSG5lNUJLYkpwdWNxSjhyTkdCSnlfLVN4MnlYbEdKbC0yOEViNHlId2pVaUhWMWtfbXR0V2cwdnh1NG1QTXVB pics_count=6 type=basic super_gallery=yes columns=3 force_columns=yes space_between_photos=5px icon_size=45px hide_date_likes_comments=yes]' ); ?>
    </div>
</div>
<!-- 
    <div class="container-fluid px-0 mb-4">
    
        <img src="<?php echo get_template_directory_uri(); ?>/images/home-social-embed.jpg" class="img-fluid">
    
    
    
    </div> -->

<div class="container-fluid bg-lightgray" id="contact-us">
    <div class="container py-90">
        <?php echo $footer['form_blurb']; ?>
        <div class="contFormWrpr mt-4">
            <?php echo do_shortcode( '[contact-form-7 id="97" title="All page contact"]' ); ?>
        </div>
    </div>
</div>
<footer class="footer container-fluid bg-lightgray">
    <div class="container1682">
        <div class="row">
            <div class="col-lg-4 logoAndAddress">
                <a href="<?php echo home_url(); ?>" class="footerLogo">
                <img src="<?php echo $footer['footer_logo']['url']; ?>" class="img-fluid" alt="<?php echo $footer['footer_logo']['alt']; ?>">
                </a>
                <address>
                    <?php dynamic_sidebar('footer-1'); ?>
                </address>
            </div>
            <div class="col-lg-8">
                <div class="footMenuWrapper d-flex">
                    <div class="">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                    <div class="programIniMenu">
                        <?php dynamic_sidebar('footer-3a'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center copyRight">
                <?php dynamic_sidebar('copyright'); ?>
            </div>
        </div>
    </div>
</footer>
<button class="toTopBtn" id="btp" type="button"><i class="fa fa-angle-up" aria-hidden="true"></i><span class="sr-only">Goto top</span></button>
<div id="test" class="d-none">
    <?php
        wp_nav_menu(
        
            array(
        
                'theme_location' => 'mob-menu',
        
                'container' => '',
        
                'menu_class' => 'list-unstyled',
        
                'menu_id' => 'mobNav',
        
            )
        
        );
        
        ?>
</div>
<?php wp_footer(); ?>
<style>
    #player,
    .player{
    height: 100% !important;
    }
    .player{
    position: static !important;
    }
</style>
</body>
</html>
