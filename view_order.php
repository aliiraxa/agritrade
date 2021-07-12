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

                    $pro=$m->getOrdersById($id);
                    $product=$pro->fetch_assoc();
                ?>
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container clearfix">
                        <div class="float-left float-xs-none">
                            <h1>Order Details</h1>
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
                    <center><h4>Order Date: <?php echo $product['order_date']; ?> </h4></center>
                    <center><h4>Received Date: <?php

                            if($product['receive_date']!="0000-00-00")
                                echo $product['receive_date'];
                            else
                                echo "<b style='color:red;'>Not Yet</b>"; ?> </h4></center>
                    <div class="row">
                        <!--============ Listing Detail =============================================================-->
                        <div class="col-md-9">
                            <!--Gallery Carousel-->
                            <section>
                                <h2>Buyer Details</h2>
                                <!--end section-title-->
                                <p>
                                    <?php echo "Buyer Name: ".$product['buyer_name']; ?><br>
                                    <?php echo "Buyer Email: ".$product['buyer_email']; ?><br>
                                    <?php echo "Buyer Phone: ".$product['buyer_phone']; ?><br>
                                    <?php echo "Buyer Address: ".$product['delivery_address']; ?><br>

                                </p>
                            </section>
                            <!--end Gallery Carousel-->
                            <!--Description-->
                            <section>


                        </div>
                        <!--============ End Listing Detail =========================================================-->
                        <!--============ Sidebar ====================================================================-->
                        <div class="col-md-3">
                            <aside class="sidebar">
                                <section>
                                    <h2>Seller Details</h2>
                                  <p>
                                        <?php echo "Seller Name: ".$product['seller_name']; ?><br>
                                        <?php echo "Seller Email: ".$product['sellery_email']; ?><br>
                                        <?php echo "Seller Phone: ".$product['sellery_phone']; ?><br>

                                    </p>

                                </section>
                             
                            </aside>
                        </div>

                        <!--============ End Sidebar ================================================================-->
                    </div>

                    <center><h4><a href="buyer_orders.php" class="btn btn-primary text-caps btn-rounded btn-framed">GO Back</a> </h4></center>

                   <br>
                    <center><h4 style="color: red;">Note: Order Only Admin Can Cancel </h4></center>

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