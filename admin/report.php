<?php
include_once ('classes/report.php');
include 'lib/session.php';
Session::CheckSession();
if ($_GET['date']==NULL ) {
    echo "<script>window.location='entryReport.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Entry Report</title>
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
<h2>Bus Entry Report</h2>
    <?php
    $date=$_GET['date'];
    $eDate=$_GET['eDate'];
    ?>
<p><?php if($eDate==null){ $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); echo "Starting From $xdate To $xdate";}else { $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); $idate=date_create($eDate); $uDate=date_format($idate,"m/d/y"); echo "Starting From $xdate To $uDate";}  ?> </p>
</div>
<table>
    <tr>
        <th>BusNo</th>
        <th>PlateNo</th>
        <th>Driver</th>
        <th>Cnic No</th>
        <th>RouteNo</th>
        <th>Route</th>
        <th>OutTime</th>
        <th>OutDate</th>
        <th>InTime</th>
        <th>InDate</th>
    </tr>
    <?php
    $report=new report();
    if($eDate==null)
    $getAll=$report->singleReport($date);
    else
        $getAll=$report->bothReport($date,$eDate);
    if ($getAll) {
    while ($result=$getAll->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $result['bus_No']; ?></td>
        <td><?php echo $result['bus_plateNo']; ?></td>
        <td><?php echo $result['bus_Driver']; ?></td>
        <td><?php echo $result['driver_cnic']; ?></td>
        <td><?php echo $result['bus_Route_No']; ?></td>
        <td><?php echo $result['bus_route_address']; ?></td>
        <td><?php $date=date_create($result['OutTime']);
            echo date_format($date,"h:i:s A");
            ?></td>
        <td><?php $date=date_create( $result['Entry_Out_Date']);
            echo date_format($date,"m/d/y");
            ?></td>
        <td><?php if($result['InTime']=='00:00:00'){echo $result['InTime'];}else{ $date=date_create($result['InTime']);
                echo date_format($date,"h:i:s A");}
            ?></td>
        <td><?php if($result['Entry_In_Date']=='0000-00-00'){echo $result['Entry_In_Date'];}else{$date=date_create( $result['Entry_In_Date']);
                echo date_format($date,"m/d/y");}
            ?></td>
    </tr
    <?php }}else {
        if($eDate==null)
        echo "<script>alert('Record Not Found');</script>";
        else echo "<script>alert('Start Or End Date Out Of Rang Record Not Found');</script>";
        echo "<script>window.location='entryReport.php'</script>";
    }?>
</table>

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
