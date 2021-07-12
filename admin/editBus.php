<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Route.php') ?>
<?php include('classes/Driver.php') ?>
<?php include('classes/Bus.php') ?>
<?php
if (!isset($_GET['editBus']) || $_GET['editBus']==NULL) {
    echo "<script>window.location='viewBus.php'</script>";
}else
{
    $id=$_GET['editBus'];
    if (isset($_POST['updateBus']))
    {
        $bus=new Bus();
        $busPlateNo=$_POST['busNoPlate'];
        $busNo=$_POST['busNo'];
        $routeId=$_POST['routeId'];
        $driverId=$_POST['driverId'];
        $busCheck=$bus->updateBus($id,$busPlateNo,$busNo,$routeId,$driverId);
    }
}
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Bus</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Update Bus Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-7" method="post" action="">
                                <span style="color:red; font-size:16px;"><?php
                                    if (isset($_POST['updateBus'])) {
                                        if($busCheck)
                                        {
                                            echo $busCheck;
                                        }

                                    }
                                        $bus=new Bus();
                                        $getAll=$bus->getById($id);
                                        if ($getAll) {
                                            $result=$getAll->fetch_assoc();
                                    ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Bus No Plate: (e.g LKM432)</label>
                                            <input class="form-control" required value="<?php echo $result['bus_plateNo']; ?>"  pattern="[A-Z]+[0-9]+" name="busNoPlate" placeholder="Enter Bus No Plate" />
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Bus No: (e.g 26)</label>
                                            <input class="form-control" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $result['bus_no']; ?>" type="text" name="busNo"  placeholder="Enter Bus No" />
                                        </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Route</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="routeId">
                                        <?php
                                        $route=new Route();
                                        $getById=$route->getById($result['route_id']);
                                        if($getById) {
                                            $rResult=$getById->fetch_assoc();
                                            ?>
                                            <option value="<?php echo $rResult['route_id']; ?>"><?php echo $rResult['route_address']; ?></option>
                                            <?php
                                        }
                                        $getAllRoute=$route->getByAll();
                                        if ($getAllRoute) {
                                        while ($routeResult=$getAllRoute->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $routeResult['route_id']; ?>"><?php echo $routeResult['route_No']." ".$routeResult['route_address'];?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Driver</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="driverId">
                                        <?php
                                        $driver=new Driver();
                                        $getDriver=$driver->getById($result['driver_id']);
                                        $dResult=$getDriver->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $dResult['driver_id']; ?>"><?php echo $dResult['driver_name'] ?></option>
                                        <?php

                                        $getAllDriver=$driver->getByAll();
                                        if ($getAllDriver) {
                                        while ($driverResult=$getAllDriver->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $driverResult['driver_id']; ?>"><?php echo $driverResult['driver_name']." S/O ".$driverResult
                                            ['father_name']?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="updateBus"><i class="fa fa-sign-out fa-fw"></i> Save</button>
                                <a href="viewBus.php" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
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