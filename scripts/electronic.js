var serviceURL = "http://localhost/esapp/services/";
serviceURL = "http://dignitymobile.co.id/projects/esapp/services/getproducts.php?t=electronic";

var products;

$(document).ready(function() {
	$.getJSON(serviceURL, function(data) {
		products = data.item;
		$.each(products, function(index, product) {
			$("#productList").append('<div class="post-product"><img src="'+product.image+'"><p>'+product.title+'</p><br/><p>'+product.description+'</p><div class="klik_button"><a href="detail_klik.html"><img src="images/nav/button_detail.png" /></a></div></div>');
		});		
	});

});
