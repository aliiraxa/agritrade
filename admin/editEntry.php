<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include_once('classes/Entery.php') ?>
<?php include_once('classes/Driver.php')?>
<?php include_once('classes/Route.php') ?>
<?php

$route=new Route();
$driver=new Driver();

?>
<?php
if (!isset($_GET['editEntry']) || $_GET['editEntry']==NULL) {
    echo "<script>window.location='viewEntry.php'</script>";
}else
{
    $id=$_GET['editEntry'];
    if (isset($_POST['updateEntry']))
    {
        $entry=new Entery();
        $busNo=$_POST['busNo'];
        $driverName=$_POST['DriverName'];
        $RouteAddress=$_POST['RouteAddress'];
        $outDate=$_POST['outDate'];
        $InDate=$_POST['InDate'];
        $busPlateNo=$_POST['busNoPlate'];
        $routeNo=$_POST['RouteNo'];
        $outTime=$_POST['outTime'];
        $InTime=$_POST['InTime'];
        $driverCnic=$_POST['driverCnic'];
        $routeId=$_POST['routeId'];
        $driverId=$_POST['driverId'];
        if($driverId!=null && $driverId!="driver")
        {
            $res1=$driver->getById($driverId);
            $driverDetail=$res1->fetch_assoc();
            $driverName=$driverDetail['driver_name'];
            $driverCnic=$driverDetail['driver_cnic'];
        }
        if($routeId!=null && $routeId!="route"){
            $res=$route->getById($routeId);
            $routeDetail=$res->fetch_assoc();
            $RouteAddress=$routeDetail['route_address'];
            $routeNo=$routeDetail['route_No'];
            $entryCheck = $entry->updateEntry($busNo, $driverName, $RouteAddress, $outDate, $InDate, $busPlateNo, $routeNo, $outTime, $InTime, $id,$driverCnic);
        }
        else if($routeId==null || $driverId==null)
            $entryCheck="Any Field Not Be empty...";
        else
            {
                $entryCheck = $entry->updateEntry($busNo, $driverName, $RouteAddress, $outDate, $InDate, $busPlateNo, $routeNo, $outTime, $InTime, $id,$driverCnic);
            }
    }
}
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Entry</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Update Entry Information</b>
                        </div>
                        <div class="panel-body">
                            <form role="form"  method="post" action="">
                                <div class="col-lg-12"><span style="color:red; font-size:16px;"><?php
                                    if (isset($_POST['updateEntry'])) {
                                        if($entryCheck)
                                        {
                                            echo $entryCheck;
                                        }
                                    }
                                    $entry=new Entery();
                                    $res=$entry->getById($id);
                                    if ($res) {
                                        $result=$res->fetch_assoc();
                                    ?>
                                </span></div>
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Bus No: (e.g 26)</label>
                                            <input class="form-control" pattern="[0-9]+" value="<?php echo $result['bus_No']; ?>" type="number" required name="busNo" placeholder="Bus No" />
                                        </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Driver</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="driverId">
                                                    <option value="driver"><?php echo $result['bus_Driver']; ?></option>
                                                    <option value="">--------Driver list-----------</option>
                                                    <?php
                                                    $driver=new Driver();
                                                    $getAllDriver=$driver->getByAll();
                                                    if ($getAllDriver) {
                                                        while ($driverResult=$getAllDriver->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $driverResult['driver_id'];?>"><?php echo $driverResult['driver_name']." S/O ".$driverResult['father_name'];  ?></option>
                                                        <?php }} ?>
                                                </select>
                                            </div>
                                                 <input class="form-control" value="<?php echo $result['driver_cnic']; ?>" type="hidden"  name="driverCnic"  placeholder="Driver Name" />
                                                <input class="form-control" value="<?php echo $result['bus_Driver']; ?>" type="hidden"  name="DriverName"  placeholder="Driver Name"  />
                                            <input class="form-control" value="<?php echo $result['bus_route_address']; ?>" type="hidden" pattern="[a-z,A-Z][ ]*[a-z,A-Z]*" required name="RouteAddress" placeholder="Route Address" />
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Out Time(e.g HH:MM:SS)</label>
                                                <input class="form-control" type="time" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required name="outTime" value="<?php echo $result['OutTime']; ?>" placeholder="Out Time" />
                                            </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Out Date(e.g MM-DD-YYYY)</label>
                                            <input class="form-control" type="date" data-format="yyyy-mm-dd" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" value="<?php echo $result['Entry_Out_Date']; ?>" required name="outDate" placeholder="Out Date" />
                                        </div>

                                        </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Bus No Plate: (e.g LKM432)</label>
                                        <input class="form-control" pattern="[A-Z]+[0-9]+" title="Please User UpperCase" value="<?php echo $result['bus_plateNo']; ?>" name="busNoPlate" placeholder="Enter Bus No Plate" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Route</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="routeId">
                                            <option value="route"><?php echo $result['bus_Route_No']." ".$result['bus_route_address']; ?></option>
                                            <option value="">--------Route list-----------</option>
                                            <?php
                                            $getAllRoute=$route->getByAll();
                                            if ($getAllRoute) {
                                                while ($routeResult=$getAllRoute->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $routeResult['route_id']; ?>"><?php echo $routeResult['route_No']." ".$routeResult['route_address'];?></option>
                                                <?php }} ?>
                                        </select>
                                    </div>
                                        <input class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="hidden" value="<?php echo $result['bus_Route_No']; ?>" required name="RouteNo" placeholder="Route No" />
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">In Time(e.g HH:MM:SS)</label>
                                        <input class="form-control" type="time" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}+" required name="InTime" value="<?php echo $result['InTime']; ?>" placeholder="In Time" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">In Date(e.g MM-DD-YYYY)</label>
                                        <input class="form-control" type="date" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" required name="InDate" value="<?php echo $result['Entry_In_Date']; ?>" placeholder="In Date" />
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12" style="margin-left: 20px;">
                                <button type="submit" class="btn btn-primary" name="updateEntry"><i class="fa fa-sign-out fa-fw"></i> Update</button>
                                        <a href="viewEntry.php" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> Cancel</a>
                                </div>
                                    </div>
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