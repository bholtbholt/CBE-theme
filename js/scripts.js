$('#carousel-auto-photo-slider').carousel({ interval: 5000 });
$('#carousel-services-banner').carousel({ interval: false });  //stop services banner carousel automation
$(window).resize(servicesBanner());  //get how many services will fit
$('.filter-list').css('display', 'none');
//functions

$('.print-page').click(function() {
	window.print();
})

$(".filter").click(function(event) {
	event.preventDefault();
	$(this).next().slideToggle();
	togglePlus($(this).find('span'));
});

function togglePlus(span) {
	if (span.hasClass('glyphicon-minus')) {
		span.removeClass('glyphicon-minus').addClass('glyphicon-plus');
	} else {
		span.removeClass('glyphicon-plus').addClass('glyphicon-minus');
	}
}

function servicesBanner() {
	if ($(window).width() > 992) {
		groupServices(4);  //4 services in the banner for large displays
	} else if ($(window).width() > 768) {
		groupServices(3);  //3 services in the banner for medium displays
	} else {
		$(".services-banner-service").wrap("<ul class='item'></ul>");  //single services in the banner for small displays
		$("#carousel-services-banner ul:first").addClass("active");    //activate the carousel
	}
}

function groupServices(split) {
	var $singleService = $('.services-banner-service');
	var servicesLength = $singleService.length;
	for (var i = 0;i < servicesLength;i+=split){
		$singleService.filter(':eq('+i+'),:lt('+(i+split)+'):gt('+i+')').wrapAll("<ul class='item'></ul>");  //add item wrappers
	}
	$("#carousel-services-banner ul:first").addClass("active");  //activate the carousel
}

//Form submission
	$("#submit").click(function(){
  var name = $("#name").val();
  var phone = $("#phone").val();
	var email = $("#email").val();
	var lawArea = $("#lawArea").val();
	var message = $("#message").val();
	var postData = 'name='+ name + '&phone=' + phone + '&email=' + email + '&lawArea=' + lawArea + '&message=' + message;

	$.ajax({  
		type: "POST",  
		url: templateDir + "/form.php",  
		data: postData,  
		success: function() {  
			$('#contact').html("<h3>Message Sent!</h3>")  
			.append("<p>Thanks for the note. Talk soon.</p>");  
		}  
	});  
	return false;
});