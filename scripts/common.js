
function getProductData(serviceURL)
{
	var products;

	$.getJSON(serviceURL, function(data) {
		$("#productList").html("");
		products = data.item;

		$.each(products, function(index, product) {
			$("#productList").append('<div class="post-product"><img src="'+product.image+'"><p class="font10">'+product.title+'</p><br/><p class="font8">'+product.description+'</p><div class="klik_button"><a href="detail_klik.html"><img src="images/nav/button_detail.png" /></a></div></div>');
		});		
	});
}

function getNewProducts(serviceURL)
{
	var products;

	$.getJSON(serviceURL, function(data) {
		$("#gallery").html("");
		products = data.item;
		$.each(products, function(index, product) {
			$("#gallery").append('<li><a href="#" class="font8"><img src="'+product.image+'" alt="'+product.title+'" />'+product.title+'</a></li>');
		});		
	});
}
