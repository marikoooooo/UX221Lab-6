   // When the user clicks on the button, scroll to the top of the document
            function magcityTopFunction(){
              document.body.scrollTop = 0; // For Safari
              document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
          jQuery(document).ready(function(){
            mybutton = document.getElementById("goToTopBtn");
            
            if(mybutton){

                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {scrollFunction()};

            
                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                  }
                }
            }

  });

accessmagcity();
function accessmagcity() {
jQuery( document ).on( 'keydown', function( e ) {
    if ( jQuery( window ).width() > 992 ) {
        return;
    }
    var activeElement = document.activeElement;
    var menuItems = jQuery( '#top .menu-item > a' );
    var firstEl = jQuery( '.menu-toggle' );
    var lastEl = menuItems[ menuItems.length - 1 ];
    var tabKey = event.keyCode === 9;
    var shiftKey = event.shiftKey;
    if ( ! shiftKey && tabKey && lastEl === activeElement ) {
        event.preventDefault();
        firstEl.focus();
    }
} );
}


    jQuery(window).on('scroll', function() {
        if (jQuery(this).scrollTop() >150){  
            jQuery('.header-menu').addClass("sticky-nav");
        }
        else{
            jQuery('.header-menu').removeClass("sticky-nav");
        }
    });

    jQuery(document).ready(function($) {
        //main navigation
    //main navigation
    $('.main-navigation ul li.menu-item-has-children').find('> a').after('<button class="submenu-toggle"><i class="fa fa-chevron-down"></i></button>');
    $('.main-navigation ul li.page_item_has_children').find('> a').after('<button class="submenu-toggle"><i class="fa fa-chevron-down"></i></button>');
    
    $('.main-navigation ul li button.submenu-toggle').on('click', function () {
        $(this).parent('li.menu-item-has-children').toggleClass('active');
        $(this).parent('li.page_item_has_children').toggleClass('active');
        $(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
        $(this).siblings('.children').stop(true, false, true).slideToggle();
    });
    $('.main-navigation .toggle-button').click(function(){
        $('.primary-menu-list').animate({
            width: 'toggle',
        });
    });
    $('.main-navigation .close').click(function(){
        $('.primary-menu-list').animate({
            width: 'toggle',
        });
    });

    //for accessibility
    $('.main-navigation ul li a, .main-navigation ul li button').focus(function() {
        $(this).parents('li').addClass('focused');
    }).blur(function() {
        $(this).parents('li').removeClass('focused');
    });
    //tab js
    $('.tab-btn').click(function(){
        var divId = $(this).attr('id');
        $('.tab-btn').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').stop(true, false, true);
        $('.tab-content').removeClass('active');
        $('#'+divId+'-content').stop(true, false, true).addClass('active');

    });
});


jQuery(document).ready(function() {
    jQuery('.skip-link-menu-end-skip').focus(function(){
        jQuery('.close').focus();
    });
    
});