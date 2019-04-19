$(document).ready(function(){
	$('.search-button').on('click', '.search-toggle', function(e) {
		var selector = $(this).data('selector');
		$(selector).toggleClass('show').find('.search-input').focus();
		$(this).toggleClass('active');
		e.preventDefault();
	});
    
    $("#home-slider").owlCarousel({
        items: 1,
        responsiveClass: true,
        nav: false,
        loop: true,
        dots: true,
        autoplay:false
    });
    $("#home-slider-ar").owlCarousel({
        items: 1,
        responsiveClass: true,
        nav: false,
        loop: true,
        dots: true,
        rtl:true,
        autoplay:false
    });
    //category inside
    $("#similar-game-slider").owlCarousel({
    	margin: 10,
        items: 5,
        nav: false,
        loop: false,
        dots: true,
        autoplay:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    $("#similar-game-slider-ar").owlCarousel({
        margin: 10,
        items: 5,
        nav: false,
        loop: false,
        dots: true,
        rtl:true,
        autoplay:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });


    //category inside
    $("#gameimage-list-slider").each(function(index, el) {
        var containerHeight = $(el).height();
        $(el).find("img").each(function(index, img) {
            var w = $(img).prop('naturalWidth');
            var h = $(img).prop('naturalHeight');
            $(img).css({
            'width': Math.round(containerHeight * w / h) + 'px',
            'height': containerHeight + 'px'
            });
        }),
        $(el).owlCarousel({
            margin: 10,
            items: 5,
            responsiveClass: true,
            nav: false,
            loop: true,
            dots: false,
            autoplay:false,
            autoHeight: false,
            video:true,
            lazyLoad:true,
            center:true,
            autoWidth: true
        });
    });
    $("#gameimage-list-slider-ar").each(function(index, el) {
        var containerHeight = $(el).height();
        $(el).find("img").each(function(index, img) {
            var w = $(img).prop('naturalWidth');
            var h = $(img).prop('naturalHeight');
            $(img).css({
            'width': Math.round(containerHeight * w / h) + 'px',
            'height': containerHeight + 'px'
            });
        }),
        $(el).owlCarousel({
            margin: 10,
            items: 5,
            responsiveClass: true,
            nav: false,
            loop: true,
            dots: false,
            autoplay:false,
            rtl: true,
            autoHeight: false,
            video:true,
            lazyLoad:true,
            center:true,
            autoWidth: true
        });
    });

    $(".search-icon").click(function(e) {
        e.stopPropagation();
        $(".searchbox").slideToggle(400);
        $(".search-icon").toggleClass("search");
        $(".search-icon").toggleClass("close");       
    });
    $(".searchbox").click(function(e) {
        e.stopPropagation();
    });
    $("body").click(function(e) {
        $(".searchbox").delay(10).slideUp(400);
        $(".search-icon").addClass("search");
        $(".search-icon").removeClass("close");
    });


   /*var login_btn = ".category";
    $(login_btn).attr("data-toggle","modal");
    $(login_btn).attr("data-target","#loginmodal");
    $(".login_btn").click(function(){
        
    $("#loginmodal .box-content").html("");

        $.ajax({
                url : ajaxurl,
                type : 'post',
                data : {
                    action : 'get_signin_form'
                },

                success : function( response ) {
                    console.log(response);
                   $("#box-content").html( response );
                   $(signin_ajax_loader).hide();
                }
            }); // get_signin_form ajax ends here

    });*/

  
    
});



