
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
        <header class="hero">
            <div class="hero-wrapper">
                <?php include_once "includes/navbar.php"; ?>
                <?php include_once "config/login.php"; ?>
                <?php
                if (Session::get('Login') == true)
                {
                    echo '<script>window.location.replace("index.php")</script>';
                }

                    $login=new Login();
                if(isset($_POST['register']))
                {
                    $role=$_POST['role'];
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $repeat_password=$_POST['repeat_password'];

                    if($password!=$repeat_password)
                    {
                        echo "<script>alert('Confirm Password Not Same');</script>";
                    }else
                    {
                        $check=$login->checkEmailExits($email);
                        if($check)
                        {
                            echo "<script>alert('User Already Exist');</script>";
                            echo '<script>window.location.replace("register.php")</script>';
                            return;
                        }
                        $result=$login->createAccount($role,$name,$email,$password);

                        if($result!=false)
                        {
                            Session::set('Login',true);
                            Session::set('name',$name);
                            Session::set('email',$email);
                            Session::set('role',$role);
                            echo '<script>window.location.replace("index.php")</script>';
                        }else
                        {
                            echo '<script>window.location.replace("register.php")</script>';
                        }

                    }
                }


                ?>
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Register</h1>
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Page Title =====================================================================-->
                <div class="background"></div>
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
        </header>
        <!--end hero-->

        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="content">
            <section class="block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                            <form class="form clearfix" method="POST" action="register.php">
                                <div class="form-group">
                                    <label for="name" class="col-form-label required">Choose Your Role</label>
                                    <select  class="form-control" name="role" required>
                                        <option value="">Choose</option>
                                        <option value="1">Seller</option>
                                        <option value="2">Buyer</option>
                                        <option value="3">Transport Agent</option>
                                        <option value="4">Store Lister</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-form-label required">Your Name</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="email" class="col-form-label required">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="password" class="col-form-label required">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="repeat_password" class="col-form-label required">Repeat Password</label>
                                    <input name="repeat_password" type="password" class="form-control" id="repeat_password" placeholder="Repeat Password" required>
                                </div>
                                <!--end form-group-->


                                   <center><button type="submit" name="register" class="btn btn-primary">Register</button></center>

                            </form>
                            <hr>
                            <p>
                                By clicking "Register" button, you agree with our <a href="#" class="link">Terms & Conditions.</a>
                            </p>
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