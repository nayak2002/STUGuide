<?php

$conn = new mysqli("localhost","root","","dbms_pro");
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_first = mysqli_real_escape_string($conn, $_POST['update_first']);
    $update_last = mysqli_real_escape_string($conn, $_POST['update_last']);
 
    mysqli_query($conn, "UPDATE login_info SET username = '$update_name', email = '$update_email', first_name="$update_first" , last_name="$update_last" WHERE username = '$user_id'");

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE login_info SET upassword = '$confirm_pass' WHERE username = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }
}

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="userprofilestyleedit.css">
</head>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<body>
    <div class="main-content">
    <?php
      $select = mysqli_query($conn, "SELECT * FROM login_info WHERE username = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                    href="index.html" target="_blank">STU Guide</a>
                <!-- Form -->
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src="https://demos.creative-tim.com/argon-dashboard/assets-old/img/theme/team-4.jpg">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $fetch['username']; ?></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
            style="min-height: 600px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello <?php echo $fetch['username']; ?></h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made
                            with your work and manage your projects or assigned tasks</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="userprofile.html" class="btn btn-sm btn-primary" name="update_profile">Save</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Username</label>
                                                <input type="text" id="input-username"
                                                    class="form-control form-control-alternative" placeholder="Username" name="update_name"
                                                    value="<?php echo $fetch['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email
                                                    address</label>
                                                <input type="email" id="input-email"
                                                    class="form-control form-control-alternative" name="update_email"
                                                    value="<?php echo $fetch['email']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">First
                                                    name</label>
                                                <input type="text" id="input-first-name"
                                                    class="form-control form-control-alternative" name="update_first"
                                                    placeholder="First name" value="<?php echo $fetch['first_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last-name">Last
                                                    name</label>
                                                <input type="text" id="input-last-name"
                                                    class="form-control form-control-alternative" name="update_last"
                                                    placeholder="Last name" value="<?php echo $fetch['last_name']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Password</h6>
                                <div class="pl-lg-4">
                                    
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                                                <label class="form-control-label" for="input-city">Old Password</label>
                                                <input type="password" id="input-city" name="update_pass"
                                                    class="form-control form-control-alternative" placeholder="Old Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">New Password</label>
                                                <input type="password" id="input-country" name="new_pass"
                                                    class="form-control form-control-alternative" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Confirm Password</label>
                                                <input type="password" id="input-postal-code" name="confirm_pass"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Description -->
                                <h6 class="heading-small text-muted mb-4">About me</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group focused">
                                        <label>About Me</label>
                                        <textarea rows="4" class="form-control form-control-alternative"
                                            placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>