<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instaplan - Admin Sign In</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main CSS Link -->
    <link rel="stylesheet" href="../styles/main.css">
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
      <div class="m-2 p-2"></div>

      <div class="row my-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-center">Admin Sign In</h1>
          <hr>
          <form>
            <div class="form-group">
              <label for="adminUsername">Username</label>
              <input type="text" class="form-control" id="adminUsername">
            </div>
            <div class="form-group">
              <label for="adminPassword">Password</label>
              <input type="password" class="form-control" id="adminPassword">
            </div>
          </form>
          <button type="button" id="adminSignIn" class="btn btn-secondary btn-block" data-dismiss="modal">Sign In</button>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

    <footer class="text-center text-secondary pt-4">
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
        if (localStorage.getItem('ID') !== null) {
          window.location.href = "dashboard.php";
        }
      })
    </script>
  </body>
</html>
