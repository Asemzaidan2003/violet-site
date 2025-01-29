function renderProducts(element_id,products) {
    const container = document.getElementById(element_id);

    // Iterate over the products and generate HTML
    products.forEach(product => {
        const productHTML = `
        <div class="col-lg-3 col-md-6 col-sm-12 my-3 w-50">
            <div class="border rounded h-100 d-flex flex-column p-3 card">
                <!-- Product Image -->
                <a href="product.php?product_id=${product.product_id}" class="text-decoration-none">
                    <div class="mb-3">
                        <img src="../API's/product_api's${product.Product_image_path}" class="img-fluid rounded product_image" alt="${product.name}">
                    </div>
                </a>
                
                <!-- Product Info -->
                <div class="flex-grow-1 d-flex flex-column text-center">
                    <!-- Product Name -->
                    <h6 class="fw-bold mb-2 product-name text-truncate" style="min-height: 48px;">
                        ${product.product_name}
                    </h6>

                    <!-- Rating -->
                    <div class="mb-2">
                        ${Array.from({ length: 5 }, (_, i) => 
                            i < product.rating 
                                ? '<i class="fa fa-star text-warning"></i>' 
                                : '<i class="fa fa-star-o text-muted"></i>'
                        ).join('')}
                    </div>

                    <!-- Product Price -->
                    <h4 class="fw-bold mt-2 mb-0">
                        JD ${product.product_price}
                    </h4>
                </div>
                
                <!-- Add to Cart Button 
                <div class="mt-3 text-center">
                    <button class="btn btn-primary w-100">
                        Add to Cart
                    </button>
                </div>-->
                <div class="mt-3 text-center">
                    <p class="text-danger w-100">
                    ${product.is_active == 0 ? "Out of stock" : ""}
                    </p>
                </div>
            </div>
        </div>
        `;
        // Append the product HTML to the container
        container.innerHTML += productHTML;
    });
}
function getFromUrl(index){
	// Get the query string directly from the URL
	const params = new URLSearchParams(window.location.search);
	// Fetch the values you need
	const key = params.get(index); 
    return key;
}