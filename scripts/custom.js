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


	var serviceURL = "http://www.electronicsolution.com/rss/catalog/category/cid/197/store_id/2/";
	serviceURL = "http://dignitymobile.co.id/projects/testapp/services/getproducts.php?t=gallery";
	//serviceURL = "services/getproducts.php?t=gallery";

	$("#home-gallery").html("<div class='font10' style='padding:15px;'>Loading data...</div>");

	getNewProducts(serviceURL);


});