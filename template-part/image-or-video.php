<?php
$img_or_vid = get_sub_field('image__video');
    
if( $img_or_vid == 'Image' ): ?>
<img src="<?php echo get_sub_field('image')['url']; ?>" class="img-fluid" alt="<?php echo get_sub_field('image')['alt']; ?>" loading="lazy" >
<?php else: ?>

<div class="iframeClick">
    <img src="<?php echo get_sub_field('video_thumbnail')['url']; ?>" class="img-fluid" alt="<?php echo get_sub_field('video_thumbnail')['alt']; ?>" loading="lazy" >
    <button class="btn playbtn"
    data-src="
    <?php
        $vidLink = get_sub_field('video');
        preg_match('/src="(.+?)"/', $vidLink, $matches);
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
    ?>"
    >
        <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/12/play-btn.png" loading="lazy" class="img-fluid" alt=""><span class="sr-only">Click to play video</span>
    </button>
</div>

<div class="iframeWrpr d-none">
    <p class="alert-gray text-center">Loading...</p>
    <iframe frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
</div>

<?php endif; ?>