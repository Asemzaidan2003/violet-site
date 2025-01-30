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

    <title>product inventory</title>

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
    <script src="../function.js"></script>
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">product /</span> product inventory</h4>
                <div class="card">
                <h5 class="card-header">Table Basic</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Id</th>
                        <th>product Name</th>
                        <th>price</th>
                        <th>quantity_sold</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="productTable" class="table-border-bottom-0">

                    </tbody>
                  </table>
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
        function edit_product(product_id){
            window.location.href = `edit_product.php?product_id=${product_id}`;
        }
        function fetchAllProducts() {
            fetch(`../../../API's/product_api's/get_all_products.php`)
                .then(response => response.json())
                .then(data => {
                    const productTableBody = document.getElementById("productTable");
                    productTableBody.innerHTML = "";

                    const products = data.data;
                    if (Array.isArray(products) && products.length > 0) {
                        products.forEach(product => {
                            const row = document.createElement("tr");
                            const productSizes = Object.keys(product.product_size_list)
                                .map(size => `${size}: ${product.product_size_list[size]}`)
                                .join(", ");
                            row.innerHTML = `
                                <td>
                                    <img 
                                        src="${product.Product_image_path}" 
                                        alt="${product.product_name}" 
                                        style="width: 50px; height: 50px; object-fit: contain;" 
                                    />
                                </td>
                                <td>${product.product_id}</td>
                                <td>${product.product_name}</td>
                                <td>${product.product_price}</td>
                                <td>${product.quantity_sold}</td>
                                <td>
                                    <button 
                                        style="border:none;"
                                        class="badge toggle-status-btn ${product.is_active === "1" ? 'bg-label-success' : 'bg-label-danger'} me-1" 
                                        data-product-id="${product.product_id}" 
                                        data-current-status="${product.is_active}"
                                    >
                                        ${product.is_active === "1" ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <button class="btn rounded-pill btn-primary m-2 h-75" onclick="edit_product(${product.product_id})">Edit</button>
                                </td>
                                `;
                            

                            productTableBody.appendChild(row);
                        });
                    } else {
                        productTableBody.innerHTML = '<tr><td colspan="8">No products found.</td></tr>';
                    }
                })
                .catch(error => console.error("Error fetching product data:", error));
        }

        fetchAllProducts();

        // Delegate the click event to a parent element
        document.addEventListener("click", function (event) {
            const button = event.target.closest(".toggle-status-btn");
            if (!button) return; // If the click is not on a toggle-status-btn, do nothing

            const productId = button.getAttribute("data-product-id");
            const currentStatus = button.getAttribute("data-current-status");

            const newStatus = currentStatus === "1" ? "0" : "1";
            fetch(`../../../API's/product_api's/toggle_product_status.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    product_id: productId,
                    is_active: newStatus,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        button.classList.toggle("bg-label-success", newStatus === "1");
                        button.classList.toggle("bg-label-danger", newStatus === "0");
                        button.textContent = newStatus === "1" ? "Active" : "Inactive";

                        button.setAttribute("data-current-status", newStatus);
                    } else {
                        alert(`Error: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error("Error toggling product status:", error);
                    alert("An error occurred while updating the product status.");
                });

        });
    </script>
  </body>
</html>
