<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- <title>Welcome to WDACS</title> -->
        <?php wp_head(); ?>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body <?php body_class(); ?>>
        <header class="header">
            <div class="topInfo container-fluid">
                <ul class="list-unstyled d-flex">
                    <?php $topBar = get_field('header_top_bar', 'option'); ?>
                    <?php if( $topBar['contact_no-1_name'] ): ?>
                    <li>
                        <span><?php echo $topBar['contact_no-1_name']; ?></span>
                        <a href="tel:<?php echo $topBar['contact_n1']; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $topBar['contact_n1']; ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if( $topBar['contact_no-2_name'] ): ?>
                    <li>
                        <span><?php echo $topBar['contact_no-2_name']; ?></span>
                        <a href="tel:<?php echo $topBar['contact_no-2']; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $topBar['contact_no-2']; ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if( $topBar['contact_no-3_name'] ): ?>
                    <li>
                        <span><?php echo $topBar['contact_no-3_name']; ?></span>
                        <a href="tel:<?php echo $topBar['contact_no-3']; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $topBar['contact_no-3']; ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if( $topBar['contact_no-4_name'] ): ?>
                    <li>
                        <span><?php echo $topBar['contact_no-4_name']; ?></span>
                        <a href="tel:<?php echo $topBar['contact_no-4']; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $topBar['contact_no-4']; ?></a>
                    </li>
                    <?php endif; ?>
                    <?php 
                        $covidNotice = $topBar['covid_19_notice_button'];
                        
                        if( $covidNotice ): 
                        
                            $link_url = $covidNotice['url'];
                        
                            $link_title = $covidNotice['title'];
                        
                            $link_target = $covidNotice['target'] ? $covidNotice['target'] : '_self';
                        
                            ?>
                    <li class="covid19info">            
                        <a target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </li>
                    <?php endif; ?>            
                </ul>
            </div>
            <div class="middleWithLogo container1682 container d-flex justify-content-center align-items-center">
                <div class="subsForm colD">
                    <div class="leftSide">
                        <h4 class="weight600 text-center">Sign-up for WDACS Newsletter</h4>
                        <div class="subsiWrapper">
                            <form  id="GD-snippet-form" action="https://public.govdelivery.com/accounts/CALACOUNTY/subscribers/qualify" accept-charset="UTF-8" method="post" target="_blank">
                                <input name="utf8" type="hidden" value="✓"> 
                                <input type="hidden" name="topic_id" id="topic_id" value="CALACOUNTY_51"> 
                                <div class="formGroup">
                                    <div>
                                        <label class="sr-only" for="email">email</label>
                                        <input type="email" class="emailInput" id="email"  name="email" placeholder="Email address" style="width: 100%;">
                                        <!-- <label class="sr-only" for="nZ">zip</label>
                                        <input type="text" placeholder="Zip code" id="nZ"> -->
                                    </div>
                                    <button class="btn btn-dark">Sign Up</button>                   
                                </div>
                            </form>
                        </div> 
                    </div>                  
                </div>
                <div class="logo colD">
                    <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_field('header_logo', 'option')['url']; ?>" alt="<?php echo get_field('header_logo', 'option')['alt']; ?>" class="img-fluid">
                    </a>
                </div>
                <div class="social colD d-flex justify-content-center justify-content-lg-end">
                    <div class="d-flex flex-column align-items-center">
                        <h4 class="weight600">Connect with Us</h4>
                        <?php $socialNet = get_field('social_network', 'option');
                            if( $socialNet ):
                        ?>
                        <ul class="socList list-unstyled d-flex">
                            <?php if( $socialNet['fb'] ): ?>
                            <li>
                                <a target="_blank" href="<?php echo $socialNet['fb']; ?>">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Follow on facebook</span>
                                </a>                    
                            </li>
                            <?php endif; ?>
                            <?php if( $socialNet['twitter'] ): ?>
                            <li>
                                <a target="_blank" href="<?php echo $socialNet['twitter']; ?>">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                <span class="sr-only">Follow on twitter</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if( $socialNet['instagram'] ): ?>
                            <li>
                                <a target="_blank" href="<?php echo $socialNet['instagram']; ?>">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Follow on Instagram</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if( $socialNet['vimeo'] ): ?>
                            <li>
                                <a target="_blank" href="<?php echo $socialNet['vimeo']; ?>">
                                <i class="fa fa-vimeo" aria-hidden="true"></i>
                                <span class="sr-only">Vimeo</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="container-fluid bg-dark onlyNav">
                <div class="container1682">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                        <!--   
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    
                              <span class="navbar-toggler-icon"></span>
                            
                            
                    
                            </button> -->
                        <div class="navbar-collapse" id="navbarSupportedContent">
                            <?php
                                $walker = new Menu_With_Description;
                                wp_nav_menu(
                           
                                    array(
                                
                                        'theme_location' => 'menu-1',
                                        'container' => 'ul',
                                        'menu_class' => 'list-unstyled navbar-nav mr-auto',
                                        'walker' => $walker, 
                                    )
                                ); 
                            ?>
                            <button data-target="#navbarSupportedContent"  class="mobMenuAnch btn px-3 py-3 ">MENU</button>
                            <div class="langBtnGroup">
                                <ul class="list-unstyled d-flex align-items-center">
                                    <li class="langList">
                                        <?php echo do_shortcode('[glt language="English" label="En" image="no" text="yes" image_size="24"]'); ?>
                                        <!-- <a href="#" class="lang" data-lang="en" >EN</a> -->
                                    </li>
                                    <li>|</li>
                                    <li class="langList">
                                        <?php echo do_shortcode('[glt language="Spanish" label="Español" image="no" text="yes" image_size="24"]'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
