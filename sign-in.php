

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">

    <title>Agritrade Project</title>

</head>
<body>
    <div class="page sub-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="hero">
            <div class="hero-wrapper">
                <?php include_once "includes/navbar.php"; ?>
                <?php include_once "config/login.php"; ?>
                <?php
                if (Session::get('Login') == true)
                {
                    echo '<script>window.location.replace("index.php")</script>';
                }
                    $login=new Login();
                    if(isset($_POST['signin']))
                    {

                        $check=$login->login($_POST['email'],$_POST['password']);
                        if($check!=false)
                        {

                            $user=$check->fetch_assoc();
                            Session::set('Login',true);
                            Session::set('name',$user['name']);
                            Session::set('role',$user['role']);
                            Session::set('email',$user['email']);
                            echo "<script>location.replace('index.php');</script>";

                        }else
                        {
                            echo "<script>alert('Invalid Username & Password')</script>";
                        }
                    }

                    ?>
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Sign In</h1>
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Page Title =====================================================================-->
                <div class="background"></div>
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
        </section>
        <!--end hero-->

        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="content">
            <section class="block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <form class="form clearfix" method="post" action="">
                                <div class="form-group">
                                    <label for="name" class="col-form-label required">Choose Your Role</label>
                                    <select  class="form-control" name="role" required>
                                        <option value="">Choose</option>
                                        <option value="1">Seller</option>
                                        <option value="2">Buyer</option>
                                        <option value="3">Transport Agent</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label required">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="password" class="col-form-label required">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                                </div>
                                <!--end form-group
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <label>
                                        <input type="checkbox" name="remember" value="1">
                                        Remember Me
                                    </label>

                                </div>-->
                                <center><button type="submit" name="signin" class="btn btn-primary">Sign In</button></center>
                            </form>
                            <hr>
                            <!--
                            <p>
                                Troubles with signing? <a href="#" class="link">Click here.</a>
                            </p>
                            -->
                        </div>
                        <!--end col-md-6-->
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->

<?php

include_once "includes/footer.php";

?>