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
        <section class="hero">
            <div class="hero-wrapper">

                <?php include_once "includes/navbar.php"; ?>
                 <?php include_once "config/manage.php"; ?>
                <?php
                $m=new Manage();
                $id=$_GET['id'];
                if(!$id)
                    echo "<script>location.replace('index.php');</script>";

                    $pro=$m->getProductById($id);
                    $product=$pro->fetch_assoc();
                ?>
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container clearfix">
                        <div class="float-left float-xs-none">
                            <h1><?php echo $product['title']; ?>
                               
                            </h1>
                            <h4 class="location">
                                <a href="#"><?php echo $product['city'].",".$product['district']; ; ?></a>
                            </h4>
                        </div>
                        <div class="float-right float-xs-none price">
                            <div class="number"><?php echo $product['price']."PKR"; ?></div>
                          
                        </div>
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
                    <div class="row">
                        <!--============ Listing Detail =============================================================-->
                        <div class="col-md-9">
                            <!--Gallery Carousel-->
                            <section>
                                <h2>Gallery</h2>
                                <!--end section-title-->
                                <div class="gallery-carousel owl-carousel">
                                    <img src="<?php echo $product['img']; ?>" alt="" data-hash="1">
                                </div>
                                <div class="gallery-carousel-thumbs owl-carousel">
                                    <a href="#1" class="owl-thumb active-thumb background-image">
                                        <img src="<?php echo $product['img']; ?>" alt="">
                                    </a>

                                </div>
                            </section>
                            <!--end Gallery Carousel-->
                            <!--Description-->
                            <section>
                                <h2>Description</h2>
                                <p>
                                    <?php echo $product['about']; ?>
                                </p>
                                <br><br>
                                <?php
                                $role=Session::get('role');
                                if($role==2)
                                {


                                ?>
                                <a href="order.php" class="btn btn-primary text-caps btn-rounded btn-framed">Order Now</a>
                          <?php
                                }

                          ?>
                          
                        </div>
                        <!--============ End Listing Detail =========================================================-->
                        <!--============ Sidebar ====================================================================-->
                        <div class="col-md-3">
                            <aside class="sidebar">
                                <section>
                                    <h2>Similar Product</h2>
                                    <div class="items compact">
                                    <?php
                                    $record=$m->getRandomHomePage();
                                    if($record)
                                    {
                                    while ($records=$record->fetch_assoc())
                                    {
                                    $cat=$m->getCategoryBYId($records['category']);
                                    $seller=$m->getSellerById($records['user_id']);

                                    ?>

                                        <div class="item">
                                            <!--end ribbon-->
                                            <div class="wrapper">
                                                <div class="image">
                                                    <h3>
                                                        <a href="#" class="tag category"><?php echo $cat; ?></a>
                                                        <a href="view_product.php?id=<?php echo $records['id']; ?>" class="title"><?php echo $records['title']; ?></a>
                                                    </h3>
                                                    <a href="view_product.php?id=<?php echo $records['id']; ?>" class="image-wrapper background-image">
                                                        <img src="<?php echo $records['img']; ?>" alt="">
                                                    </a>
                                                </div>
                                                <!--end image-->
                                                <h4 class="location">
                                                    <a href="#"><?php echo $records['city'].",".$records['district']; ?></a>
                                                </h4>
                                                <div class="price"><?php echo $records['price']."PKR"; ?></div>
                                                <div class="meta">
                                                    <figure>
                                                        <a href="#">
                                                            <i class="fa fa-user"></i><?php echo $seller; ?>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <!--end meta-->
                                            </div>
                                            <!--end wrapper-->
                                        </div>
                                        <!--end item-->
                                        <?php

                                    }
                                    }

                                    ?>


                                    </div>

                                </section>
                             
                            </aside>
                        </div>
                        <!--============ End Sidebar ================================================================-->
                    </div>
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->

        <footer class="footer">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#" class="brand">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                            <p>
                                Farmer web portal has become the basic need for every farmer and customer as well. This portal basically working as a third party between customers and sellers. Customer can buy the products on the spot. It is actually a web base project we will make easier access for everyone. You will get information about the agriculture products from our site.
                            </p>
                        </div>
                        <!--end col-md-5-->
                        <div class="col-md-3">


                        </div>
                        <!--end col-md-3-->
                        <div class="col-md-4">
                            <h2>Contact</h2>
                            <address>
                                <figure>
                                    University Of Gujrat,<br>
                                    GT Road Campus,<br>
                                    Gujrat.
                                </figure>
                                <br>
                                <strong>Email:</strong> <a href="#">19010819-G3@uog.edu.pk</a>
                                <br>
                                <strong>Mobile: </strong> +92 333 1042473
                                <br>
                                <br>
                                <a href="contact.html" class="btn btn-primary text-caps btn-framed">Contact Us</a>
                            </address>
                        </div>
                        <!--end col-md-4-->
                    </div>
                    <!--end row-->
                </div>
                <div class="background">
                    <div class="background-image original-size">
                        <img src="assets/img/footer-background-icons.jpg" alt="">
                    </div>
                    <!--end background-image-->
                </div>
                <!--end background-->
            </div>
        </footer>
        <!--end footer-->
    </div>
    <!--end page-->


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
    <script src="assets/js/selectize.min.js"></script>
    <script src="assets/js/icheck.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/custom.js"></script>



</body>
</html>