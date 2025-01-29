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

    <title>Oil inventory</title>

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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Oil /</span> Oil inventory</h4>
                <div class="card">
                <h5 class="card-header">Table Basic</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Oil ID</th>
                        <th>Oil Name</th>
                        <th>Cost per ml</th>
                        <th>Quantity per ml</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody id="oilTable" class="table-border-bottom-0">

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
document.addEventListener("DOMContentLoaded", function () {
    function fetchAllOil() {
        fetch(`../../../API's/oil_api's/get_oil's.php`)
            .then(response => response.json())
            .then(data => {
                console.log("API Response:", data); // Log the entire response for debugging
                const oilTableBody = document.getElementById("oilTable");
                oilTableBody.innerHTML = "";

                // Check if `data` is an array
                const oils = data.data; // Assuming data.data is an array

                if (Array.isArray(oils) && oils.length > 0) {
                    oils.forEach(oil => {
                        const row = document.createElement("tr");

                        row.innerHTML = `
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>${oil.oil_id}</strong>
                            </td>
                            <td>${oil.oil_name}</td>
                            <td>${oil.cost_per_ml}</td>
                            <td>${oil.quantity_in_ml} ml</td>
                            <td>
                                <span class="badge ${oil.is_available === "1" ? 'bg-label-success' : 'bg-label-danger'} me-1">
                                    ${oil.is_available === "1" ? 'Available' : 'Pending'}
                                </span>
                            </td>
                            <td>
                                <!-- Additional content (e.g., actions) can be added here -->
                            </td>
                        `;

                        oilTableBody.appendChild(row);
                    });
                } else {
                    // If no oils found
                    oilTableBody.innerHTML = '<tr><td colspan="5">No oils found.</td></tr>';
                }
            })
            .catch(error => console.error("Error fetching oil data:", error));
    }

    fetchAllOil();
});

    </script>
  </body>
</html>
