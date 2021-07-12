<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Driver.php')?>
<?php
if (isset($_GET['del']))
{

    $m=new ManageAdmin();
    $id=$_GET['del'];
    $delCheck=$m->deleteProduct($id);
    echo "<script>location.replace('product.php');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header">Products</h3>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>phone</th>
                                    <th>category</th>
                                    <th>about</th>
                                    <th>city</th>
                                    <th>district</th>
                                    <th>street</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $m=new ManageAdmin();
                                $getAll=$m->getProducts();
                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $result['id']; ?></td>
                                            <td><?php echo $result['title']; ?></td>
                                            <td><?php echo $result['price']."PKR"; ?></td>
                                            <td><?php echo $result['name']; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                            <td><?php echo $result['phone']; ?></td>
                                            <td><?php echo $result['category']; ?></td>
                                            <td><?php echo $result['about']; ?></td>
                                            <td><?php echo $result['city']; ?></td>
                                            <td><?php echo $result['district']; ?></td>
                                            <td><?php echo $result['street']; ?></td>

                                            <td class="center"  style="text-align: center;"><a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="product.php?del=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
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