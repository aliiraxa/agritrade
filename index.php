
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

    <div class="page home-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header class="hero">
            <div class="hero-wrapper">
                <?php include_once "includes/navbar.php"; ?>
                <?php include_once "config/manage.php"; ?>
                <!--============ End Main Navigation ================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1 class="opacity-40 center">
                            <a href="#">Buy</a>, <a href="#">Sell</a> or <a href="#">Find</a> What You need
                        </h1>
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Page Title =====================================================================-->
                <!--============ Hero Form ==========================================================================-->
                <form class="hero-form form">
                    <div class="container">
                        <!--Main Form-->
                        <div class="main-search-form">
                            <div class="form-row">
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="what" class="col-form-label">What?</label>
                                        <input name="keyword" type="text" class="form-control" id="what" placeholder="What are you looking for?">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-3-->
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="input-location" class="col-form-label">Where?</label>
                                        <input name="location" type="text" class="form-control" id="input-location" placeholder="Enter Location">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-3-->
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="category" class="col-form-label">Category?</label>
                                        <select name="category" id="category" data-placeholder="Select Category">
                                            <option value="">Select Category</option>
                                            <?php
                                            $m=new Manage();
                                            $cat=$m->getAllCategroy();
                                            while ($cats=$cat->fetch_assoc())
                                            {
                                                ?>
                                                <option value="<?php echo $cats['id']; ?>"><?php echo $cats['name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                            <option value="1">Computers</option>

                                        </select>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-3-->
                                <div class="col-md-3 col-sm-3">
                                    <button type="submit" class="btn btn-primary width-100">Search</button>
                                </div>
                                <!--end col-md-3-->
                            </div>
                            <!--end form-row-->
                        </div>
                        <!--end main-search-form-->
                       
                    </div>
                    <!--end container-->
                </form>
                <!--============ End Hero Form ======================================================================-->
                <div class="background">
                    <div class="background-image original-size">
                        <img src="assets/img/hero-background-icons.jpg" alt="">
                    </div>
                    <!--end background-image-->
                </div>
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
                    <!--============ Section Title===================================================================-->
                    <div class="section-title clearfix">
                        <div class="float-xl-left float-md-left float-sm-none">
                            <h2>Listings</h2>

                        </div>
                       
                    </div>
                    <!--============ Items ==========================================================================-->
                    <div class="items masonry grid-xl-4-items grid-lg-3-items grid-md-2-items">

                        <?php


                        if(isset($_GET['keyword']))
                        $record=$m->research($_GET['keyword'],$_GET['location'],$_GET['category']);
                        else
                             $record=$m->getRandomHomePage();



                            if($record)
                            {
                                while ($records=$record->fetch_assoc())
                                {
                                    $cat=$m->getCategoryBYId($records['category']);
                                    $seller=$m->getSellerById($records['user_id']);

                        ?>

                        <div class="item">
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
                                        <a>
                                            <i class="fa fa-user"></i><?php echo $seller; ?>
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description">
                                    <p><?php echo $records['about']; ?></p>
                                </div>
                                <!--end addition-info-->
                                <a href="view_product.php?id=<?php echo $records['id']; ?>" class="detail text-caps underline">Detail</a>
                            </div>
                        </div>
                        <!--end item-->
                        <?php

                                }
                            }

                        ?>


                    </div>
                    <!--============ End Items ======================================================================-->


                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->
    </div>
    <!--end page-->


<?php

include_once "includes/footer.php";

?>