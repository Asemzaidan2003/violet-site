<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>edit product</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Include Quill.js -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">product /</span> edit product</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="card-header">edit New product</h5>
                        <button id="edit_product" class="btn rounded-pill btn-primary m-2 h-75">edit product</button>
                    </div>
                    <div class="card-body d-flex flex-wrap">
                      <div class="col m-1">
                        <label for="product name" class="form-label">product name</label>
                        <input type="text" class="form-control" id="product_name"/>
                      </div>
                      <div class="col m-1">
                        <label for="product pricet" class="form-label">product price</label>
                        <input type="number"  class="form-control" id="product_price"/>
                      </div>
                      <div class="col m-1">
                        <label for="product image" class="form-label">product image</label>
                        <input type="text" class="form-control" id="product_image_url"/>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="col m-1">
                        <h6 for="product-description">Product Description</h6>
                        <div id="product-description" class="form-control" style="min-height: 150px; overflow-y: auto;"></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <label for="product sizes" class="form-label p-1">product sizes price list</label>
                      <div class="col m-1 d-flex justify-content-around">
                          <div>
                              <label class="form-label">100 ML</label><input id="100_ml_price" class="form-control w-75" type="number">
                          </div>
                          <div>
                              <label class="form-label">50 ML</label><input id="50_ml_price" class="form-control w-75" type="number">
                          </div>
                          <div>
                              <label class="form-label">30 ML</label><input id="30_ml_price" class="form-control w-75" type="number">
                          </div>
                          <div>
                              <label class="form-label">10 ML</label><input id="10_ml_price" class="form-control w-75" type="number">
                          </div>
                          <div>
                            <label for="gender">Gender</label>
                            <select name="" id="product_gender">
                              <option value="male">male</option>
                              <option value="female">female</option>
                              <option value="unisex">unisex</option>
                            </select>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="image_display_row" class="row hidden">
                <div class="col-md-12" style="width: 20%; pediting: 5px;">
                    <div class="card" style="width: 100%; height: 150px;">
                        <div class="card-body p-0 d-flex justify-content-center align-items-center">
                            <img id="image_display" class="img-fluid" alt="Pasted Image" style=" object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../admin_side_bar.js"></script>
    <!-- Include Quill.js -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../function.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <script src="../assets/js/form-basic-inputs.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
  // Initialize Quill editor
  var quill = new Quill('#product-description', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{ 'header': [1, 2, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'align': [] }],
        ['image', 'blockquote', 'code-block']
      ]
    }
  });

  document.getElementById("product-description").addEventListener("paste", async (event) => {
    let items = event.clipboardData.items;
    for (let item of items) {
        if (item.type.startsWith("image")) {
            let file = item.getAsFile();
            let reader = new FileReader();
            reader.onload = function (e) {
                let range = quill.getSelection();
                quill.insertEmbed(range.index, 'image', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    }
  });
</script>
    <!-- costumed script for this page  -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let productImageUrl = null; // Changed from productImageFile to productImageUrl for handling URL

        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('product_id');
        if (!productId) {
            alert("Product ID is missing in the URL.");
            return;
        }

        fetch(`../../../API's/product_api's/get_product.php?product_id=${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data.status && data.data) {
                    const product = data.data;
                    product.product_size_list = JSON.parse(product.product_size_list);
                    document.getElementById('product_name').value = product.product_name;
                    document.getElementById('product_price').value = product.product_price;
                    document.getElementById('product_gender').value = product.product_gender;
                    quill.root.innerHTML = product.product_description;
                    document.getElementById('100_ml_price').value = product.product_size_list["100ml"];
                    document.getElementById('50_ml_price').value = product.product_size_list["50ml"];
                    document.getElementById('30_ml_price').value = product.product_size_list["30ml"];
                    document.getElementById('10_ml_price').value = product.product_size_list["10ml"];

                    // Handle displaying the product image
                    const imageDisplay = document.getElementById("image_display");
                    const imageDisplayRow = document.getElementById("image_display_row");
                    if (product.Product_image_path) {
                        imageDisplay.src = `${product.Product_image_path}`;
                        imageDisplayRow.classList.remove("hidden");
                    }
                    console.log(product)
                    // Set the image URL input field (if applicable)
                    const imageUrlInput = document.getElementById('product_image_url');
                    if (product.Product_image_path) {
                        imageUrlInput.value = product.Product_image_path;
                    }
                } else {
                    alert("Product not found or error fetching product data.");
                }
            })
            .catch(error => {
                console.error('Error fetching product details:', error);
                alert('An error occurred while fetching the product details.');
            });

        // Edit product button click handler
        const editProductButton = document.getElementById('edit_product');
        if (editProductButton) {
            editProductButton.addEventListener('click', function () {
                const product_name = document.getElementById('product_name')?.value;
                const product_price = document.getElementById('product_price')?.value;
                const product_gender = document.getElementById('product_gender')?.value;
                const product_description = quill.root.innerHTML;
                const one_hundred_ml_price = document.getElementById('100_ml_price')?.value;
                const fifty_ml_price = document.getElementById('50_ml_price')?.value;
                const thirty_ml_price = document.getElementById('30_ml_price')?.value;
                const ten_ml_price = document.getElementById('10_ml_price')?.value;
                const product_image_url = document.getElementById('product_image_url')?.value;
                const product_size_list = {
                    "10ml": ten_ml_price,
                    "30ml": thirty_ml_price,
                    "50ml": fifty_ml_price,
                    "100ml": one_hundred_ml_price,
                };

                let not_valid = false;
                if (!product_name?.trim()) {
                    displayError("product_name", "Name must be inserted!");
                    not_valid = true;
                } else {
                    displayError("product_name", "");
                }

                if (isNaN(product_price) || Number(product_price) <= 0) {
                    displayError("product_price", "Price must be a valid number greater than zero!");
                    not_valid = true;
                } else {
                    displayError("product_price", "");
                }

                // if (!product_image_url) {
                //     displayError("product_image", "Image URL or Image file must be provided!");
                //     not_valid = true;
                // } else {
                //     displayError("product_image", "");
                // }

                if (!not_valid) {
                    const productData = {
                        "product_id": productId,
                        "product_name": product_name,
                        "product_price": product_price,
                        "product_gender": product_gender,
                        "product_size_list": JSON.stringify(product_size_list),
                        "product_description": product_description,
                        "product_image_url": product_image_url // Send URL or file based on input
                    };

                    fetch("../../../API's/product_api's/edit_product.php", {
                        method: 'POST',
                        body: JSON.stringify(productData),
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                alert(`Success: ${data.message}`);
                                location.reload();
                            } else {
                                console.error('Error:', data.message);
                                alert(`Error: ${data.message}`);
                            }
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error);
                            alert(`An error occurred: ${error.message}`);
                        });
                }
            });
        }

        // Function to create a file list for the file input
        function createFileList(files) {
            const dataTransfer = new DataTransfer();
            files.forEach(file => dataTransfer.items.add(file));
            return dataTransfer.files;
        }

        // Handle file input changes
        const fileInput = document.getElementById("product_image");
        if (fileInput) {
            fileInput.addEventListener("change", function (event) {
                productImageFile = event.target.files[0];
                console.log("File selected via input:", productImageFile);
            });
        }

    });
</script>

  </body>
</html>
