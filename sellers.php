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
                    <!--============ Section Title===================================================================-->
                    <div class="section-title clearfix">
                        <div class="float-left float-xs-none">
                            <label class="mr-3 align-text-bottom">Sort by: </label>
                            <select name="sorting" id="sorting" class="small width-200px" data-placeholder="Default Sorting" >
                                <option value="">Default Sorting</option>
                                <option value="1">Newest First</option>
                                <option value="2">Oldest First</option>
                                <option value="3">Lowest Price First</option>
                                <option value="4">Highest Price First</option>
                            </select>

                        </div>
                        <div class="float-right d-xs-none thumbnail-toggle">
                            <a href="#" class="change-class active" data-change-from-class="list" data-change-to-class="masonry" data-parent-class="authors">
                                <i class="fa fa-th"></i>
                            </a>
                            <a href="#" class="change-class" data-change-from-class="masonry" data-change-to-class="list" data-parent-class="authors">
                                <i class="fa fa-th-list"></i>
                            </a>
                        </div>
                    </div>
                    <!--============ Items ==========================================================================-->
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

                        <div class="item author">
                            <div class="ribbon-featured">Top Rated</div>
                            <!--end ribbon-->
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">John E. Metzger</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-03.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Spokane, WA</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="5"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>57</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>john.m@example.com</aside>
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

                        <div class="item author">
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">Rosina Warner</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-04.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Orlando, FL</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="4"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>12</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>rosinsa5@example.com</aside>
                                        </li>
                                        <li>
                                            <figure>Phone</figure>
                                            <aside>+1 123 456 789</aside>
                                        </li>
                                        <li>
                                            <figure>Skype</figure>
                                            <aside>Rosina5</aside>
                                        </li>
                                        <li>
                                            <figure>Facebook</figure>
                                            <aside>fb.me/rosina</aside>
                                        </li>
                                    </ul>
                                </div>
                                <!--end addition-info-->
                                <a href="single-listing-1.html" class="detail text-caps underline">Detail</a>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="item author">
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">Robert Mathews</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-05.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Saint Anthony, ID</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="3"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>32</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description">
                                    <p>
                                        Maecenas varius tempus libero ut pellentesque. Praesent velit ipsum
                                    </p>
                                </div>
                                <!--end description-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>robert.mat@example.com</aside>
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

                        <div class="item author">
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">Martina Whittaker</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-06.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Louisville, KY</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="4"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>54</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description">
                                    <p>
                                        Maecenas varius tempus libero ut pellentesque. Praesent velit ipsum
                                    </p>
                                </div>
                                <!--end description-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>hello@example.com</aside>
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

                        <div class="item author">
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">Ronnie R. Landers</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-01.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Saint Anthony, ID</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="3"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>32</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description">
                                    <p>
                                        Maecenas varius tempus libero ut pellentesque. Praesent velit ipsum
                                    </p>
                                </div>
                                <!--end description-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>robert.mat@example.com</aside>
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

                        <div class="item author">
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">Angelia Teems</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-08.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Asbury, KS</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="5"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>38</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description">
                                    <p>
                                        Maecenas varius tempus libero ut pellentesque. Praesent velit ipsum
                                    </p>
                                </div>
                                <!--end description-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>hello@example.com</aside>
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

                        <div class="item author">
                            <div class="wrapper">
                                <div class="image">
                                    <h3>
                                        <a href="seller-detail-1.html" class="title">Stephen Brunetti</a>
                                    </h3>
                                    <a href="single-listing-1.html" class="image-wrapper background-image">
                                        <img src="assets/img/author-07.jpg" alt="">
                                    </a>
                                </div>
                                <!--end image-->
                                <h4 class="location">
                                    <a href="#">Memphis, TN</a>
                                </h4>
                                <div class="meta">
                                    <figure>
                                        <div class="rating" data-rating="3"></div>
                                    </figure>
                                    <figure>
                                        <a href="#">
                                            <i class="fa fa-user"></i><strong>41</strong> Listings
                                        </a>
                                    </figure>
                                </div>
                                <!--end meta-->
                                <div class="description">
                                    <p>
                                        Maecenas varius tempus libero ut pellentesque. Praesent velit ipsum
                                    </p>
                                </div>
                                <!--end description-->
                                <div class="additional-info">
                                    <ul>
                                        <li>
                                            <figure>Email</figure>
                                            <aside>stephen@example.com</aside>
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
                    <!--============ End Items ======================================================================-->
                    <div class="page-pagination">
                        <nav aria-label="Pagination">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <i class="fa fa-chevron-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">
                                            <i class="fa fa-chevron-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--end page-pagination-->
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