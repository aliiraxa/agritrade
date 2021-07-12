<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include('classes/Entery.php')?>
<?php
 if(isset($_POST['addEntryByNo']))
  {
    $entry=new Entery();
    $busNo=$_POST['busNo'];
    $entryCheck=$entry->noteEntryByBusNo($busNo);
  }
  if(isset($_POST['addEntryByPlate']))
  {
      $entry=new Entery();
      $busPlateNo=$_POST['busPlateNo'];
      $entryCheck=$entry->noteEntryByBusPlate($busPlateNo);
  }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Entry</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Note Entry Through Bus NO</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="addEntry.php">
                                  <span style="color:red; font-size:16px;"><?php
                                      if (isset($_POST['addEntryByNo'])) {
                                          if($entryCheck)
                                          {
                                              echo $entryCheck;
                                          }
                                      }
                                      ?>
                                  </span>
                                        <div class="form-group">
                                            <label>Entry Bus No: (Like. 26)</label>
                                            <input class="form-control" type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off" name="busNo" placeholder="Enter Bus No" required="true" />
                                        </div>
                                        <button type="submit" name="addEntryByNo" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Note Entry</button>
                                        <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                                    </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                 <div class="col-lg-5">
                     <div class="panel panel-primary">
                         <div class="panel-heading">
                             <b>Note Entry Throught Bus Plate</b>
                         </div></form>
                         <form role="form" method="post" type="number" action="addEntry.php">
                                  <span style="color:red; font-size:16px;"><?php
                                      if (isset($_POST['addEntryByPlate']) ) {
                                          if($entryCheck)
                                          {
                                              echo $entryCheck;
                                          }
                                      }
                                      ?>
                                  </span>
                         <div class="panel-body">
                             <form role="form">
                                 <div class="form-group">
                                     <label>Entry Bus Plate No: (Like. KML342)</label>
                                     <input class="form-control" autocomplete="off" pattern="[A-Z]{3}[A-Z]*[0-9]{3}[0-9]*" title="Please User UpperCase" name="busPlateNo" placeholder="Enter Bus Plate" required="true" />
                                 </div>
                                 <button type="submit" name="addEntryByPlate" class="btn btn-primary"><i class="fa fa-sign-out fa-fw"></i> Note Entry</button>
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