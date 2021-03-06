<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
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
                <?php include_once "config/manage.php"; ?>
                <?php
                $m=new Manage();
                if(isset($_POST['add']))
                {

                    $title=$_POST['title'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                    $city=$_POST['city'];
                    $district=$_POST['district'];
                    $street=$_POST['street'];

                    $m->submitStoreInfo($title,$email,$phone,$city,$district,$street,$m->getIdByEmail(Session::get('email')));


                }
                $stores['name']="";
                $stores['email']="";
                $stores['phone']="";
                $stores['city']="";
                $stores['district']="";
                $stores['street']="";
                $store=$m->getStoreByUser($m->getIdByEmail(Session::get('email')));
                if($store)
                {
                    $stores=$store->fetch_assoc();
                }







                ?>
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Your Store Information</h1>
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

                    <form class="form form-submit" method="post" action="" enctype="multipart/form-data">
                        <section>
                            <h2>Basic Information</h2>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label required">Title</label>
                                        <input name="title" type="text" class="form-control" id="title" value="<?php echo $stores['name']; ?>" placeholder="Title" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-8-->

                            </div>
                            <div class="row">
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label required">Your Email</label>
                                        <input name="email" type="email" class="form-control"  value="<?php echo $stores['email']; ?>" id="email" placeholder="Email" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label required">Your Phone</label>
                                        <input name="phone" type="text" class="form-control" value="<?php echo $stores['phone']; ?>" id="phone" placeholder="Phone" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                            </div>
                        </section>
                        <!--end basic information-->
                        <section>
                            <h2>Location</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label required">City</label>
                                        <input name="city" type="text" value="<?php echo $stores['city']; ?>"  class="form-control" id="" placeholder="City">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district" class="col-form-label required">District</label>
                                        <input name="district" type="text" value="<?php echo $stores['district']; ?>" class="form-control" id="" placeholder="District">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="street" class="col-form-label">Street</label>
                                        <input name="street" value="<?php echo $stores['street']; ?>" type="text" class="form-control" id="street">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                            </div>
                            <!--end row-->

                            <!--end form-group-->

                        </section>


                        <section class="clearfix">
                            <div class="form-group">
                                <button type="submit" name="add" class="btn btn-primary large icon float-right">Save</button>
                            </div>
                        </section>
                    </form>
                    <!--end form-submit-->
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
