<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php
if (isset($_GET['delUser'])) {
    $user=new ManageAdmin();
    $id=$_GET['delUser'];
    $delCheck=$user->deleteUser($id);
    echo "<script>location.replace('listers.php');</script>";
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">All Buyers</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <span class="success">
            <?php
            if(isset($_GET['delUser']))
            {
                if($delCheck)
                {
                    echo $delCheck;
                }
            }
            ?>
            </span>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            User Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>Name</th>
                                    <th>Pic</th>
                                    <th>About</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $user=new ManageAdmin();
                                     $getAll=$user->getStoreListers();

                                     if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                    ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['title'] ?></td>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><?php
                                        if($result['img'])
                                        {
                                        ?>
                                            <img width="100" height="100" src="../<?php  echo $result['img']; ?>">
                                            <?php } ?>
                                            </td>
                                    <td><?php echo $result['about'] ?></td>
                                    <td><?php echo $result['address'] ?></td>
                                    <td><?php echo $result['email'] ?></td>
                                    <td><?php echo $result['password'] ?></td>
                                    <td class="center"  style="text-align: center;">  <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="buyers.php?delUser=<?php echo $result['id']; ?>"><i class="fa fa-remove"></i> Delete</a></td>
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
<script>
    var check=true;
    function myFunction()
    {
        if(check)
        {
            document.getElementById('hybrid').type = 'text';
            document.getElementById('show').textContent="Hide";
            check=false;
        }
        else
        {
            document.getElementById('hybrid').type = 'password';
            document.getElementById('show').textContent="Show";
            check=true;
        }
    }

</script>
<?php include('includes/footer.php')?>