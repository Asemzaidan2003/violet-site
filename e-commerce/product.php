<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<!-- Include Quill.js -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
	/* For Chrome, Safari, Edge, and other WebKit browsers */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* For Firefox */
input[type="number"] {
    -moz-appearance: textfield;
}

</style>
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header id="navigation-bar" class="header">

	</header>

	<!-- Menu -->

	<div id="side-bar" class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	</div>

	<!-- Product -->

	<div class="product">
		<div class="container">
			<div id="product_container" class="row product_row row product_row d-flex justify-content-center p-3">
			</div>

			<!-- Reviews -->

			<!-- <div class="row">
				<div class="col">
					<div class="reviews">
						<div class="reviews_title">reviews</div>
						<div class="reviews_container">
							<ul>

								<li class=" review clearfix">
									<div class="review_image"><img src="images/review_1.jpg" alt=""></div>
									<div class="review_content">
										<div class="review_name"><a href="#">Maria Smith</a></div>
										<div class="review_date">Nov 29, 2017</div>
										<div class="rating rating_4 review_rating" data-rating="4">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="review_text">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis quam ipsum. Pellentesque consequat tellus non tortor tempus, id egestas elit iaculis. Proin eu dui porta, pretium metus vitae, pharetra odio. Sed ac mi commodo, pellentesque erat eget, accumsan justo. Etiam sed placerat felis. Proin non rutrum ligula. </p>
										</div>
									</div>
								</li>

								<li class=" review clearfix">
									<div class="review_image"><img src="images/review_2.jpg" alt=""></div>
									<div class="review_content">
										<div class="review_name"><a href="#">Maria Smith</a></div>
										<div class="review_date">Nov 29, 2017</div>
										<div class="rating rating_4 review_rating" data-rating="4">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="review_text">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis quam ipsum. Pellentesque consequat tellus non tortor tempus, id egestas elit iaculis. Proin eu dui porta, pretium metus vitae, pharetra odio. Sed ac mi commodo, pellentesque erat eget, accumsan justo. Etiam sed placerat felis. Proin non rutrum ligula. </p>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->

			<!-- Leave a Review -->

			<!-- <div class="row">
				<div class="col">
					<div class="review_form_container">
						<div class="review_form_title">leave a review</div>
						<div class="review_form_content">
							<form action="#" id="review_form" class="review_form">
								<div class="d-flex flex-md-row flex-column align-items-start justify-content-between">
									<input type="text" class="review_form_input" placeholder="Name" required="required">
									<input type="email" class="review_form_input" placeholder="E-mail" required="required">
									<input type="text" class="review_form_input" placeholder="Subject">
								</div>
								<textarea class="review_form_text" name="review_form_text" placeholder="Message"></textarea>
								<button type="submit" class="review_form_button">leave a review</button>
							</form>
						</div>
					</div>
				</div>
			</div> -->
		</div>		
	</div>

	<!-- Newsletter -->

	<!-- <div class="newsletter">
		<div class="newsletter_content">
			<div class="newsletter_image" style="background-image:url(images/newsletter.jpg)"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title_container text-center">
							<div class="section_subtitle">only the best</div>
							<div class="section_title">subscribe for a 20% discount</div>
						</div>
					</div>
				</div>
				<div class="row newsletter_container">
					<div class="col-lg-10 offset-lg-1">
						<div class="newsletter_form_container">
							<form action="#">
								<input type="email" class="newsletter_input" required="required" placeholder="E-mail here">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>
						<div class="newsletter_text">Integer ut imperdiet erat. Quisque ultricies lectus tellus, eu tristique magna pharetra nec. Fusce vel lorem libero. Integer ex mi, facilisis sed nisi ut, vestib ulum ultrices nulla. Aliquam egestas tempor leo.</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Footer -->

	<footer id="footer" class="footer">
		
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/product_custom.js"></script>
    <!-- Include Quill.js -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="js/nav-bar.js"></script>
<script src="js/functions.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
    const productId = getFromUrl('product_id');
    getProductData(productId);

    function renderProduct(product) {
        const productsContainer = document.getElementById("product_container");
        productsContainer.innerHTML = ""; // Clear the previous content

        // Create the main product element container
        const productElement = document.createElement('div');
        productElement.classList.add('row', 'product');

        // Product Image Section
        const productImageHTML = `
            <div class="col-lg-7">
                <div class="product_image">
                    <div id="main_image" class="product_image_large d-flex justify-content-center">
                        <img src="${product.Product_image_path}" alt="${product.product_name}">
                    </div>
                    <div id="image_thumbnails" class="product_image_thumbnails d-flex flex-row align-items-start justify-content-start">
                        <!-- Thumbnails for additional images -->
                        <img  src="${product.Product_image_path}" alt="${product.product_name}" class="product_image_thumbnail" style="background-image:url(${product.Product_image_path})" data-image="${product.Product_image_path}"></img>
                    </div>
                </div>
				    <div class="product_quantity_container">
                        <span>Quantity</span>
                        <div class="product_quantity clearfix">
                            <input class="" id="quantity_input" type="number" min="0" value="1">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control">
                                    <i class="fa fa-caret-up" aria-hidden="true"></i>
                                </div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control">
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_size_container">
                        <span>Size</span>
                        <div class="product_size">
                            <ul class="d-flex flex-row align-items-start justify-content-start" id="size_list">
                                ${getProductSizes(product.product_size_list, product.product_price)}
                            </ul>
                        </div>
                        <div class="button cart_button"><a class="text-white" href="#">add to cart</a></div>
                    </div>
            </div>
        `;

        // Product Content Section
        const productContentHTML = `
            <div class="col-lg-5">
                <div class="product_content">
                    <div class="product_name">${product.product_name}</div>
                    <div id="product_price" class="product_price">JD ${product.product_price}</div>
                    <div id="product_description" class="product_text">
                        <p>${product.product_description || 'No description available.'}</p>
                    </div>

                </div>
            </div>
        `;

        // Append the product image and content to the main product container
        productElement.innerHTML = productImageHTML + productContentHTML;
        productsContainer.appendChild(productElement);

        // Add size selection event listeners
        const sizeInputs = document.querySelectorAll('input[name="product_radio"]');
        sizeInputs.forEach(input => {
            input.addEventListener('change', function () {
                updatePrice(product.product_size_list, this.id.replace('radio_', ''));
            });
        });
    }

    // Helper function to render sizes from the product size list
	function getProductSizes(sizeList) {
		const sizes = JSON.parse(sizeList); // Assuming it's stored as a JSON string
		let sizeHTML = '';
		for (const size in sizes) {
			sizeHTML += `
				<li>
					<input 
						type="radio" 
						id="radio_${size}" 
						name="product_radio" 
						class="regular_radio radio_${size}"
						${size === "100ml" ? "checked" : ""}
					>
					<label for="radio_${size}">${size}</label>
				</li>
			`;
		}
		return sizeHTML;
	}

    // Helper function to update the product price based on size
    function updatePrice(sizeList, selectedSize) {
        const sizes = JSON.parse(sizeList);
        const selectedPrice = sizes[selectedSize];
        const priceElement = document.getElementById('product_price');
        if (selectedPrice) {
            priceElement.textContent = `JD ${selectedPrice}`;
        }
    }

    function getProductData(productId) {
        fetch(`../API's/product_api's/get_product.php?product_id=${productId}`)
            .then(res => {
                if (!res.ok) throw new Error(res.statusText);
                return res.json();
            })
            .then(data => {
                console.log(data);
                renderProduct(data.data);
            });
    }

    // Add event listeners for quantity increment and decrement
    document.addEventListener('click', function (e) {
        if (e.target.closest('#quantity_inc_button')) {
            const quantityInput = document.getElementById('quantity_input');
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }

        if (e.target.closest('#quantity_dec_button')) {
            const quantityInput = document.getElementById('quantity_input');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
    });
});

</script>
</body>
</html>