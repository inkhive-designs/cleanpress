jQuery(document).ready( function() {
    jQuery(".top-search-icon").toggle(

        function(){
            jQuery("#top-search-form").slideDown('slow');
            jQuery(".cancel-search").click(function(){
                jQuery("#top-search-form").slideUp('fast');
            });
        },
        function(){
            jQuery("#top-search-form").slideUp('fast');
        }
    );

    //Mobile Menu
    jQuery('.panel_hide_button').hide();
    jQuery('.menu-link').bigSlide({
        menu: '#menu',
        easyClose: true,
		menuWidth: '20em',
        side: 'right',
        beforeOpen: function() {jQuery('.panel_hide_button').fadeIn()},
        beforeClose: function() {jQuery('.panel_hide_button').fadeOut()},
    });

    var parentElement = jQuery('.panel li.menu-item-has-children'),
        dropdown	=	jQuery('.panel li.menu-item-has-children span');

    parentElement.children('ul').hide();
    dropdown.on('click', function(e) {
        jQuery(this).siblings('ul').slideToggle().toggleClass('expanded');
        e.stopPropagation();
    });
});




jQuery(window).load(function() {
    jQuery('#nivoSlider').nivoSlider({
        prevText: "<i class='fa fa-chevron-circle-left'></i>",
        nextText: "<i class='fa fa-chevron-circle-right'></i>",
    });

    //sticky sidebar
    jQuery('.sticky-sidebar').scrollToFixed({
        marginTop: 30,
        limit: jQuery('#primary').offset().top + jQuery('#primary').height() - jQuery('.sticky-sidebar').height(),
    });

});

//Sticky Menu
window.onscroll = function() { scrollStickyTop() };

var topbar = document.getElementById("topbar");
var sticked = topbar.offsetTop + 20;

function scrollStickyTop() {
	if ( window.pageYOffset > sticked ) {
		topbar.classList.add("sticked");
	} else {
		topbar.classList.remove("sticked");
	}
}

(function(jQuery) {
	jQuery(document).ready(function() {
		
		function showSlide(slide) {
			jQuery('.slide').removeClass('visible');
			jQuery('.'+slide).addClass('visible');
		}
		
		
		jQuery('.slide').addClass('not-visible');
		jQuery('.slide1').addClass('visible');
		jQuery('.thumb1').addClass('arrowed');
		jQuery('.thumb').click(function() {
			jQuery('.thumb').removeClass('arrowed');
			jQuery(this).addClass('arrowed');
			
			if ( jQuery(this).hasClass('thumb1') ) {
				showSlide('slide1');
			}
			if ( jQuery(this).hasClass('thumb2') ) {
				showSlide('slide2');
			}
			if ( jQuery(this).hasClass('thumb3') ) {
				showSlide('slide3');
			}
			if ( jQuery(this).hasClass('thumb4') ) {
				showSlide('slide4');
			}
		});
	});
	
})( jQuery );		