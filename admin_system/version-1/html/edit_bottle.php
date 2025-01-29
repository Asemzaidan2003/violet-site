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

    <title>Edit bottle</title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">bottle /</span> Edit bottle</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="card-header">search for bottle to edit</h5>
                        <button id="search_bottle" class="btn rounded-pill btn-primary m-2 h-75">Search bottle</button>
                    </div>
                    <div class="card-body d-flex flex-wrap">
                      <div class="col m-1">
                        <label for="bottle code" class="form-label">bottle code</label>
                        <input type="text" class="form-control" id="bottle_code"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- The edit form will be created and will work dynamically -->
               <div id="edit-bottle"></div>
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
    <!-- costumed script for this page  -->
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            document.getElementById('search_bottle').addEventListener('click',function(){
              var bottle_code = document.getElementById('bottle_code').value;
              
              fetch(`../../../API's/bottels_api's/get_bottle.php?bottle_id=${bottle_code}`, {
                  method: 'GET',
                  headers: {
                      'Content-Type': 'application/json'
                  }
              })
                  .then(response => {
                      if (!response.ok) {
                          throw new Error('Failed to fetch bottle data');
                      }
                      return response.json();
                  })
                  .then(data => {
                      if (data.status) {
                          console.log('Bottle data retrieved successfully:', data);
                          renderBottleData(data);
                      } else {
                          console.error('Error:', data.message);
                      }
                  })

            });
            

            function renderBottleData(data){
              let bottleData = data.data;
              var html = 
                  `<div class="row">
                      <div class="col-md-12">
                          <div class="card mb-4">
                              <div class="d-flex flex-wrap justify-content-between align-items-center">
                                  <h5 class="card-header">Edit details</h5>
                                  <button id="edit_bottle" class="btn rounded-pill btn-primary m-2 h-75">Save</button>
                              </div>
                              <div class="card-body d-flex flex-wrap">
                                  <div class="col m-1">
                                      <label for="bottle name" class="form-label">bottle name</label>
                                      <input type="text" class="form-control" id="bottle_name" value="${bottleData.bottle_name}"/>
                                  </div>
                                  <div class="col m-1">
                                      <label for="bottle cost" class="form-label">bottle cost in ml</label>
                                      <input type="number" min="0.01" class="form-control" id="bottle_cost" value="${bottleData.cost}"/>
                                  </div>
                                  <div class="col m-1">
                                      <label for="bottle quantity" class="form-label">bottle quantity</label>
                                      <input type="text" class="form-control" id="bottle_quantity" value="${bottleData.quantity}"/>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>`;
              
              document.getElementById('edit-bottle').innerHTML = html;

              document.getElementById("edit_bottle").addEventListener("click", async function() {
                  var bottle_name = document.getElementById("bottle_name").value;
                  var bottle_cost = document.getElementById("bottle_cost").value;
                  var bottle_quantity = document.getElementById("bottle_quantity").value;

                  var bottle_data = {
                      bottle_id:bottleData.bottle_id,
                      bottle_name: bottle_name,
                      cost: bottle_cost,
                      quantity: bottle_quantity
                  };
                    updateBottleData(bottle_data);
              });
            }

            function updateBottleData(data) {
              fetch(`../../../API's/bottels_api's/update_bottle.php`, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(data)
              })
              .then(response => {
                  if (!response.ok) {
                      throw new Error('Failed to update bottle data');
                  }
                  return response.json();
              })
              .then(data => {
                  if (data.status) {
                      alert("Bottle Updated!")
                  } else {
                      console.error('Error:', data.message);
                  }
              })
              .catch(error => {
                  console.error('Fetch error:', error.message);
              });
          }

        })
    </script>
  </body>
</html>
