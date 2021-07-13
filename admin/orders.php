<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Bus.php')?>
<?php
if (isset($_GET['del'])) {
    $m=new ManageAdmin();
    $id=$_GET['del'];
    $delCheck=$m->deleteOrder($id);
    echo "<script>location.replace('orders.php');</script>";
}
if (isset($_GET['can']))
{
    $id=$_GET['can'];
    $m=new ManageAdmin();
    $delCheck=$m->CancelOrder($id);
    echo "<script>location.replace('orders.php');</script>";
}



?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header">All Order</h3>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Order Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order Date</th>
                                    <th>Buyer Name</th>
                                    <th>Buyer Email</th>
                                    <th>Buyer Mobile</th>
                                    <th>Seller Name</th>
                                    <th>Seller Email</th>
                                    <th>Seller Phone</th>
                                    <th>Agent Name</th>
                                    <th>Agent Phone</th>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Total Amount</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $m=new ManageAdmin();
                                $getAll=$m->getAllOrder();
                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $result['id']; ?></td>
                                            <td><?php echo $result['order_date']; ?></td>
                                            <td><?php echo $result['buyer_name']; ?></td>
                                            <td><?php echo $result['buyer_email']; ?></td>
                                            <td><?php echo $result['buyer_phone']; ?></td>
                                            <td><?php echo $result['seller_name']; ?></td>
                                            <td><?php echo $result['sellery_email']; ?></td>
                                            <td><?php echo $result['sellery_phone']; ?></td>
                                            <td><?php echo $result['agent_name']; ?></td>
                                            <td><?php echo $result['agent_number']; ?></td>
                                            <td><?php echo $result['product_name']; ?></td>
                                            <td><?php echo $result['product_price']; ?></td>
                                            <td><?php echo $result['product_qty']; ?></td>
                                            <td><?php echo $result['product_qty']*$result['product_price']." PKR"; ?></td>
                                            <td class="center"  style="text-align: center;"><a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="orders.php?del=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a>
                                                <?php
                                                if($result['receive_date']=="0000-00-00")
                                                {
                                                ?>
                                                <a class="btn btn-danger" onclick="return confirm('Are you sour to Cancel!')" href="orders.php?can=<?php echo $result['id']; ?>">Cancel</a>
                                            <?php } ?>

                                            </td>
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