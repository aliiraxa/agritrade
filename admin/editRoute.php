<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Route.php') ?>
<?php
if (!isset($_GET['editRoute']) || $_GET['editRoute']==NULL) {
    echo "<script>window.location='viewRoute.php'</script>";
}else
{

    $id=$_GET['editRoute'];
    if (isset($_POST['updateRoute']))
    {
        $route=new Route();
        $routeNo=$_POST['routeNo'];
        $routeAddress=$_POST['routeAddress'];
        $routeCheck=$route->UpdateRoute($id,$routeNo,$routeAddress);
    }
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Route</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Update Route Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" action="" method="post">
                                  <span style="color:red; font-size:16px;">
                                      <?php
                                      if (isset($_POST['updateRoute'])) {
                                          if($routeCheck)
                                          {
                                              echo $routeCheck;
                                          }
                                      }
                                      $route=new Route();
                                        $getAll=$route->getById($id);
                                        if ($getAll) {
                                            $result1=$getAll->fetch_assoc();

                                      ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Route No</label>
                                            <input class="form-control" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $result1['route_No']; ?>" name="routeNo" placeholder="Enter Route No" />
                                        </div>
                                        <div class="form-group">
                                            <label>Route Address</label>
                                            <input class="form-control" name="routeAddress" pattern="[a-z, ,A-Z]+" required value="<?php echo $result1['route_address'] ?>" placeholder="Enter Route Address" />
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="updateRoute"><i class="fa fa-sign-out fa-fw"></i> Save</button>
                                        <a href="viewRoute.php" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
                                    </form>
                                            <?php } ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

<?php include('includes/footer.php')?>