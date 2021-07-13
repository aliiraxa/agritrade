<?php
include_once ('classes/manage.php');
include 'lib/session.php';
Session::CheckSession();
if ($_GET['date']==NULL ) {
    echo "<script>window.location='generateReport.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Billing Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border:1px solid black;
        }
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700);

        body{
            font-family: 'Source Sans Pro';
        }

        .container{
            width: 400px;
            margin: 0 auto;
        }

        a.print{
            text-decoration: none;
            display: inline-block;
            width: 75px;
            margin: 20px auto;
            background: #dc143c;
            background: linear-gradient(#e3647e, #DC143C);
            text-align: center;
            color: #fff;
            padding: 3px 6px;
            border-radius: 3px;
            border: 1px solid #e3647e;
        }

        i.fa.fa-print{
            margin-right: 5px;
        }
    </style>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div style="text-align: center">
    <input id="printpagebutton" type="button" value="Print Report"  onclick="printpage()"/>
<h2>Billing Report</h2>
    <?php
    $date=$_GET['date'];
    $eDate=$_GET['eDate'];
    ?>
<p><?php if($eDate==null){ $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); echo "Starting From $xdate To $xdate";}else { $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); $idate=date_create($eDate); $uDate=date_format($idate,"m/d/y"); echo "Starting From $xdate To $uDate";}  ?> </p>
</div>
<table>
    <tr>
        <th>ID.</th>
        <th>Order Date</th>
        <th>Buyer Name</th>
        <th>Buyer Email</th>
        <th>Seller Name</th>
        <th>Seller Email</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>QTY</th>
        <th>Total Amount</th>
        <th>status</th>
        <th>Receive Date</th>
    </tr>
    <?php
    $report=new ManageAdmin();
    $totalOrderAmount=0;
    $totalCompleteOrder=0;
    $totalCancelOrder=0;
    if($eDate==null)
    $getAll=$report->getByDate($date);
    else
        $getAll=$report->getByBothDate($date,$eDate);
    if ($getAll) {
    while ($result=$getAll->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $result['id']; ?></td>
        <td><?php echo $result['order_date']; ?></td>
        <td><?php echo $result['buyer_name']; ?></td>
        <td><?php echo $result['buyer_email']; ?></td>
        <td><?php echo $result['seller_name']; ?></td>
        <td><?php echo $result['sellery_email']; ?></td>

        <td><?php echo $result['product_name']; ?></td>
        <td><?php echo $result['product_price']; ?></td>
        <td><?php echo $result['product_qty']; ?></td>
        <td><?php echo $result['product_qty']*$result['product_price']." PKR"; ?></td>
        <td><?php
            if($result['status']==1)
                $totalCompleteOrder=$result['product_qty']*$result['product_price'];
            else if($result['status']==2)
                $totalCancelOrder=$result['product_qty']*$result['product_price'];

                $totalOrderAmount=$result['product_qty']*$result['product_price'];

            echo $result['status']; ?></td>
        <td><?php echo $result['receive_date']; ?></td>

    </tr
    <?php }}else {
        if($eDate==null)
        echo "<script>alert('Record Not Found');</script>";
        else echo "<script>alert('Start Or End Date Out Of Rang Record Not Found');</script>";
        echo "<script>window.location='report.php'</script>";
    }?>
</table>
<b>Total Order Amount: <?php

   echo $totalOrderAmount." PKR";
   ?></b><br>
<b>Total Complete Order Amount: <?php

    echo $totalCompleteOrder." PKR"; ?></b><br>
<b>Total Cancel Order Amount: <?php

    echo $totalCancelOrder." PKR"; ?></b>

<script>
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden'
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>

</body>
</html>
