<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Entery.php')?>
<?php
if (isset($_GET['delEntry'])) {
    $entry=new Entery();
    $id=$_GET['delEntry'];
    $delCheck=$entry->deleteEntry($id);
    echo "<script>location.replace('viewEntry.php');</script>";
}
if(isset($_POST['deleteAll']))
{
    $entry=new Entery();
    $delCheck=$entry->deleteAll();
    echo "<script>location.replace('viewEntry.php');</script>";
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-5">
                    <h3 class="page-header">All Entries</h3>
                </div>
                <div class="col-lg-3" style="margin-top: 40px;">
                    <form action="" method="post"><input class="form-control" name="date" type="date" style="display: inline-block">
                </div>
                <div class="col-lg-2" style="margin-top: 40px;">
                   <button class="btn btn-primary" name="search"><i class="fa fa-search" aria-hidden="true"></i></button></form>
                </div>
                <div class="col-lg-2" style="margin-top: 40px;">
                    <form action="" method="POST"><button class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" name="deleteAll" ><i class="fa fa-remove"></i> Delete All</button></form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Entry Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>BusNo</th>
                                    <th>Driver</th>
                                    <th>RouteNo</th>
                                    <th>Route</th>
                                    <th>OutTime</th>
                                    <th>OutDate</th>
                                    <th>InTime</th>
                                    <th>InDate</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $entry=new Entery();
                                $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );
                                $currentdate = $date->format('Y-m-d');
                                if(isset($_POST['search']) && $_POST['date']!=0000-00-00)
                                {
                                    $currentdate=$_POST['date'];
                                }
                                $getAll=$entry-> getByDate($currentdate);

                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $result['bus_No']; ?></td>
                                            <td><?php echo $result['bus_Driver']; ?></td>
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
                                            <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editEntry.php?editEntry=<?php echo $result['entry_id']; ?>"><i class="fa fa-edit"></i> Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="viewEntry.php?delEntry=<?php echo $result['entry_id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

<?php include('includes/footer.php')?>