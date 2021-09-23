

(function($) {

	"use strict"
	
	/* + Join Us Section 2 */
	function joinus2() {
		var width = $(window).width();
		var joinus_section_height = $(".joinus-section2").height();
		var ele_id = 0;
		if ( width >= 992 ) {
			$( ".joinus-img" ).removeAttr("style");
			$( ".joinus-img img" ).remove();
			var joinus_img = $(".joinus-img").attr("data-image");
			$( ".joinus-img" ).css({"background-image":"url('" + joinus_img + "')","height": joinus_section_height });
		} else {
			$( ".joinus-img" ).removeAttr("style");
			$( ".joinus-img img" ).remove();
			var joinus_img = $(".joinus-img").attr("data-image");
			$( ".joinus-img" ).append("<img src='"+ joinus_img +"' />")
		}
	}
	
	/* + About Section */
	function about_img() {
		var width = $(window).width();
		var about_height = $(".about-section").height();
		var ele_id = 0;
		if ( width >= 992 ) {
			$( ".about-img" ).removeAttr("style");
			$( ".about-img img" ).remove();
			var about_img = $(".about-img").attr("data-image");
			$( ".about-img" ).css({"background-image":"url('" + about_img + "')","height": about_height - 100 });
		} else {
			$( ".about-img" ).removeAttr("style");
			$( ".about-img img" ).remove();
			var about_img = $(".about-img").attr("data-image");
			$( ".about-img" ).append("<img src='"+ about_img +"' />")
		}
	}
	
	/* + Our Mission Section */
	function mission_img() {
		var width = $(window).width();
		var mission_height = $(".our-mission-section").height();
		var ele_id = 0;
		if ( width >= 992 ) {
			$( ".mission-img" ).removeAttr("style");
			$( ".mission-img img" ).remove();
			var mission_img = $(".mission-img").attr("data-image");
			$( ".mission-img" ).css({"background-image":"url('" + mission_img + "')","height": mission_height - 225 });
		} else {
			$( ".mission-img" ).removeAttr("style");
			$( ".mission-img img" ).remove();
			var mission_img = $(".mission-img").attr("data-image");
			$( ".mission-img" ).append("<img src='"+ mission_img +"' />")
		}
	}
	
	/* + Gallery Masonry */
	function gallery_masonry() {
		if($(".gallery-masonry .gallery-list").length) {
			var $container = $(".gallery-masonry .gallery-list");
			$container.isotope({
				layoutMode: 'masonry',
				percentPosition: true,				
				itemSelector: ".gallery-box",
				gutter: 0
			});
			
			$("#filters a").on("click",function(){
				$('#filters a').removeClass("active");
				$(this).addClass("active");
				var selector = $(this).attr("data-filter");
				$container.isotope({ filter: selector });
				return false;
			});
		}
	}
	
	/* + Gallery */
	function gallery_fitrow() {
		if($(".gallery-fitrow .gallery-list").length) {
			var $container = $(".gallery-fitrow .gallery-list");
			$container.isotope({
				layoutMode: 'fitRows',
				percentPosition: true,
				itemSelector: ".gallery-box",
				gutter: 0,
				transitionDuration: "0.5s",
			});
			
			$("#filters a").on("click",function(){
				$('#filters a').removeClass("active");
				$(this).addClass("active");
				var selector = $(this).attr("data-filter");
				$container.isotope({ filter: selector });		
				return false;
			});
		}
	}
	
	/* + Responsive Caret* */
	function menu_dropdown_open(){
		var width = $(window).width();
		if($(".ownavigation .nav li.ddl-active").length ) {
			if( width > 991 ) {
				$(".ownavigation .nav > li").removeClass("ddl-active");
				$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
			}
		} else {
			$(".ownavigation .nav li .dropdown-menu").removeAttr("style");
		}
	}
	
	/* + Expand Panel Resize * */
	function panel_resize(){
		var width = $(window).width();
		if( width > 991 ) {
			if($(".header_s #slidepanel").length ) {
				$(".header_s #slidepanel").removeAttr("style");
			}
		}
	}
	
	/* + Google Map* */
	function initialize(obj) {
		var lat = $("#"+obj).attr("data-lat");
        var lng = $("#"+obj).attr("data-lng");
		var contentString = $("#"+obj).attr("data-string");
		var myLatlng = new google.maps.LatLng(lat,lng);
		var map, marker, infowindow;
		var image =  $("#"+obj).attr("data-pin");
		var zoomLevel = parseInt($("#"+obj).attr("data-zoom") ,10);		
		var styles = [{"featureType": "road.local","elementType": "labels.text","stylers": [{"visibility": "on"},{"color": "#0e0e0e"}]}]
		var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});	
		
		var mapOptions = {
			zoom: zoomLevel,
			disableDefaultUI: true,
			center: myLatlng,
            scrollwheel: false,
			mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
			}
		}
		
		map = new google.maps.Map(document.getElementById(obj), mapOptions);	
		
		map.mapTypes.set("map_style", styledMap);
		map.setMapTypeId("map_style");
		
		if( contentString != "" ) {
			infowindow = new google.maps.InfoWindow({
				content: contentString
			});
		}		
	    
        marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: image
		});

		google.maps.event.addListener(marker, "click", function() {
			infowindow.open(map,marker);
		});
	}
	
	/* + Sticky Menu */
	function sticky_menu() {
		var menu_scroll = $(".header_s").offset().top;
		var scroll_top = $(window).scrollTop();
		
		if ( scroll_top > menu_scroll ) {
			$(".header_s .ownavigation").addClass("navbar-fixed-top animated fadeInDown");
		} else {
			$(".header_s .ownavigation").removeClass("navbar-fixed-top animated fadeInDown"); 
		}
	}
	
	/* + Document On Ready */
	$(document).on("ready", function() {

		/* - Scrolling Navigation* */
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Set Sticky Menu* */
		if( $(".header_s").length ) {
			sticky_menu();
		}
		
		$('.navbar-nav li a[href*="#"]:not([href="#"]), .site-logo a[href*="#"]:not([href="#"])').on("click", function(e) {
	
			var $anchor = $(this);
			
			$("html, body").stop().animate({ scrollTop: $($anchor.attr("href")).offset().top - 49 }, 1500, "easeInOutExpo");
			
			e.preventDefault();
		});

		/* - Responsive Caret* */
		$(".ddl-switch").on("click", function() {
			var li = $(this).parent();
			if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
				li.removeClass("ddl-active");
				li.children().find(".ddl-active").removeClass("ddl-active");
				li.children(".dropdown-menu").slideUp();
			}
			else {
				li.addClass("ddl-active");
				li.children(".dropdown-menu").slideDown();
			}
		});
		
		/* - Expand Panel * */
		$("#slideit").on ("click", function() {
			$("#slidepanel").slideDown(1000);
			$("html").animate({ scrollTop: 0 }, 1000);
		});	

		/* - Collapse Panel * */
		$("#closeit").on("click", function() {
			$("#slidepanel").slideUp("slow");
			$("html").animate({ scrollTop: 0 }, 1000);
		});	
		
		/* Switch buttons from "Log In | Register" to "Close Panel" on click * */
		$("#toggle a").on("click", function() {
			$("#toggle a").toggle();
		});
		
		/* - Search * */
		if($(".search-box").length){
			$("#search").on("click", function(){
				$(".search-box").addClass("active")
			});
			$(".search-box span").on("click", function(){
				$(".search-box").removeClass("active")
			});
		}
		
		panel_resize();
		
		$(".dontaiton-detail ul > li > a").on("click", function() {
			$(".dontaiton-detail > ul > li > a").removeClass("active");
			$(".other-value").removeAttr("style");
			$(this).addClass("active");
		});
		
		$("#custom-amount").on("click", function() {
			$(".other-value").toggle();
		});
		
		/* - Revolution Slider */
		if($(".slider-section").length){
			$("#home-slider1").revolution({
				sliderType:"standard",
				delay:6000,
				responsiveLevels:[1920,1025,768,480],
				gridwidth:[1920,1025,768,480],
				gridheight:[690,600,500,400],
				navigation: {
					arrows:{
						enable:true,
						style:"uranus",
						hide_onmobile:false,
						hide_onleave:true,
						left: {
							h_align:"left",
							v_align:"center",
							h_offset:53,
							v_offset:0
						},
						right: {
							h_align:"right",
							v_align:"center",
							h_offset:53,
							v_offset:0
						}
					},
					bullets: {
						enable:true,
						style:"zeus",
						hide_onmobile:true,
						hide_under:767,
						hide_onleave:false,
						direction:"horizontal",
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:40,
						space:20,
						tmp:''
					}
				},
			});
			
			$("#home-slider2").revolution({
				sliderType:"standard",
				delay:6000,
				responsiveLevels:[1920,1025,768,480],
				gridwidth:[1920,1025,768,480],
				gridheight:[690,580,500,400],
				navigation: {
					arrows:{
						enable:true,
						style:"uranus",
						hide_onmobile:true,
						hide_under:600,
						hide_onleave:true,
						left: {
							h_align:"left",
							v_align:"center",
							h_offset:53,
							v_offset:0
						},
						right: {
							h_align:"right",
							v_align:"center",
							h_offset:53,
							v_offset:0
						}
					},
					bullets: {
						enable:true,
						style:"zeus",
						hide_onmobile:true,
						hide_under:767,
						hide_onleave:false,
						direction:"horizontal",
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:40,
						space:20,
						tmp:''
					}
				},
			});
			
			$("#home-slider3").revolution({
				sliderType:"standard",
				delay:6000,
				responsiveLevels:[1920,1025,768,480],
				gridwidth:[1920,1025,768,480],
				gridheight:[697,590,500,400],
				navigation: {
					bullets: {
						enable:true,
						style:"zeus",
						hide_onmobile:true,
						hide_under:767,
						hide_onleave:false,
						direction:"horizontal",
						h_align:"center",
						v_align:"bottom",
						h_offset:0,
						v_offset:40,
						space:20,
						tmp:''
					}
				},
			});
		}
		
		/* - Join Us Section 2 */
		if($(".joinus-section2").length){
			joinus2();
		}
		
		/* - About Section */
		if($(".about-section").length){
			about_img();
		}
		
		/* - Our Mission Section */
		if($(".our-mission-section").length){
			mission_img();
		}		
		
		/* - Testimonials Carousel */
		if( $(".testimonial2-carousel").length ) {			
			$(".testimonial2-carousel").owlCarousel({
				loop: true,
				margin: 0,
				nav: false,
				dots: true,
				center: true,
				autoplay: false,
				responsive:{
					0:{
						items: 1
					},
					768 : {
						items: 3
					}
				}
			});
		}
		
		/* - Gallery Popup */
		if($(".gallery-detail").length){
			var url;
			$(".gallery-detail").magnificPopup({
				delegate: " > a.zoom",
				type: "image",
				tLoading: "Loading image #%curr%...",
				mainClass: "mfp-img-mobile",
				gallery: {
					enabled: true,
					navigateByImgClick: false,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: "<a href="%url%">The image #%curr%</a> could not be loaded.",				
				}
			});
		}
		
		/* - Welcome Lightbox */
		$(".welcome-box > a").magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
        });
		
		/* - Counter Section  */
		$(".counter-section").each(function ()
		{		
			var $this = $(this);
			var myVal = $(this).data("value");	

			$this.appear(function()
			{
				var skill_item_count = 0;
				var skills_count = 0;

				skill_item_count = $( "[id*='skill_count-']" ).length;

				for(var i=1; i<=skill_item_count; i++)
				{
					skills_count = $( "[id*='skill_count-"+i+"']" ).attr( "data-skills_percent" );
					$("[id*='skill_count-"+i+"']").animateNumber({ number: skills_count }, 2000);
				}
			});				
		});
		
		/* - Client Carousel */
		if( $(".client-carousel").length ) {
			if($('html[dir="rtl"]').length) {
				$(".client-carousel").owlCarousel({
					loop: true,
					margin: 37,
					nav: false,
					dots: false,
					rtl: true,
					autoplay: true,
					responsive:{
						0:{
							items: 1
						},
						480:{
							items: 2
						},
						640:{
							items: 3
						},
						991 : {
							items: 4
						},
						1200:{
							items: 5
						}
					}
				});
			} else {
				$(".client-carousel").owlCarousel({
					loop: true,
					margin: 37,
					nav: false,
					dots: false,
					autoplay: true,
					responsive:{
						0:{
							items: 1
						},
						480:{
							items: 2
						},
						568:{
							items: 3
						},
						991 : {
							items: 4
						},
						1200:{
							items: 5
						}
					}
				});
			}
		}
		
		/* - Work Carousel */
		if( $(".work-carousel").length ) {
			if($('html[dir="rtl"]').length) {
				$(".work-carousel").owlCarousel({
					loop: true,
					margin: 5,
					nav: false,
					dots: false,
					rtl: true,
					autoplay: true,
					responsive:{
						0:{
							items: 1
						},
						480 : {
							items: 2
						},
						640 : {
							items: 3
						},
						992 : {
							items: 2
						},
						1366 : {
							items: 3
						}
					}
				});
			} else {
				$(".work-carousel").owlCarousel({
					loop: true,
					margin: 5,
					nav: false,
					dots: false,
					autoplay: false,
					responsive:{
						0:{
							items: 1
						},
						480 : {
							items: 2
						},
						640 : {
							items: 3
						},
						992 : {
							items: 2
						},
						1366 : {
							items: 3
						}
					}
				});
			}
		}
		
		/* - Skill Section */
		$( " [id*='skill_type-'] " ).each(function ()
		{
			var ele_id = 0;
			ele_id = $(this).attr('id').split("-")[1];
			
			var $this = $(this);
			var myVal = $(this).data("value");

			$this.appear(function()
			{			
				var skill_type1_item_count = 0;
				var skill_type1_count = 0;					
				skill_type1_item_count = $( "[id*='skill_"+ ele_id +"_count-']" ).length;				
				
				for(var i=1; i<=skill_type1_item_count; i++)
				{
					skill_type1_count = $( "[id*='skill_"+ ele_id +"_count-"+i+"']" ).attr( "data-skill_percent" );
					$("[id*='skill_"+ ele_id +"_count-"+i+"']").animateNumber({ number: skill_type1_count }, 5000);
					if($('html[dir="rtl"]').length) {
						$("[id*='skill_"+ ele_id +"_count-"+i+"']").css("right",skill_type1_count +"%");
					} else {
						$("[id*='skill_"+ ele_id +"_count-"+i+"']").css("left",skill_type1_count +"%");
					}
				}
				
				var skill_bar_count = 0;
				var skills_bar_count = 0;
				skill_bar_count = $( "[id*='skill_bar_"+ ele_id +"_count-']" ).length;
				
				for(var j=1; j<=skill_bar_count; j++)
				{
					skills_bar_count = $( "[id*='skill_"+ ele_id +"_count-"+j+"']" ).attr( "data-skill_percent" );
					$("[id*='skill_bar_"+ ele_id +"_count-"+j+"']").css({'width': skills_bar_count +'%'});
				}
			});
		});	

		/* - Related Carousel */
		if( $(".related-carousel").length ) {
			if($('html[dir="rtl"]').length) {
				$(".related-carousel").owlCarousel({
					loop: true,
					margin: 30,
					nav: false,
					dots: false,
					rtl: true,
					autoplay: false,
					responsive:{
						0:{
							items: 1
						},
						480 : {
							items: 2
						},
						768 : {
							items: 3
						},
						992 : {
							items: 4
						}
					}
				});
			} else {
				$(".related-carousel").owlCarousel({
					loop: true,
					margin: 30,
					nav: false,
					dots: false,
					autoplay: false,
					responsive:{
						0:{
							items: 1
						},
						480 : {
							items: 2
						},
						768 : {
							items: 3
						},
						992 : {
							items: 4
						}
					}
				});
			}
		}
		
		if( $( "#map-canvas-event").length == 1 ){
			initialize( "map-canvas-event" );
		}
		
		/* - Coming Soon */ 
		setTimeout(function() {		
			var ele_id = 0;
			$( "[id*='clock-']" ).each(function () { 
				ele_id = $(this).attr('id').split("-")[1];
				var cnt_date = $(this).attr("data-date");
				$("[id*='clock-"+ele_id+"']").countdown(cnt_date, function(event) {
					var $this = $(this).html(event.strftime(''    
						+ '<div class="countdown-box"><p>%D <span>Days</span></p></div>'
						+ '<div class="countdown-box"><p>%H <span>Hours</span></p></div>'
						+ '<div class="countdown-box"><p>%M <span>Mins</span></p></div>'
						+ '<div class="countdown-box"><p>%S <span>Sec</span></p></div>'
					));
				});
			});
		}, 500);
		
		if( $( "#contact-map-canvas").length == 1 ){
			initialize( "contact-map-canvas" );
		}
		
		/* + Hover */
		
		/* - Welcome Section */
		if( $(".welcome-box").length ) {
			$(".welcome-box").each( function(i){
				$(this).on('mouseover',function() {
					$(".welcome-box > h3").eq(i).removeClass("tc_dark");
					$(".welcome-box > h3").eq(i).addClass("tc_green");
				});
				$(this).on('mouseleave', function() {
					$(".welcome-box > h3").eq(i).removeClass("tc_green");
					$(".welcome-box > h3").eq(i).addClass("tc_dark");
				});
			});
		}
		
		/* - Our Mission Section */
		if( $(".our-mission-section").length ) {
			$(".our-mission .mission-box").each( function(i){
				$(this).on('mouseover',function() {
					$(".mission-box > i").eq(i).removeClass("bg_dark2");
					$(".mission-box > i").eq(i).addClass("bg_green");
					$(".mission-box > h3").eq(i).removeClass("tc_dark");
					$(".mission-box > h3").eq(i).addClass("tc_green");
				});
				$(this).on('mouseleave', function() {
					$(".mission-box > i").eq(i).removeClass("bg_green");
					$(".mission-box > i").eq(i).addClass("bg_dark2");
					$(".mission-box > h3").eq(i).removeClass("tc_green");
					$(".mission-box > h3").eq(i).addClass("tc_dark");
				});
			});
		}
		
		/* - Latest Blog */
		if( $(".latest-blog").length ) {
			$(".latest-blog .type-post").each( function(i){
				$(this).on('mouseover',function() {
					$(".type-post .entry-meta").eq(i).removeClass("bg_dark2");
					$(".type-post .entry-meta").eq(i).addClass("bg_green");
				});
				$(this).on('mouseleave', function() {
					$(".type-post .entry-meta").eq(i).removeClass("bg_green");
					$(".type-post .entry-meta").eq(i).addClass("bg_dark2");
				});
			});
		}
		
		/* - Team Member Hover */
		if( $(".team-page").length ) {
			$(".team-member-detail").each( function(i){
				$(this).on('mouseover',function() {
					$(".team-content").eq(i).removeClass("brd_color_gray");
					$(".team-content").eq(i).addClass("brd_color_green");
					$(".team-content > span").eq(i).removeClass("tc_dark");
					$(".team-content > span").eq(i).addClass("tc_green");
				});
				$(this).on('mouseleave', function() {
					$(".team-content").removeClass( "brd_color_green" );
					$(".team-content").addClass( "brd_color_gray" );
					$(".team-content > span").eq(i).removeClass("tc_green");
					$(".team-content > span").eq(i).addClass("tc_dark");
				});
			});
		}
		
		/* - Team Section */
		if( $(".team-section").length ) {
			$(".team-box").each( function(i){
				$(this).on('mouseover',function() {
					$(".team-content").eq(i).removeClass("bg_snow3 tcp_dove_gray");
					$(".team-content").eq(i).addClass("bg_green tcp_white");
					$(".team-content > span").eq(i).removeClass("tc_green");
					$(".team-content > span").eq(i).addClass("tc_white");
					$(".team-content > h4").eq(i).removeClass("tcp_dove_gray");
					$(".team-content > h4").eq(i).addClass("tc_white");
				});
				$(this).on('mouseleave', function() {
					$(".team-content").eq(i).removeClass("bg_green tcp_white");
					$(".team-content").eq(i).addClass("bg_snow3 tcp_dove_gray");
					$(".team-content > span").eq(i).removeClass("tc_white");
					$(".team-content > span").eq(i).addClass("tc_green");
					$(".team-content > h4").eq(i).removeClass("tc_white");
					$(".team-content > h4").eq(i).addClass("tcp_dove_gray");
				});
			});
		}
		
		/* - Event Listing */
		if( $(".event-box").length ) {
			$(".event-box").each( function(i){
				$(this).on('mouseover',function() {
					$(".event-cover > span > a").eq(i).removeClass("bg_dark2");
					$(".event-cover > span > a").eq(i).addClass("bg_green");
					$(".event-content > h3 > a").eq(i).removeClass("brd_color_dark");
					$(".event-content > h3 > a").eq(i).addClass("brd_color_green");
				});
				$(this).on('mouseleave', function() {
					$(".event-cover > span > a").eq(i).removeClass("bg_green");
					$(".event-cover > span > a").eq(i).addClass("bg_dark2");
					$(".event-content > h3 > a").eq(i).removeClass("brd_color_green");
					$(".event-content > h3 > a").eq(i).addClass("brd_color_dark");
				});
			});
		}
		
		/* - We Are Working */
		if( $(".we-are-working").length ) {
			$(".work-box").each( function(i){
				$(this).on('mouseover',function() {
					$(".work-box > i").eq(i).removeClass("bg_dark2");
					$(".work-box > i").eq(i).addClass("bg_green");
					$(".work-box > h3").eq(i).removeClass("tc_dark");
					$(".work-box > h3").eq(i).addClass("tc_green");
				});
				$(this).on('mouseleave', function() {
					$(".work-box > i").eq(i).removeClass("bg_green");
					$(".work-box > i").eq(i).addClass("bg_dark2");
					$(".work-box > h3").eq(i).removeClass("tc_green");
					$(".work-box > h3").eq(i).addClass("tc_dark");
				});
			});
		}
		
		/* - Quick Contact Form* */
		$( "#btn_submit" ).on( "click", function(event) {
		  event.preventDefault();
		  var mydata = $("form").serialize();
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "contact.php",
				data: mydata,
				success: function(data) {
					if( data["type"] == "error" ){
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").removeClass("alert-msg-success");
						$("#alert-msg").addClass("alert-msg-failure");
						$("#alert-msg").show();
					} else {
						$("#alert-msg").html(data["msg"]);
						$("#alert-msg").addClass("alert-msg-success");
						$("#alert-msg").removeClass("alert-msg-failure");					
						$("#input_fname").val("");
						$("#input_lname").val("");
						$("#input_email").val("");												
						$("#input_website").val("");										
						$("#textarea_message").val("");
						$("#alert-msg").show();				
					}			
				},
				error: function(xhr, textStatus, errorThrown) {
					alert(textStatus);
				}
			});
		});
		
	});	/* - Document On Ready /- */
	
	/* + Window On Scroll */
	$(window).on("scroll",function() {
		/* - Set Sticky Menu* */
		if( $(".header_s").length ) {
			sticky_menu();
		}
	});
	
	/* + Window On Resize */ 
	$( window ).on("resize",function() {
		var width	=	$(window).width();
		var height	=	$(window).height();
		
		/* - Expand Panel Resize */
		panel_resize();
		menu_dropdown_open();
		
		/* - Join Us Section 2 */
		if($(".joinus-section2").length){
			joinus2();
		}
		/* - About Section */
		if($(".about-section").length){
			about_img();
		}
		/* - Our Mission Section */
		if($(".our-mission-section").length){
			mission_img();
		}
	});
	
	/* + Window On Load */
	$(window).on("load",function() {
		/* - Site Loader* */
		if ( !$("html").is(".ie6, .ie7, .ie8") ) {
			$("#site-loader").delay(1000).fadeOut("slow");
		}
		else {
			$("#site-loader").css("display","none");
		}
		
		/* - Gallery Masonry */
		gallery_masonry();
		gallery_fitrow();
	});

})(jQuery);