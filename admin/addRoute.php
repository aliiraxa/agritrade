<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Route.php') ?>
<?php
if (isset($_POST['addRoute']))
{
    $route=new Route();
    $routeNo=$_POST['routeNo'];
    $routeAddress=$_POST['routeAddress'];
    $routeCheck=$route->insertRoute($routeNo,$routeAddress);
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Route</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Insert Route Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" action="addRoute.php" method="post">
                                  <span style="color:red; font-size:16px;"><?php
                                      if (isset($_POST['addRoute'])) {
                                          if($routeCheck)
                                          {
                                              echo $routeCheck;
                                          }
                                      }
                                      ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Route No</label>
                                            <input class="form-control" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required inputmode="numeric" autocomplete="off" name="routeNo" placeholder="Enter Route No" />
                                        </div>
                                        <div class="form-group">
                                            <label>Route Address</label>
                                            <input class="form-control" pattern="[a-z, ,A-Z]+" title="Enter Only String" name="routeAddress" required autocomplete="off" placeholder="Enter Route Address" />
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="addRoute"><i class="fa fa-sign-out fa-fw"></i> Save</button>
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