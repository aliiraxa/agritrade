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
                <!--============ Hero Form ==========================================================================-->
                <div class="collapse" id="collapseMainSearchForm">
                    <form class="hero-form form">
                        <div class="container">


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
                        <h1>Sellers</h1>
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
                    <?php
                    
                    ?>
                    <div class="authors masonry items grid-xl-4-items grid-lg-4-items grid-md-4-items">
                        <div class="item author">
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">Jane Great</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-02.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Nashville, TN</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="4"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>36</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam venenatis lobortis</p>
                                </div>
                                <!--end description-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>jane.great@example.com</aside>
                                        </li>
                                        <li>
                                            <figure>Phone</figure>
                                            <aside>+1 123 456 789</aside>
                                        </li>
                                    </ul>
                                </div>
                                <!--end addition-info-->
                                <a href="single-listing-1.html" class="detail text-caps underline">Detail</a>
                            </div>
                        </div>
                        <!--end item-->



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

        <?php

include_once "includes/footer.php";

?>