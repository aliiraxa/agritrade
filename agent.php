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
                <?php include_once "config/manage.php"; ?>
                <?php
                if (!Session::get('Login') == true)
                {
                    echo '<script>window.location.replace("index.php")</script>';
                }
                if (Session::get('role') != 3)
                {
                    echo '<script>window.location.replace("index.php")</script>';
                }
                $login=new Login();
                $m=new Manage();
                    if(isset($_POST['profile']))
                    {


                        $m->applyForAgent(Session::get('email'));


                    }

                ?>

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
                                <a class="nav-link icon" href="change-password.php">
                                    <i class="fa fa-recycle"></i>Change Password
                                </a>
                            </nav>
                        </div>
                        <!--end col-md-3-->
                        <?php
                            $results=$login->getCurrentUser(Session::get('email'));
                            $userData=$results->fetch_assoc();

                            if(!$userData['address'])
                            {
                                echo "<script>alert('Please Fill Your Profile First')</script>";
                                echo '<script>window.location.replace("my-profile.php")</script>';
                            }

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
                                                            <option value="1">Mrs</option>
                                                            <option value="2">Mr</option>
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

                                      
                                        <?php

                                        $status=$m->getStatus(Session::get('email'));
                                        if($status['status']==0)
                                        {
                                            echo '<b style="color: red;">Note: Account In Review.</b>';
                                        }else if($status['status']==1)
                                        {
                                            echo '<b style="color: red;">Note: Account is Approved.</b>';
                                        }else
                                        {
                                        ?>
                                        <section class="clearfix">
                                            <button type="submit" name="profile" class="btn btn-primary float-right">Apply Now</button>
                                        </section>
                                        <b style="color: red;">Note: Account Only Admin Can Approved.</b>
                                         <?php
                                        }
                                         ?>
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