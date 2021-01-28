jQuery( function() {

		// Search toggle.
		jQuery(function(){
		  var jQuerysearchlink = jQuery('#search-toggle');
		  var jQuerysearchbox  = jQuery('#search-box');
		  
		  jQuery('#search-toggle').on('click', function(){
		    
		    if(jQuery(this).attr('id') == 'search-toggle') {
		      if(!jQuerysearchbox.is(":visible")) { 
		        // if invisible we switch the icon to appear collapsable
		        jQuerysearchlink.removeClass('header-search').addClass('header-search-x');
		      } else {
		        // if visible we switch the icon to appear as a toggle
		        jQuerysearchlink.removeClass('header-search-x').addClass('header-search');
		      }
		      
		      jQuerysearchbox.slideToggle(200, function(){
		        // callback after search bar animation
		      });
		    }
		  });
		});

		// Menu toggle for below 768 screens.
		( function() {
			var togglenav = jQuery( '.main-navigation' ), button, menu;
			if ( ! togglenav ) {
				return;
			}

			button = togglenav.find( '.menu-toggle' );
			if ( ! button ) {
				return;
			}
			
			menu = togglenav.find( '.menu' );
			if ( ! menu || ! menu.children().length ) {
				button.hide();
				return;
			}

			jQuery( '.menu-toggle' ).on( 'click', function() {
				jQuery(this).toggleClass("on");
				togglenav.toggleClass( 'toggled-on' );
			} );
		} )();

		jQuery( function() {
			if(jQuery( window ).width() < 768){
				//responsive sub menu toggle
                jQuery('#site-navigation .menu-item-has-children, #site-navigation .page_item_has_children').prepend('<button class="sub-menu-toggle"> <i class="plus-ico">+</i> </button>');
				jQuery(".main-navigation .menu-item-has-children ul, .main-navigation .page_item_has_children ul").hide();
				jQuery(".main-navigation .menu-item-has-children > .sub-menu-toggle, .main-navigation .page_item_has_children > .sub-menu-toggle").on('click', function () {
					jQuery(this).parent(".main-navigation .menu-item-has-children, .main-navigation .page_item_has_children").children('ul').first().slideToggle();
					jQuery(this).children('.plus-ico').first().toggleClass('back-ico');
					
				});
			}
		});

		// For Wow Effect
	    wow = new WOW({
	            boxClass: 'freesia-animation'
	        }
	    );
	    wow.init();
	    
		// Mini Slider 
		 /*The code is pretty simple, we animate the ul with a -220px margin left. Then we find the first li and put it last to get the infinite animation.*/
		jQuery(function(){
			setInterval(function(){
				jQuery(".min_slider ul").animate({marginLeft:-220},1000,function(){
					jQuery(this).css({marginLeft:0}).find("li:last").after(jQuery(this).find("li:first"));
				})
			}, 3000);
		}); 

		/* allow keyboard access for portfolio link */
		var portfolioLink = jQuery('.widget_portfolio .four-column-full-width, .widget_portfolio .four-column-full-width .portfolio-content h3, .widget_portfolio .four-column-full-width .portfolio-content p').children('a');

		    portfolioLink.on( 'focus', function(){
		        jQuery(this).parents('.widget_portfolio .four-column-full-width').addClass('focus');
		    });
		    portfolioLink.on( 'focusout', function(){
		        jQuery(this).parents('.widget_portfolio .four-column-full-width').removeClass('focus');
		    });

		// Go to top button.
		jQuery(document).ready(function(){

		// Hide Go to top icon.
		jQuery(".go-to-top").hide();

		  jQuery(window).scroll(function(){

		    var windowScroll = jQuery(window).scrollTop();
		    if(windowScroll > 900)
		    {
		      jQuery('.go-to-top').fadeIn();
		    }
		    else
		    {
		      jQuery('.go-to-top').fadeOut();
		    }
		  });

		  // scroll to Top on click
		  jQuery('.go-to-top').click(function(){
		    jQuery('html,header,body').animate({
		    	scrollTop: 0
			}, 700);
			return false;
		  });

		});

} );