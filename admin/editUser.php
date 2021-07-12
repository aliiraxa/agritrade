<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php
if (!isset($_GET['editUser']) || $_GET['editUser']==NULL) {
    echo "<script>window.location='buyers.php'</script>";
}else
{
    $id=$_GET['editUser'];
    if (isset($_POST['updateUser'])) {
        $user=new User();
        $username=$_POST['userName'];
        $password=$_POST['password'];
        $check=$user->updateUser($id,$username,$password);
    }
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update User</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Update User Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="">
                                <span style="color:red; font-size:16px;">
                                <?php
                                    if (isset($_POST['updateUser'])) {
                                        if($check)
                                        {
                                            echo $check;
                                        }
                                    }
                                   $user=new User();
                                $getAll=$user->getUserById($id);
                                if ($getAll) {
                                    $result=$getAll->fetch_assoc();
                                    ?>
                                    </span>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" pattern="[a-z,A-Z]+[0-9]*" name="userName" title="please Enter Username like Username123" value="<?php echo $result['user_name']; ?>" placeholder="Enter Username" />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="text" minlength="5" name="password" value="<?php echo $result['user_password']; ?>" placeholder="Enter Password" />
                                        </div>
                                        <button type="submit" name="updateUser" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Save</button>
                                        <a href="buyers.php" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
                                    </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
                                <?php } ?>
<?php include('includes/footer.php')?>