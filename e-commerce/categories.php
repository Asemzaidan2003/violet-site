<!DOCTYPE html>
<html lang="en">
<head>
<title>Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header id="navigation-bar" class="header">
	</header>

	<!-- Menu -->

	<div id="side-bar" class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	</div>



	<!-- Products -->

	<div class="arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
					</div>
				</div>
			</div>
			<div id="products_container" class="row products_container">
				<!-- products -->
			</div>
			<div id="pagination_container" class="row justify-content-center mt-4">
				<!-- Pagination buttons will be dynamically generated here -->
			</div>
		</div>
	</div>


	<!-- Footer -->

	<footer id="footer" class="footer">
		
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
<script src="js/nav-bar.js"></script>
<script src="js/functions.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded',function(){

			const productGender = getFromUrl('product_gender'); 
			const URL = `../API's/main_page/get_all_products.php?product_gender=${productGender}`
			getAllProducts(URL,productGender);
			function getAllProducts(URL,productGender){
				console.log(productGender)
				fetch(URL)
				.then(response=>{
					if(!response.ok)
					throw new Error(response.statusText);
				return response.json();
				})
				.then(data=>{
					console.log(data);
					renderProducts("products_container",data.data);
				})
			}
		});
	</script>
</body>
</html>