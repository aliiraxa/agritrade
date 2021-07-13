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
                    if(Session::get('role')==1)
                    {
                        $record=$m->getSellersOrders(Session::get('email'));
                    }else
                    {
                        $record=$m->getOrders(Session::get('email'));
                    }

                    if(isset($_GET['rec']))
                    {
                        $m->orderReceived($_GET['rec']);
                        echo '<script>window.location.replace("buyer_orders.php")</script>';
                    }





                ?>
                <!--end collapse-->
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Order Listing</h1>
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
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Agent</th>
                            <th>Agent No.</th>
                            <th>Received.</th>
                            <th>Action</th>
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
                            <td><?php  echo $records['product_name']; ?></td>
                            <td><?php  echo $records['product_price']; ?></td>
                            <td>

                                <?php
                                if($records['status']==0)
                                    {
                                        echo "<b style='color:red;'>Not a Full Fill</b>";
                                    }else  if($records['status']==1)
                                        echo "Full Filled";
                                else
                                    echo "Order Cancel";

                                ?>

                            </td>
                            <td><?php
                                if($records['agent_name'])
                                {
                                    echo $records['agent_name'];
                                }else
                                    echo "<b style='color:red;'>Awaiting For Agent</b>";
                                ?></td>
                            <td><?php  echo $records['agent_number']; ?></td>
                            <td><?php
                                if($records['receive_date']!="0000-00-00")
                                echo $records['receive_date'];
                                else
                                    echo "<b style='color:red;'>Not Yet</b>";
                                ?></td>
                            <td><a class="btn btn-info" href="view_order.php?id=<?php  echo $records['id']; ?>">View</a>
                                 <?php
                            if(Session::get('role')==1 && (!$records['agent_name']) && ($records['status']!=2))
                            {
                                ?>
                                <a class="btn btn-info" href="assign_agent.php?id=<?php  echo $records['id']; ?>">Assign Agent</a>
                            <?php } ?>
                             <?php
                            if(Session::get('role')==2 && ($records['agent_name']) && $records['receive_date']=="0000-00-00" && ($records['status']!=2))
                            {
                                ?>
                                 <a class="btn btn-info" href="buyer_orders.php?rec=<?php  echo $records['id']; ?>">Oder Received</a>
                            <?php } ?>
                            </td>
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