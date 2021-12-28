(function($) {
  'use strict';  
    /*---------------------------------
        Preloader JS
    -----------------------------------*/ 
    var prealoaderOption = $(window);
    prealoaderOption.on("load", function () {
        var preloader = jQuery('.spinner');
        var preloaderArea = jQuery('.preloader-area');
        preloader.fadeOut();
        preloaderArea.delay(350).fadeOut('slow');
    });
    /*---------------------------------
        Preloader JS
    -----------------------------------*/

    /*---------------------------------  
        sticky header JS
    -----------------------------------*/
    $(window).on('scroll',function() {    
        var scroll = $(window).scrollTop();
         if (scroll < 100) {
          $("#header-area").removeClass("sticky");
         }else{
          $("#header-area").addClass("sticky");
         }
    }); 
    /*---------------------------------  
        sticky header JS
    -----------------------------------*/
    /*---------------------------------  
        Meanmenu JS
    -----------------------------------*/ 
    $('.main-menu nav').meanmenu({
      meanMenuContainer: '.mobile-menu',
      meanScreenWidth: "767"
    });
    /*---------------------------------  
        Meanmenu JS
    -----------------------------------*/ 
    
    /*---------------------- 
     Ajax Form
    ------------------------*/
    $("#contact-form").submit(function (event) {

        var successMail = '#success' ;
        var errorMail = '#error' ;

        event.preventDefault();



        var formData = $("#contact-form").serialize();

        $("#contact-form :input").prop("disabled", true);

        $.ajax({
            type: 'POST',
            url: $('#contact-form').attr('action'),
            data: formData
        })
            .done(function (response) {
                $(successMail).show();
                $(errorMail).hide();
                $('#contact-form input').val('');
                $('#contact-form textarea').val('');
                $("#contact-form :input").prop("disabled", false);
                console.log(response);
                $(successMail).text(response.success);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {

                var msg = JSON.parse(jqXHR.responseText) ;
                $(errorMail).show();
                $(successMail).hide();
                $("#contact-form :input").prop("disabled", false);
                $(errorMail).text(msg.error);
            });


        return false ;
    })
    /*---------------------- 
     Ajax Form
    ------------------------*/

})(window.jQuery);   