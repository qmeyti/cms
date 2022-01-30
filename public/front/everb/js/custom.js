(function($) {
	'use strict';

    // Mean Menu
    jQuery('.mean-menu').meanmenu({
        meanScreenWidth: "991"
    });

    //Navbar JS
    $(window).on('scroll',function() {
        if ($(this).scrollTop()>150){  
            $('.navbar-area').addClass("sticky-top");
        }
        else{
            $('.navbar-area').removeClass("sticky-top");
        }
    });

    //Search Bar
    $('.search-icon').on('click',function(){
        $('.search-form').toggle();
    });


    //testimonial Slider
    $('.testimonial-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        rtl: true,
        items:1,
        smartSpeed:2000,
        dots:false
    })

    // Showcase Portfolio
    $('#Container').mixItUp();	

    //Accordian JS
    $(".faq-area .open").click( function () {
        var container = $(this).parents(".topic");
        var answer = container.find(".answer");
        var trigger = container.find(".faq-t");
    
        answer.slideToggle(200);
    
        if (trigger.hasClass("faq-o")) {
            trigger.removeClass("faq-o");
        }

        else {
            trigger.addClass("faq-o");
        }
    
        if (container.hasClass("expanded")) {
            container.removeClass("expanded");
        }

        else {
            container.addClass("expanded");
        }
     });

    // Video JS 
    $('.popup-vimeo').magnificPopup({
		disableOn:320,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
    });
    
    //Popup Gallery
    $('.popup-gallery').magnificPopup({
		type: 'image',
	});

    // Subscribe form
    $(".newsletter-form").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
        // handle the invalid form...
            formErrorSub();
            submitMSGSub(false, "لطفا ایمیل خود را به درستی وارد کنید.");
        } else {
            // everything looks good!
            event.preventDefault();
        }
    });
    function callbackFunction (resp) {
        if (resp.result === "success") {
            formSuccessSub();
        }
        else {
            formErrorSub();
        }
    }
    function formSuccessSub(){
        $(".newsletter-form")[0].reset();
        submitMSGSub(true, "با تشکر از شما برای اشتراک!");
        setTimeout(function() {
            $("#validator-newsletter").addClass('hide');
        }, 4000)
    }
    function formErrorSub(){
        $(".newsletter-form").addClass("animated shake");
        setTimeout(function() {
            $(".newsletter-form").removeClass("animated shake");
        }, 1000)
    }
    function submitMSGSub(valid, msg){
        if(valid){
            var msgClasses = "validation-success";
        } else {
            var msgClasses = "validation-danger";
        }
        $("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
    }
    // AJAX MailChimp
    $(".newsletter-form").ajaxChimp({
        url: "https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9", // Your url MailChimp
        callback: callbackFunction
    });

    //Pre Loader
    $(window).on('load',function(){
        $(".loader-content").fadeOut(1000);
    }) 

})(jQuery);