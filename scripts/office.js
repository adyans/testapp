var serviceURL = "http://localhost/esapp/services/";
serviceURL = "http://dignitymobile.co.id/projects/testapp/services/getproducts.php?t=office";

$("#productList").html("<div class='font12' style='padding:15px;'>Loading data...</div>");
getProductData(serviceURL);
