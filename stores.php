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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
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
                    $record=$m->getStores();





                ?>
                <!--end collapse-->
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Stores Listing</h1>
                            </div>

                        </div>
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
                    <table id="myTable" class="display">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>District</th>
                            <th>Street</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($record)
                        {
                        while ($records=$record->fetch_assoc())
                        {

                        ?>
                        <tr>
                            <td><?php  echo $records['id']; ?></td>
                            <td><?php  echo $records['name']; ?></td>
                            <td><?php  echo $records['email']; ?></td>
                            <td><?php  echo $records['phone']; ?></td>
                            <td><?php  echo $records['city']; ?></td>
                            <td><?php  echo $records['district']; ?></td>
                            <td><?php  echo $records['street']; ?></td>
                        </tr>
                        <?php

                        }
                        }
                        ?>
                        </tbody>
                    </table>
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