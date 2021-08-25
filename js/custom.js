var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.height) {
      panel.style.height = null;
    } else {
      panel.style.height = panel.scrollHeight + "px";
    } 
  });
}

$(document).ready(function(){



    $.fn.isInViewport = function(e) {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };



/*
    $('.parallax.carousel').carousel({
        interval: false,
    });*/

    $(".mtHeaderGap").css("margin-top",$('.header').outerHeight());

    $("#tribe-events-content").css("margin-top",$('.header').outerHeight());


	$(".playbtn").click(function(){

		var src = $(this).data("src");

        var getThumbnailHeight = $(this).parent().css("height");

		///$(".iframeWrpr iframe").attr("src", src);
        $(this).parent().next().find("iframe").attr("src", src);
        $(this).parent().next().removeClass("d-none").css("height",getThumbnailHeight);

		$(this).parent().addClass("d-none");

		//$(".iframeWrpr").removeClass("d-none").css("height",getThumbnailHeight);

	});



	$(".multiLangAnchor").click(function(et){

		et.preventDefault();

		$(".multiLinks").show();

	});





    /* -- back to top anchor-- */

    btopBtn = document.getElementById("btp");
    // When the user scrolls down 20px from the top of the document, show the button

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {

      if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {

        btopBtn.style.display = "block";

        btopBtn.onclick = function(){topFunction()};

      } else {

        btopBtn.style.display = "none";

      }

    }



    // When the user clicks on the button, scroll to the top of the document

    function topFunction() {

        $("html, body").animate({scrollTop: 0}, 500);

    }

    /* -- ending back to top anchor-- */





	$('.moveToDiv').click(function(e) {	

        if ( $(this).hash ) {

            e.preventDefault();

            console.log("hash");

        }
		var targetId = this.hash;

		$('html, body').animate({

		    scrollTop: $(targetId).offset().top - $(".onlyNav").outerHeight()

		}, 1000)

	});



    $(".collapseBtn").click(function(){
        var idname = $(this).data("id");
        //$(".contentGroup").removeClass("active");
        $(".collapseBtn").removeClass("active");
        $(this).addClass("active");
        $(".contentGroup").fadeOut('200');
        $("#"+idname).addClass("active").fadeIn("400");

    });


// on map button click append iframe
    $(".mapBtn").click(function(idname){
        var idname = $(this).data("id");
        var iframeCode = '<iframe src="'+ $(this).data("mapsrc") +'" frameborder="0"></iframe>';
        //$("#embedIframe").empty().append(iframeCode);
        $("#"+idname+ " .mapIframeWRapper" ).empty().append(iframeCode);
    });


    var height = $('.header').outerHeight();

    $(window).scroll(function() {
        if($(this).scrollTop() > height)
        {
            $(".onlyNav").addClass("fixed");
            
        }
        else if($(this).scrollTop() <= height)
        {
             $(".onlyNav").removeClass("fixed");
          
        }

        parallaxScroll();

    });

    $(window).scroll();


    function parallaxScroll(){
          $('.parallax .content').each(function() {            
            var activeDiv = $(this).parent().data('view');
            if ($(this).isInViewport()) {             
              $('#con' + activeDiv).addClass('tracking-in-expand-fwd');
            } else {
              $('#con' + activeDiv).removeClass('tracking-in-expand-fwd');
            }
          });
    }
 


    var menu = new MmenuLight(

        document.querySelector( '#test' ),

        '(max-width: 767px)'

    );



    var navigator = menu.navigation({

        // selectedClass: 'Selected',

        // slidingSubmenus: true,

        // theme: 'dark',

        // title: 'Menu'

    });



    var drawer = menu.offcanvas({

        // position: 'left'

    });



    //  Open the menu.

    document.querySelector( 'button[data-target="#navbarSupportedContent"]' )

    .addEventListener( 'click', evnt => {

        evnt.preventDefault();

        drawer.open();                

    });



    /*$('button[data-target="#navbarSupportedContent"]').click(function(){

        $("#menu-item-57>a").text("Home");

    });*/


// local events load more



var prin_pageB =1;



function get_more_news(){

    var url = $(".footerLogo").attr("href");

    var serviceId = $("#services").val();

    var centerId = $("#center").val();

        var ppp = -1;

          var ajaxUrl = url+'/wp-admin/admin-ajax.php ';

            $.ajax({

                url: ajaxUrl,

                type: 'POST',

                dataType: 'json',

                data: {

                    action:"more_news_ajax",

                    serviceId: serviceId,

                    centerId: centerId

                    },

                beforeSend: function(){

                    jQuery("#serviceAndCenterData").hide();

                    jQuery("#loader").show();

                },

                success: function(data){                    

                    jQuery("#loader").hide();

                    jQuery("#serviceAndCenterData").show(); 

                },

            })            

            .done(function(res) {

               jQuery("#serviceAndCenterData").html(res.posts);

            })

            .fail(function() {              

                console.log("error");

            })

            .always(function() {

                console.log("complete");

            });

    }

    jQuery(document).on('change', '#services, #center', function(event) {

        event.preventDefault();

       get_more_news();

    });






function videoClickpopup(){
    $(".articleTitle, .videoWrapper .playbtnv").click(function(){

        var videoLink = $("#iframe"+$(this).data("videoid")).attr("src");        

        var gotId = ( getIdFromVimeoURL(videoLink) );

        $("#videoModal iframe").attr("src","");

        $("#videoModal iframe").attr("src",'https://player.vimeo.com/video/'+gotId+'?loop=1&autoplay=1');

        var getTitle = $(this).data("videotitle");

        $("#videoModalTitle").text(getTitle);

        $("#videoModal").modal("show");



        $("#videoModal .close").click(function(){

            $("#videoModal iframe").attr("src","");

        });

    });

    function getIdFromVimeoURL(url) {

      return /(vimeo(pro)?\.com)\/(?:[^\d]+)?(\d+)\??(.*)?$/.exec(url)[3];

    }

}


videoClickpopup();








var prin_pageB =1;

        function load_more_video(){

var url = $(".footerLogo").attr("href");
        var ppp = 9;
          var ajaxUrl = url+'/wp-admin/admin-ajax.php ';
            $.ajax({
                url: ajaxUrl,

                type: 'POST',

                dataType: 'json',

                data: {

                    action:"more_video_ajax",

                    offset: (prin_pageB * ppp),

                    ppp: ppp,

                    page: prin_pageB,

                    category:$('#vidCat').val()

                    },

            })

            .done(function(res) {

                prin_pageB++;

                if(res.load_more==true){

                    $('#loadMoreVidBtn').show();

                }

               jQuery("#loadMoreHere").append(res.posts);

            })

            .fail(function(e) {

                console.log(e);

                console.log("error");

            })

            .always(function() {

                console.log("complete");
                videoClickpopup();

            });

    }

    jQuery(document).on('click', '#loadMoreVidBtn', function(event) {
        event.preventDefault();
        $('#loadMoreVidBtn').hide();
        load_more_video();
    });





   jQuery(document).on('change', '#vidCat', function(event) {

        event.preventDefault();

        prin_pageB=0;

         $('#loadMoreVidBtn').hide();
        jQuery('.content_wrap').remove();
        jQuery("#loadMoreHere").empty();
        load_more_video();

    });



    $(document).on('change', '#subjectdrop', function(event) {
        event.preventDefault();
        var val =$(this).val().trim();
        if(val=='Job Seekers Support'){
            $('#toemail').val('ajccjobs@wdacs.lacounty.gov');
        }else if(val=='Business Services Support'){
            $('#toemail').val('bizdev@wdacs.lacounty.gov');
        }else if(val=='Older Adult Services Support'){
            $('#toemail').val('aaaprograms@wdacs.lacounty.gov');
        }else if(val=='Community & Senior Centers Support'){
            $('#toemail').val('lramirez@wdacs.lacounty.gov');
        }else if(val=='Native American Indian Commission Support'){
            $('#toemail').val('contact@lanaic.lacounty.gov');
        }else if(val=='Workforce Development Board Support'){
            $('#toemail').val('wdb@wdacs.lacounty.gov ');
        }else if(val=='Human Relations Commission Support'){
            $('#toemail').val('info@wdacs.lacounty.gov');
        }else if(val=='General Support Services'){
            $('#toemail').val('info@wdacs.lacounty.gov');
        }

    });


	
    $('#relatedStories').owlCarousel({
        loop:true,
        margin:25,
        responsiveClass:true,

        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    })



    var prin_pageB =1;
    var ppp = 6;

    function get_tag_stories(that=null,loadmore=null){
    
        var url = $(".footerLogo").attr("href");
        var tag_page = $("#tag_page_name").val();
        
        if(that!=null)
        {
            var story_tag = $(that).data('tagurl');
        }
        else
        {
            var story_tag = $('.tag_stories_tab active').data('tagurl');
        }

        if(tag_page)
        {
            var story_tag = tag_page;

        }

        if(that!=null && loadmore==null)
        {
            prin_pageB=1;
        }
    
            // var ppp = -1;
    
              var ajaxUrl = url+'/wp-admin/admin-ajax.php ';
    
                $.ajax({
    
                    url: ajaxUrl,
    
                    type: 'POST',
    
                    dataType: 'json',
    
                    data: {
    
                        action:"get_tag_stories_ajax",
                        offset: (prin_pageB * ppp),
                        ppp: ppp,    
                        page: prin_pageB,
                        story_tag: story_tag
    
                        },
    
                    beforeSend: function(){
                        jQuery('#loader_image_tag').show();
                        jQuery("#loadMoreVidBtnstory").hide();
    
                    },
    
                    success: function(data){
                        // if(loadmore!=null)
                        // {
                            prin_pageB++;
                        // }                    
    
                        jQuery('#loader_image_tag').hide();
                        jQuery("#loadMoreVidBtnstory").hide();
    
                        jQuery(".related_tag_stories").show(); 
    
                    },
    
                })            
    
                .done(function(res) {
    
                    if(that==null && loadmore==null)
                    {
                        jQuery(".related_tag_stories").html(res.posts);
                    }
                    else if(that==null && loadmore!=null)
                    {
                        jQuery(".related_tag_stories").append(res.posts);
                    }
                    else if(that!=null && loadmore==null)
                    {
                        jQuery(".related_tag_stories").html(res.posts);
                    }
                    else
                    {
                        // jQuery(".related_tag_stories").html(res.posts);
                    }

                    if(res.load_more)
                    {
                            jQuery("#loadMoreVidBtnstory").show();
                    }
                    else
                    {
                            jQuery("#loadMoreVidBtnstory").hide();
                    }
    
                })
    
                .fail(function() {              
    
                    console.log("error");
    
                })
    
                .always(function() {
    
                    console.log("complete");
    
                });
    
        }
    
        jQuery(document).on('click', '.tag_stories_tab', function(event) {
    
            var that=$(this);
            event.preventDefault();
            jQuery('#loader_image_tag').show();
            // return false;
    
            get_tag_stories(that);
    
        });
    
        jQuery(document).on('click', '#loadMoreVidBtnstory', function(event) {
    
            event.preventDefault();
            jQuery('#loader_image_tag').show();
            // return false;
            get_tag_stories(null,'loadmore');
    
        });
    
        get_tag_stories();
}); 

function play_tag_video(that)
{
		var src = $(that).data("src");

        var getThumbnailHeight = $(that).parent().css("height");

		///$(".iframeWrpr iframe").attr("src", src);
        $(that).parent().next().find("iframe").attr("src", src);
        $(that).parent().next().removeClass("d-none").css("height",getThumbnailHeight);

		$(that).parent().addClass("d-none");
}
       
//ending of document.ready


/*
var image = document.getElementsByClassName('parallaxImg');
new simpleParallax(image, {
    delay: .6,
    transition: 'cubic-bezier(0,0,0,1)'
});
*/