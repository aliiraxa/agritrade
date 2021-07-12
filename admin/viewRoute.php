<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Route.php')?>
<?php
if (isset($_GET['delRoute'])) {
    $route=new Route();
    $id=$_GET['delRoute'];
    $delCheck=$route->deleteById($id);
    echo "<script>location.replace('viewRoute.php');</script>";
}
if(isset($_POST['deleteAll']))
{
    $route=new Route();
    $delCheck=$route->deteteAll();
    echo "<script>location.replace('viewRoute.php');</script>";
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header">All Route List</h3>
                </div>
                <div class="col-lg-2" style="margin-top: 40px;">
                    <form action="" method="POST"><button class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" name="deleteAll" ><i class="fa fa-remove"></i> Delete All</button></form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <span class="success">
            <?php
            if(isset($_GET['delRoute']))
            {
                if($delCheck)
                {
                    echo $delCheck;
                }
            }
            ?>
            </span>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            View Route Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Route ID</th>
                                    <th>Route No</th>
                                    <th>Route Address</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $route=new Route();
                                $getAll=$route->getByAll();
                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                    ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $result['route_id']; ?></td>
                                    <td><?php echo $result['route_No']; ?></td>
                                    <td><?php echo $result['route_address']; ?></td>
                                    <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editRoute.php?editRoute=<?php echo $result['route_id']; ?>"><i class="fa fa-edit"></i> Edit</a> <a onclick="return confirm('Are you sour to delete!')" href="viewRoute.php?delRoute=<?php echo $result['route_id']; ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a></td>
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