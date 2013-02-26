<div id="judul" class="judul" style="margin-bottom:10px;padding:5px;">New Products</div>
<div style="clear:both;"></div>
				<ul id="gallery" class="gallery">

					<!--li><a href="#">
								<img src="images/content/001.png" alt="Caption Title One" />
							</a></li>
					<li><a href="#">
								<img src="images/content/002.png" alt="Caption Title Two" />
							</a></li>
					<li><a href="detail_klik.html">
								<img src="images/content/003.png" alt="Caption Title Three" />
							</a></li>
					<li><a href="#">
								<img src="images/content/004.png" alt="Caption Title Four" />
							</a></li>
					<li><a href="#">
								<img src="images/content/005.png" alt="Caption Title Five" />
							</a></li>
					<li><a href="#">
								<img src="images/content/006.png" alt="Caption Title Six" />
							</a></li-->
				</ul> 

<script type="text/javascript">


	var serviceURL = "http://www.electronicsolution.com/rss/catalog/category/cid/197/store_id/2/";
	serviceURL = "http://dignitymobile.co.id/projects/testapp/services/getproducts.php?t=gallery";
	//serviceURL = "services/getproducts.php?t=gallery";

	$("#gallery").html("<div class='font10' style='padding:15px;'>Loading data...</div>");

	getNewProducts(serviceURL);



</script>