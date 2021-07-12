<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Route.php')?>
<?php
if (isset($_GET['delRoute'])) {
    $route=new ManageAdmin();
    $id=$_GET['delRoute'];
    $delCheck=$route->deleteById($id);
    echo "<script>location.replace('stores.php');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header">Stores</h3>
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
                            View Store Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>District</th>
                                    <th>Street</th>
                                    <th>Lister</th>
                                    <th>Lister Email</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $route=new ManageAdmin();
                                $getAll=$route->getStores();
                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {

                                        $res=$route->getUserById($result['user_id']);
                                        $ress=$res->fetch_assoc();

                                    ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $result['id']; ?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $result['phone']; ?></td>
                                    <td><?php echo $result['city']; ?></td>
                                    <td><?php echo $result['district']; ?></td>
                                    <td><?php echo $result['street']; ?></td>
                                    <td><?php echo $ress['name']; ?></td>
                                    <td><?php echo $ress['email']; ?></td>
                                    <td class="center"  style="text-align: center;"><a onclick="return confirm('Are you sour to delete!')" href="stores.php?delRoute=<?php echo $result['id']; ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a></td>
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