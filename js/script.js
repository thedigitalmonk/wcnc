jQuery(document).ready(function($) {

	//registration secuirty question
	$("#signup_submit").attr("disabled", "true");

	//$("#signup_submit").val("Wassup");

	$(".field_what-is-the-first-name-of-the-head-of-the-nature-club > input").blur(function(){

		console.log("this was clicked");

		var answer = $(".field_what-is-the-first-name-of-the-head-of-the-nature-club > input").val();
		var compare = "Sudhakar";

		//console.log("input: " + answer + " compare: " + compare);

		if(answer == compare){
			$("#signup_submit").removeAttr("disabled", "false");
		} else {
			alert("Sorry, you entered the wrong name. He is also called the Crazy Old man. Please try again.");
		}
	});


//Top Nav Search

$('.search-show').on('click', function(e) {

	e.preventDefault();

	if($('.search-form').is(':visible')) {

		$('.search-form').hide();

	} else {

		$('.search-form').show();
		$(".search-form .form-control").focus();
	}
});

	$('#whats-new').unbind('focus');

	$('#whats-new').css('height', 50);

	$('#whats-new').focus( function(){
		$("form#whats-new-form textarea").animate({height:'100px'});
		$("#aw-whats-new-submit").prop("disabled", false);
	});



/* Nav Menu and Quick links Panel Animation
*******************************************/

var overlay = $(".overlay");

var menuRight = $(".navbar-collapse");

var showNav = $(".navbar-toggle");

var apSection = $(".appendSection");
	
	showNav.on('click', function(e) {

		e.preventDefault();

			showNav.toggleClass("active");

			menuRight.toggleClass("menu-open");

			overlay.toggleClass("cover");

	});

	overlay.on('click', function(e) {

		e.preventDefault();

			menuRight.removeClass("menu-open");

			overlay.removeClass("cover");

			apSection.removeClass("as-open");

	});

	$(".quick-links").on('click', function(e) {

		e.preventDefault();

			apSection.toggleClass("as-open");

			overlay.toggleClass("cover");

	});

	$(".quick-close").on('click', function(e) {

		e.preventDefault();

			menuRight.removeClass("menu-open");

			overlay.removeClass("cover");

			apSection.removeClass("as-open");

	});




//END OF DOCUMENT.READY
});
