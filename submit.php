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
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Add Product</h1>
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

                    <form class="form form-submit">
                        <section>
                            <h2>Basic Information</h2>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label required">Title</label>
                                        <input name="title" type="text" class="form-control" id="title" placeholder="Title" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-8-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label required">Price</label>
                                        <input name="price" type="text" class="form-control" id="price" required>
                                        <span class="input-group-addon">PKR</span>
                                    </div>
                                    <!--end form-group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label required">Your Name</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label required">Your Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label required">Your Phone</label>
                                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                            </div>
                        </section>
                        <!--end basic information-->
                        <section>
                            <div class="row">
                                <div class="col-md-4">
                                    <h2>Category</h2>
                                    <div class="form-group">
                                        <label for="submit-category" class="col-form-label">Category</label>
                                        <select class="change-tab" name="submit_category"  data-placeholder="Select Category">
                                            <option value="">Select Category</option>

                                            <option value="furniture">Furniture</option>
                                        </select>
                                    </div>
                                    <!--end form-group-->
                                </div>

                            </div>
                            <!--end row-->
                        </section>

                        <section>
                            <h2>Details</h2>
                            <div class="form-group">
                                <label for="details" class="col-form-label">Additional Details</label>
                                <textarea name="details" id="details" class="form-control" rows="4"></textarea>
                            </div>
                            <!--end form-group-->
                        </section>

                        <section>
                            <h2>Location</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label required">City</label>
                                        <select name="city" id="city" data-placeholder="Select City" required>
                                            <option value="">City</option>
                                            <option value="1">London</option>
                                            <option value="2">New York</option>
                                            <option value="3">Paris</option>
                                            <option value="4">Moscow</option>
                                        </select>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district" class="col-form-label required">District</label>
                                        <select name="district" id="district" data-placeholder="Select District" required>
                                            <option value="">District</option>
                                            <option value="1">Manhattan</option>
                                            <option value="2">Brooklyn</option>
                                            <option value="3">Queens</option>
                                            <option value="4">The Bronx</option>
                                            <option value="5">Staten Island</option>
                                        </select>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="street" class="col-form-label">Street</label>
                                        <input name="street" type="text" class="form-control" id="street">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                            </div>
                            <!--end row-->

                            <!--end form-group-->

                        </section>

                        <section>
                            <h2>Product Picture</h2>
                            <div class="file-upload-previews"></div>
                            <div class="file-upload">
                                <input type="file" name="files"   accept="gif|jpg|png">
                            </div>
                        </section>



                        <section class="clearfix">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary large icon float-right">Save Product<i class="fa fa-chevron-right"></i></button>
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
