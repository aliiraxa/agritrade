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
                <?php include_once "config/manage.php"; ?>
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

                    <div class="authors masonry items grid-xl-4-items grid-lg-4-items grid-md-4-items">
                        <?php
                        $m=new Manage();
                        $getRecord=$m->getSellers();
                        if($getRecord)
                        {
                            while ($seller=$getRecord->fetch_assoc())
                            {
                                ?>
                                <div class="item author">
                                    <div class="wrapper">
                                        <div class="image">
                                            <h3>
                                                <a  class="title"><?php echo $seller['name']; ?></a>
                                            </h3>
                                            <a  class="image-wrapper background-image">
                                                <?php
                                                    if(!$seller['img'])
                                                    {
                                                ?>

                                                <img src="assets/img/author-02.jpg" alt="">

                                                <?php

                                                    }else
                                                        {
                                                ?>

                                                <img src="<?php echo $seller['img']; ?>" alt="">

                                                <?php
                                                        }
                                                ?>
                                            </a>
                                        </div>
                                        <!--end image-->
                                        <h4 class="location">
                                            <a href="#"><?php echo $seller['address']; ?></a>
                                        </h4>

                                        <!--end meta-->
                                        <div class="description">
                                            <p><?php echo $seller['about']; ?></p>
                                        </div>
                                        <!--end description-->
                                        <div class="additional-info">
                                            <ul>
                                                <li>
                                                    <figure>Email</figure>
                                                    <aside><?php echo $seller['email']; ?></aside>
                                                </li>
                                                <li>
                                                    <figure>Phone</figure>
                                                    <aside><?php echo $seller['phone']; ?></aside>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!--end item-->

                                <?php

                                }
                                }
                        ?>

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