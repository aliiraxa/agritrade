<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php
if (isset($_POST['addUser']))
{
    $user=new User();
    $userName=$_POST['userName'];
    $password=$_POST['password'];
    $userCheck=$user->insertUser($userName,$password);
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add User</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert User Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="addUser.php">
                                 <span style="color:red; font-size:16px;"><?php
                                     if (isset($_POST['addUser'])) {
                                         if($userCheck)
                                         {
                                             echo $userCheck;
                                         }
                                     }
                                     ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" pattern="[a-z,A-Z]+[0-9]*" title="Username like username123" name="userName" autocomplete="off" placeholder="Enter Username" />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" minlength="5" placeholder="Enter Password" />
                                        </div>
                                        <button type="submit" name="addUser" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Save</button>
                                        <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                                    </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

<?php include('includes/footer.php')?>