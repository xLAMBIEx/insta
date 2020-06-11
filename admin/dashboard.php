<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instaplan - Admin Dashboard</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main CSS Link -->
    <link rel="stylesheet" href="../styles/main.css">
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/ac23f1b380.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="wrap-content container">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white bg-light px-5 mb-5 pb-2 border-bottom">
        <a class="navbar-brand mx-auto" href="../index.php">
          <img src="../media/logo/logo.png" width="125" height="125" class="d-inline-block align-top" alt="Logo">
        </a>
      </nav>

      <!-- Spacer -->
      <div class="m-3 p-3"></div>

      <div class="row mb-5">
        <div class="col-md-3">
          <div class="dashboard-menu nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-designs-tab" data-toggle="pill" href="#v-pills-designs" role="tab" aria-controls="v-pills-statistics" aria-selected="true">Designs Manager</a>
            <a class="nav-link" id="v-pills-price-tab" data-toggle="pill" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="false">Pricing</a>
            <a class="nav-link" id="v-pills-payments-tab" data-toggle="pill" href="#v-pills-payments" role="tab" aria-controls="v-pills-requests" aria-selected="false">Payment History</a>
            <a class="nav-link" id="v-pills-contacts-tab" data-toggle="pill" href="#v-pills-contacts" role="tab" aria-controls="v-pills-search" aria-selected="false">Contact Requests</a>
            <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-listing" aria-selected="false">Users Manager</a>
            <a class="nav-link" id="adminSignOut" href="#" role="tab">Sign Out</a>
          </div>
          <!-- Mobile Menu -->
          <div class="dashboard-mobile-menu dropdown d-none">
            <button class="btn btn-secondary btn-block dropdown-toggle mb-5" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </button>
            <div class="dropdown-menu w-100 text-center text-secondary nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" aria-labelledby="dropdownMenu2">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-designs-tab" data-toggle="pill" href="#v-pills-designs" role="tab" aria-controls="v-pills-statistics" aria-selected="true">Designs Manager</a>
                <a class="nav-link" id="v-pills-price-tab" data-toggle="pill" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="false">Pricing</a>
                <a class="nav-link" id="v-pills-payments-tab" data-toggle="pill" href="#v-pills-payments" role="tab" aria-controls="v-pills-requests" aria-selected="false">Payment History</a>
                <a class="nav-link" id="v-pills-contacts-tab" data-toggle="pill" href="#v-pills-contacts" role="tab" aria-controls="v-pills-payment" aria-selected="false">Contact Request</a>
                <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-listing" aria-selected="false">Users Manager</a>
                <a class="nav-link" id="adminSignOut" href="#" role="tab">Sign Out</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-designs" role="tabpanel" aria-labelledby="v-pills-designs-tab">
              <h2 class="text-center">Designs Manager</h2>
              <hr>
              <form>
                <h4 id="design-manager-form-title" class="mb-4">Add Design</h4>
                <input type="text" id="updateDesignId" hidden>
                <div class="form-group">
                  <label for="addDesignTitle">Title</label>
                  <input type="text" class="form-control" id="addDesignTitle">
                </div>
                <div class="form-group">
                  <label for="addDesignDescription">Description</label>
                  <textarea class="form-control" id="addDesignDescription" rows="4" cols="40"></textarea>
                </div>
                <div class="form-group">
                  <label for="addDesignAdditional">Additional Information</label>
                  <textarea class="form-control" id="addDesignAdditional" rows="8" cols="40"></textarea>
                </div>
                <div class="form-group">
                  <label for="addDesignIncluding">Including</label>
                  <textarea class="form-control" id="addDesignIncluding" rows="2" cols="40"></textarea>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="addDesignSize">Size</label>
                    <input type="text" class="form-control" id="addDesignSize">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="addDesignBedrooms">Bedrooms</label>
                    <input type="text" class="form-control" id="addDesignBedrooms">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="addDesignBathrooms">Bathrooms</label>
                    <input type="text" class="form-control" id="addDesignBathrooms">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="addDesignFloors">Floors</label>
                    <input type="text" class="form-control" id="addDesignFloors">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="addDesignKitchen">Kitchen</label>
                    <input type="text" class="form-control" id="addDesignKitchen">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="addDesignLounge">Lounge</label>
                    <input type="text" class="form-control" id="addDesignLounge">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="addDesignDining">Dining</label>
                    <input type="text" class="form-control" id="addDesignDining">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="addDesignPatio">Patio</label>
                    <input type="text" class="form-control" id="addDesignPatio">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="addDesignGarage">Garage</label>
                    <input type="text" class="form-control" id="addDesignGarage">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="addDesignWidth">Width</label>
                    <input type="text" class="form-control" id="addDesignWidth">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="addDesignDepth">Depth</label>
                    <input type="text" class="form-control" id="addDesignDepth">
                  </div>
                  <div class="form-group col-md-6">
                  <label for="addDesignDiscount">First Purchase Discount</label>
                  <select class="form-control" id="addDesignDiscount">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                  </select>
                </div>
                </div>
                <div class="form-group mt-4">
                  <label for="uploadFeaturedImage">Featured Image</label>
                  <input type="file" class="form-control-file" id="uploadFeaturedImage">
                  <p id="uploadFeaturedImageMsg" class="mt-2">Loading...</p>
                  <div id="addDesignFeaturedImage" hidden></div>
                </div>
                <div class="form-row mt-4">
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage1">Gallery Image 1</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage1">
                    <p id="uploadGalleryImage1Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage1" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage2">Gallery Image 2</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage2">
                    <p id="uploadGalleryImage2Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage2" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage3">Gallery Image 3</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage3">
                    <p id="uploadGalleryImage3Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage3" hidden></div>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage4">Gallery Image 4</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage4">
                    <p id="uploadGalleryImage4Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage4" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage5">Gallery Image 5</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage5">
                    <p id="uploadGalleryImage5Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage5" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage6">Gallery Image 6</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage6">
                    <p id="uploadGalleryImage6Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage6" hidden></div>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage7">Gallery Image 7</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage7">
                    <p id="uploadGalleryImage7Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage7" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage8">Gallery Image 8</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage8">
                    <p id="uploadGalleryImage8Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage8" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage9">Gallery Image 9</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage9">
                    <p id="uploadGalleryImage9Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage9" hidden></div>
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage10">Gallery Image 10</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage10">
                    <p id="uploadGalleryImage10Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage10" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage11">Gallery Image 11</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage11">
                    <p id="uploadGalleryImage11Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage11" hidden></div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uploadGalleryImage12">Gallery Image 12</label>
                    <input type="file" class="form-control-file" id="uploadGalleryImage12">
                    <p id="uploadGalleryImage12Msg" class="mt-2">Loading...</p>
                    <div id="addDesignGalleryImage12" hidden></div>
                  </div>
                </div>
                <p class="text-center text-muted mt-3">Please note only the <strong>.JPG</strong> image format is currently supported!</p>
              </form>
              <button id="addDesignSave" type="button" class="btn btn-block btn-secondary mt-5">Save</button>
              <button type="button" id="updateDesignSubmit" class="btn btn-block btn-secondary">Update</button>
              <button type="button" id="updateDesignCancel" class="btn btn-block btn-secondary">Cancel</button>

              <div id="active-designs-section">
                <!-- Spacer -->
                <hr class="my-5">

                <h4 class="mb-2">Active Designs</h4>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Price</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="active-designs-table">
                    <!-- AJAX Placeholder -->
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
              <h2 class="text-center">Pricing</h2>
              <hr>
              
              <h4 class="mb-4">Update Pricing</h4>
              <form>
                <div class="form-group">
                  <label for="price300">R per m² (0m² - 300m²)</label>
                  <input type="text" class="form-control" id="price300">
                </div>
                <div class="form-group">
                  <label for="price600">R per m² (300m² - 600m²)</label>
                  <input type="text" class="form-control" id="price600">
                </div>
                <div class="form-group">
                  <label for="price900">R per m² (600m² - 900m²)</label>
                  <input type="text" class="form-control" id="price900">
                </div>
              </form>
              <button type="button" id="updatePricing" class="btn btn-block btn-secondary">Update</button>
            </div>
            <div class="tab-pane fade" id="v-pills-payments" role="tabpanel" aria-labelledby="v-pills-payments-tab">
              <h2 class="text-center">Payment History</h2>
              <hr>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Buyer</th>
                    <th scope="col">Design</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody id="payment-history-table">
                  <!-- AJAX Placeholder -->
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="v-pills-contacts" role="tabpanel" aria-labelledby="v-pills-contacts-tab">
              <h2 class="text-center">Contact Requests</h2>
              <hr>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody id="contact-requests-table">
                  <!-- AJAX Placeholder -->
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
              <h2 class="text-center">Users Manager</h2>
              <hr>
              <form>
                <h4 id="user-manager-form-title" class="mb-4">Add User</h4>
                <input type="text" id="updateUserId" hidden>
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" id="addUserUsername" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="text" id="addUserPassword" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Email Account</label>
                  <input type="email" id="addUserEmail" class="form-control">
                </div>
              </form>
              <button type="button" id="addUserSubmit" class="btn btn-block btn-secondary">Save</button>
              <button type="button" id="updateUserSubmit" class="btn btn-block btn-secondary">Update</button>
              <button type="button" id="updateUserCancel" class="btn btn-block btn-secondary">Cancel</button>

              <div id="active-users-section">
                <hr class="my-5">

                <h4>Active Users</h4>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Username</th>
                      <th scope="col">Password</th>
                      <th scope="col">Email</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="active-users-table">
                    <!-- AJAX Placeholder -->
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="text-center text-secondary pt-4 border-top">
        <p class="text-muted">
            Copyright © 2020 Instaplan - Powered by 
            <a href="https://www.allaboutcloud.co.za" target="_blank" class="text-secondary font-weight-bold">
                All About Cloud
            </a>
        </p>
    </footer>

    <!-- JQuery, Popper, Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Main JS Link -->
    <script src="../scripts/main.js"></script>

    <script>
      $(document).ready(function () {
        if (localStorage.getItem('ID') === null) {
          window.location.href = "index.php";
        }

        getDesigns();
        getPricing();
        getPayments();
        getContacts();
        getUsers();

      })
    </script>
  </body>
</html>
