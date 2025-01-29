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

    <title>Add Bottle</title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bottle /</span> Add Bottle</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="card-header">Add New Bottle</h5>
                        <button id="add_Bottle" class="btn rounded-pill btn-primary m-2 h-75">Add Bottle</button>
                    </div>
                    <div class="card-body d-flex flex-wrap">
                      <div class="col m-1">
                        <label for="Bottle name" class="form-label">Bottle name</label>
                        <input type="text" class="form-control" id="Bottle_name"/>
                      </div>
                      <div class="col m-1">
                        <label for="Bottle cost" class="form-label">Bottle cost</label>
                        <input type="number" min="0.01" class="form-control" id="Bottle_cost"/>
                      </div>
                      <div class="col m-1">
                        <label for="Bottle quantity" class="form-label">Bottle quantity</label>
                        <input type="text" class="form-control" id="Bottle_quantity"/>
                      </div>
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
            
            var addButton = document.getElementById('add_Bottle');
            addButton.addEventListener('click',addBottle);
            function addBottle(){
                const Bottle_cost = document.getElementById('Bottle_cost').value;
                const Bottle_name = document.getElementById('Bottle_name').value;
                const Bottle_quantity = document.getElementById('Bottle_quantity').value;
                let not_valid = false;
                if(Bottle_cost===""){
                    displayError("Bottle_cost","Cost must be inserted ! ");
                    not_valid = true;
                }else{
                    displayError("Bottle_cost","");
                    not_valid = false;
                }

                if(Bottle_name===""){
                    displayError("Bottle_name","Name must be inserted ! ");
                    not_valid = true;
                }else{
                    displayError("Bottle_name","");
                    not_valid = false;
                }

                if(Bottle_quantity===""){
                    displayError("Bottle_quantity","Quantity must be inserted ! ");
                    not_valid = true;
                }else{
                    displayError("Bottle_quantity","");
                    not_valid = false;
                }

                if(!not_valid){
                    const Bottle = {
                        "bottle_name": Bottle_name,
                        "cost": Bottle_cost,
                        "quantity": Bottle_quantity
                        };
                        
                  fetch("../../../API's/bottels_api's/add_bottle.php", {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/json'
                      },
                      body: JSON.stringify(Bottle)
                  })
                  .then(response => response.text())
                  .then(text => {
                      let data;
                      try {
                          data = JSON.parse(text);
                      } catch (e) {
                          console.error('Invalid JSON response:', text);
                          alert(`Error: ${text}`);
                          return;
                      }
                      if (data.status) {
                          console.log('Bottle data added successfully:', data.message);
                          alert(`Success: ${data.message}`);
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
            }
        })
    </script>
  </body>
</html>
