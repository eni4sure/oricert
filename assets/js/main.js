(function($) {
	"use strict"
	
	// Preloader
	$(window).on('load', function() {
		$("#preloader").delay(600).fadeOut();
	});

	// Mobile Toggle Btn
	$('.navbar-toggle').on('click',function(){
		$('#header').toggleClass('nav-collapse')
	});

	$('#Tab').easyResponsiveTabs({
		//Types: default, vertical, accordion
		type: 'default',
		//auto or any width like 600px
		width: 'auto', 
		// 100% fit in a container
		fit: true,
		tabidentify: 'ver_1',
		// Start closed if in accordion view
		// closed: 'accordion', 
		// Callback function if tab is switched
		activate: function(){}
	});

	// var readURL = function(input) {
	// 	if (input.files && input.files[0]) {
	// 		var reader = new FileReader();

	// 		reader.onload = function (e) {
	// 			$('.avatar').attr('src', e.target.result);
	// 		}
	
	// 		reader.readAsDataURL(input.files[0]);
	// 	}
	// }
	

	// $(".file-upload").on('change', function(){
	// 	readURL(this);
	// });

	$('#sampleTable').DataTable();

})(jQuery);