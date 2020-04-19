<?php
  include "../../action/auth_admin.php";
  include "../../action/koneksi.php";

  $id_user = $_GET['id'];
  $query = "SELECT * from users WHERE id='$id_user';";
  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  while ($row = mysqli_fetch_array($result))
  { 
    $name = $row['name'];
    $username = $row['username'];
    $role = $row['roles'];
    $status= $row['status'];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="57x57" href="../../assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../../assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../assets/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Meta -->
    <meta name="author" content="WahyuAjiSulaiman">

    <title>New Account</title>

    <!-- vendor css -->
    <link href="../../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../../lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">

  </head>
  <body class="az-body">
    <?php
      if(isset($_SESSION["errorMessage"])) {
    ?>
        <div style="padding: 7px 10px;
        background: #fff1f2;
        border: #ffd5da 1px solid;
        color: #d6001c;
        border-radius: 4px;
        margin: 30px 10px 10px 10px;"><?php echo $_SESSION["errorMessage"]; ?></div>
    <?php
        unset($_SESSION["errorMessage"]);
    }
    ?>

    <?php include"../../layouts/admin/header.php";?>

    <div class="az-content az-content-mail">
      <div class="container" style="justify-content: center">
        <div class="az-card-signin">
          <h1 class="az-logo"></h1>
          <div class="az-signin-header">
            <h2>Edit Account <?php echo $name ?></h2>
            <form action="../../action/admin/update_account.php?id=<?php echo $id_user?>" method="POST" accept-charset="utf-8">
              <div class="form-group">
                <label>Display Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your fullname" value="<?php echo $name ?>" required>
              </div><!-- form-group -->
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" value="<?php echo $username ?>" required>
              </div><!-- form-group -->
              <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
              </div><!-- form-group -->
              <div class="form-group">
                <select class="form-control select2-no-search" name="roles">
                    <option value='' label="Choose one"></option>
                    <option value="admin" <?php echo $role == "admin" ? "selected": '';?>>Admin</option>
                    <option value="user" <?php echo $role == "user" ? "selected": '';?>>User</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control select2-no-search" name="status">
                    <option value='' label="Choose one"></option>
                    <option value="1" <?php echo $status == "1" ? "selected": '';?>>Active</option>
                    <option value="0" <?php echo $status == "0" ? "selected": '';?>>Non-Active</option>
                </select>
              </div>
              
              <button type="submit"  class="btn btn-az-primary btn-block">Create</button>
            </form>
          </div><!-- az-signin-header -->
          <div class="az-signin-footer">
          </div><!-- az-signin-footer -->
        </div><!-- az-card-signin -->
      </div><!-- container -->
    </div><!-- az-content -->

    <?php include"../../layouts/users/footer.php"?>
  </body>
</html>
