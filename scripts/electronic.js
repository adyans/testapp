var serviceURL = "http://localhost/esapp/services/";
serviceURL = "http://dignitymobile.co.id/projects/testapp/services/getproducts.php?t=electronic";
//serviceURL = "services/getproducts.php?t=electronic";

var products;
$("#productList").html("<div class='font12' style='padding:15px;'>Loading data...</div>");
getProductData(serviceURL);
/*
$(document).ready(function() {
	$.getJSON(serviceURL, function(data) {
		products = data.item;
		$.each(products, function(index, product) {
			$("#productList").append('<div class="post-product"><img src="'+product.image+'"><p>'+product.title+'</p><br/><p>'+product.description+'</p><div class="klik_button"><a href="detail_klik.html"><img src="images/nav/button_detail.png" /></a></div></div>');
		});		
	});

});
*/