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
                <!--============ Secondary Navigation ===============================================================-->
                <?php include_once "includes/navbar.php"; ?>
                <!--============ End Secondary Navigation ===========================================================-->
               
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Book Training</h1>
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
                        <div class="col-md-4">
                            <h2>Get In Touch</h2>
                            <p>
                                Contact Us For Training
                            </p>
                            <br>
                            <figure class="with-icon">
                                <i class="fa fa-map-marker"></i>
                                <span>University Of Gujrat,<br>
                                GT Road Campus,<br>
                                Gujrat. </span>
                            </figure>
                            <br>
                            <figure class="with-icon">
                                <i class="fa fa-phone"></i>
                                <span>+92 333 1042473</span>
                            </figure>
                            <figure class="with-icon">
                                <i class="fa fa-envelope"></i>
                                <a href="#">19010819-G3@uog.edu.pk</a>
                            </figure>
                           
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-8">
                            <h2>Booking For Training</h2>
                            <form class="form email">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label required">Your Name</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="col-form-label required">Your Email</label>
                                            <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                </div>
                                <!--end row-->
                                <div class="form-group">
                                    <label for="subject" class="col-form-label">Subject</label>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="message" class="col-form-label required">Your Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
                                </div>
                                <!--end form-group-->
                                <button type="submit" class="btn btn-primary float-right">Send Message</button>
                            </form>
                            <!--end form-->
                        </div>
                        <!--end col-md-8 -->
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
