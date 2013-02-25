var serviceURL = "http://localhost/esapp/services/";
serviceURL = "http://dignitymobile.co.id/projects/testapp/services/getproducts.php?t=gadget";
$("#productList").html("Loading data...");

getProductData(serviceURL);
