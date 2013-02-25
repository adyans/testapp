var serviceURL = "http://localhost/esapp/services/";
serviceURL = "http://dignitymobile.co.id/projects/testapp/services/getproducts.php?t=camera";

var products;
$("#productList").html("Loading data...");
getProductData(serviceURL);
