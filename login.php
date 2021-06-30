<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/assets/css/login.css">
  <link rel="stylesheet" href="bootstrap/assets/css/login.css.map">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="bootstrap/assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img width="100px"src="bootstrap/assets/images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="" method="post">
                <div class="form-group">
                  <label for="adminUsername" class="sr-only">Username</label>
                  <input type="String" name="adminUsername" id="adminUsername" class="form-control" placeholder="UserName" required = "required">
                </div>
                <div class="form-group mb-4">
                  <label for="adminPassword" class="sr-only">Password</label>
                  <input type="password" name="adminPassword" id="adminPassword" class="form-control" placeholder="Password" required = "required">
                </div>
                <input name="login-btn" id="login-btn" class="btn btn-block login-btn mb-4" type="submit" value="Login">
              </form>

              <?php
              include 'config.php';

              if (isset($_POST['login-btn'])) {
                $adminUsername = $_POST['adminUsername'];
                $adminPassword = $_POST['adminPassword'];
                // $departmentID = $_POST['departmentID'];

                $select = "SELECT * FROM admin WHERE adminUsername='$adminUsername'";

                $run = mysqli_query($conn, $select);
                $row_admin = mysqli_fetch_array($run);

                $db_adminUsername = $row_admin['adminUsername'];
                $db_adminPassword = $row_admin['adminPassword'];
                $db_departmentID = $row_admin['departmentID'];

                if ($adminUsername == $db_adminUsername && $adminPassword == $db_adminPassword && $db_departmentID == 0) {
                  //CustomerSuppRepresentative
                  echo "<script>window.open('rep-dashboard.php','_self');</script>";
                  $_SESSION['adminUsername'] = $db_adminUsername;
                } else if($adminUsername == $db_adminUsername && $adminPassword == $db_adminPassword && $db_departmentID == 1) {
                  //Finished Goods
                  echo "<script>window.open('finished-goods-dashboard.php','_self');</script>";
                  $_SESSION['adminUsername'] = $db_adminUsername;
                }
                else if($adminUsername == $db_adminUsername && $adminPassword == $db_adminPassword && $db_departmentID == 2) {
                  //Manufacturing
                  echo "<script>window.open('manufacturing-dashboard.php','_self');</script>";
                  $_SESSION['adminUsername'] = $db_adminUsername;
                }
                else if($adminUsername == $db_adminUsername && $adminPassword == $db_adminPassword && $db_departmentID == 3) {
                  //CustomerSuppManager
                  echo "<script>window.open('manager-dashboard.php','_self');</script>";
                  $_SESSION['adminUsername'] = $db_adminUsername;
                }
                  else {
                    echo "Wrong username or password";
                  }

              }
              ?>

              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>


</body>

</html>