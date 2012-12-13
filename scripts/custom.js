// JavaScript Document

$(window).load(function() {
	$('.flexslider').flexslider();
});

$(document).ready(function () {
	$.get('slider.html.php', function(data) {
	  //alert(data);
	  $('.flexslider').html(data);
	});	

	$.get('gallery.html.php', function(data) {
	  //alert(data);
	  $('.home-item').html(data);
	});	

	var myPhotoSwipe = $("#gallery a").photoSwipe({ 
		enableMouseWheel: false, 
		enableKeyboard: false, 
		allowUserZoom: false, 
		loop:false, 
		cacheMode:Code.PhotoSwipe.Cache.Mode.aggressive 
	});



});


















