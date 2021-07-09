<?php
include_once "config\session.php";
include_once "config\database.php";

?>

<!--============ Secondary Navigation ===============================================================-->
<div class="secondary-navigation">
    <div class="container">
        <!--end left-->
        <ul class="right">
            <li>
                <a href="sign-in.php">
                    <i class="fa fa-sign-in"></i>Sign In
                </a>
            </li>
            <li>
                <a href="register.php">
                    <i class="fa fa-pencil-square-o"></i>Register
                </a>
            </li>
        </ul>
        <!--end right-->
    </div>
    <!--end container-->
</div>
<!--============ End Secondary Navigation ===========================================================-->
<!--============ Main Navigation ====================================================================-->
<div class="main-navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <!--Main navigation list-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sellers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Stores</a>
                    </li>


                    <li class="nav-item has-child">
                        <a class="nav-link" href="#">User Panel</a>
                        <ul class="child">
                            <li class="nav-item">
                                <a href="my-profile.php" class="nav-link">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="my-ads.html" class="nav-link">My Listing</a>
                            </li>
                            <li class="nav-item">
                                <a href="change-password.php" class="nav-link">Change
                                    Password</a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="book-training.html" class="btn btn-primary text-caps btn-rounded btn-framed">Book Training</a>
                    </li>
                </ul>
                <!--Main navigation list-->
            </div>
            <!--end navbar-collapse-->
        </nav>
        <!--end navbar-->
    </div>
    <!--end container-->
</div>