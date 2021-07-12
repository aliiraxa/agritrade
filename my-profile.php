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
                if (!Session::get('Login') == true)
                {
                    echo '<script>window.location.replace("index.php")</script>';
                }
                $login=new Login();
                    if(isset($_POST['profile']))
                    {

                        $id=$login->getIdByEmail(Session::get('email'));
                        $title=$_POST['title'];
                        $name=$_POST['name'];
                        $img=$_FILES['user_image'];
                        $newPic=$_FILES["user_image"]["name"];
                        $temps=$_FILES["user_image"]["tmp_name"];
                        $address=$_POST['location'];
                        $about=$_POST['about'];
                        $phone=$_POST['phone'];
                        $email=$_POST['email'];

                        //image work here
                        $temp = explode(".", $_FILES["user_image"]["name"]);
                        $newfilename = $id . '.' . end($temp);
                        $target_dir = "assets/img/";
                        $target_file = $target_dir . $newfilename;

                        $imageOk=$login->checkImage($target_file,$img);
                        if($imageOk==2)
                        {
                            $results = $login->updateProfile($title, $name, $target_file, $address, $about, $phone, $email, $id,$newPic,$temps);
                            echo "<script>alert('$results')</script>";
                        }else
                        {
                            echo "<script>alert('$imageOk')</script>";
                        }

                    }

                ?>
                <!--============ Hero Form ==========================================================================-->
                <div class="collapse" id="collapseMainSearchForm">
                    <form class="hero-form form">
                        <div class="container">
                            <!--Main Form-->
                            <div class="main-search-form">
                                <div class="form-row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="what" class="col-form-label">What?</label>
                                            <input name="keyword" type="text" class="form-control small" id="what" placeholder="What are you looking for?">
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="input-location" class="col-form-label">Where?</label>
                                            <input name="location" type="text" class="form-control small" id="input-location" placeholder="Enter Location">
                                            <span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Category?</label>
                                            <select name="category" id="category" class="small" data-placeholder="Select Category">
                                                <option value="">Select Category</option>
                                                <option value="1">Computers</option>
                                                <option value="2">Real Estate</option>
                                                <option value="3">Cars & Motorcycles</option>
                                                <option value="4">Furniture</option>
                                                <option value="5">Pets & Animals</option>
                                            </select>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <button type="submit" class="btn btn-primary width-100 small">Search</button>
                                    </div>
                                    <!--end col-md-3-->
                                </div>
                                <!--end form-row-->
                            </div>
                            <!--end main-search-form-->
                            <!--Alternative Form-->
                            <div class="alternative-search-form">
                                <a href="#collapseAlternativeSearchForm" class="icon" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseAlternativeSearchForm"><i class="fa fa-plus"></i>More Options</a>
                                <div class="collapse" id="collapseAlternativeSearchForm">
                                    <div class="wrapper">
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-xs-grid d-flex align-items-center justify-content-between">
                                                <label>
                                                    <input type="checkbox" name="new">
                                                    New
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="used">
                                                    Used
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="with_photo">
                                                    With Photo
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="featured">
                                                    Featured
                                                </label>
                                            </div>
                                            <!--end col-xl-6-->
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <input name="min_price" type="text" class="form-control small" id="min-price" placeholder="Minimal Price">
                                                            <span class="input-group-addon small">$</span>
                                                        </div>
                                                        <!--end form-group-->
                                                    </div>
                                                    <!--end col-md-4-->
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <input name="max_price" type="text" class="form-control small" id="max-price" placeholder="Maximal Price">
                                                            <span class="input-group-addon small">$</span>
                                                        </div>
                                                        <!--end form-group-->
                                                    </div>
                                                    <!--end col-md-4-->
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <select name="distance" id="distance" class="small" data-placeholder="Distance" >
                                                                <option value="">Distance</option>
                                                                <option value="1">1km</option>
                                                                <option value="2">5km</option>
                                                                <option value="3">10km</option>
                                                                <option value="4">50km</option>
                                                                <option value="5">100km</option>
                                                            </select>
                                                        </div>
                                                        <!--end form-group-->
                                                    </div>
                                                    <!--end col-md-3-->
                                                </div>
                                                <!--end form-row-->
                                            </div>
                                            <!--end col-xl-6-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end wrapper-->
                                </div>
                                <!--end collapse-->
                            </div>
                            <!--end alternative-search-form-->
                        </div>
                        <!--end container-->
                    </form>
                    <!--end hero-form-->
                </div>
                <!--end collapse-->
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>My Profile</h1>
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
                    <div class="row">
                        <div class="col-md-3">
                            <nav class="nav flex-column side-nav">
                                <a class="nav-link active icon" href="my-profile.php">
                                    <i class="fa fa-user"></i>My Profile
                                </a>
                                <a class="nav-link icon" href="seller_all_listing.php">
                                    <i class="fa fa-heart"></i>My Listing
                                </a>
                                <a class="nav-link icon" href="change-password.php">
                                    <i class="fa fa-recycle"></i>Change Password
                                </a>
                            </nav>
                        </div>
                        <!--end col-md-3-->
                        <?php
                            $results=$login->getCurrentUser(Session::get('email'));
                            $userData=$results->fetch_assoc();

                        ?>
                        <div class="col-md-9">
                            <form class="form" method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2>Personal Information</h2>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="title" class="col-form-label">Title</label>
                                                        <select name="title" id="title" data-placeholder="Title">
                                                            <?php
                                                            if(!$userData['title'])
                                                            {
                                                            ?>
                                                            <option value="">Title</option>
                                                            <?php } ?>
                                                            <option><?php  echo $userData['title']; ?></option>
                                                            <option value="">-------------</option>
                                                            <option>Mrs</option>
                                                            <option>Mr</option>
                                                        </select>
                                                    </div>
                                                    <!--end form-group-->
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label required">Your Name</label>
                                                        <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" value="<?php  echo $userData['name']; ?>" required>
                                                    </div>
                                                    <!--end form-group-->
                                                </div>
                                                <!--end col-md-8-->
                                            </div>
                                            <!--end row-->
                                            <div class="form-group">
                                                <label for="location" class="col-form-label required">Your Location</label>
                                                <input name="location" type="text" class="form-control" id="input-location2" placeholder="Your Location" value="<?php  echo $userData['address']; ?>" required>
                                            </div>
                                            <!--end form-group-->
                                            <div class="form-group">
                                                <label for="about" class="col-form-label">More About You</label>
                                                <textarea name="about" id="about" class="form-control" rows="4"><?php  echo $userData['about']; ?></textarea>
                                            </div>
                                            <!--end form-group-->
                                        </section>

                                        <section>
                                            <h2>Contact</h2>
                                            <div class="form-group">
                                                <label for="phone" class="col-form-label">Phone</label>
                                                <input name="phone" type="text" class="form-control" id="phone" min="11" placeholder="Your Phone" value="<?php  echo $userData['phone']; ?>">
                                            </div>
                                            <!--end form-group-->
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" value="<?php  echo $userData['email']; ?>">
                                            </div>
                                            <!--end form-group-->
                                        </section>

                                      

                                        <section class="clearfix">
                                            <button type="submit" name="profile" class="btn btn-primary float-right">Save Changes</button>
                                        </section>
                                        <b style="color: red;">Note: Account Only Admin Can delete. You Can Contact to Admin For Account Deletion</b>
                                    </div>
                                    <!--end col-md-8-->
                                    <div class="col-md-4">
                                        <div class="profile-image">
                                            <div class="image background-image">
                                                <?php
                                                    if(!$userData['img'])
                                                    {


                                                ?>
                                                <img src="assets/img/author-09.jpg" alt="">
                                                <?php
                                                    }else
                                                    {

                                                ?>
                                                        <img src="<?php echo $userData['img']; ?>" alt="">
                                                 <?php

                                                    }
                                                 ?>
                                            </div>
                                            <div class="single-file-input">
                                                <input type="file" id="user_image" name="user_image">
                                                <div class="btn btn-framed btn-primary small">Upload a picture</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-md-3-->
                                </div>
                            </form>
                        </div>
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