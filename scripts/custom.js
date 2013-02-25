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

function getProductData(serviceURL)
{
	var products;
	
	$.getJSON(serviceURL, function(data) {
		$("#productList").html("Loading data...");
		products = data.item;
		$.each(products, function(index, product) {
			$("#productList").append('<div class="post-product"><img src="'+product.image+'"><p>'+product.title+'</p><br/><p>'+product.description+'</p><div class="klik_button"><a href="detail_klik.html"><img src="images/nav/button_detail.png" /></a></div></div>');
		});		
	});
}

















