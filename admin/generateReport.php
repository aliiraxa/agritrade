<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php
ob_start();
if(isset($_POST['sReport']))
{
    $sDate=$_POST['sDate'];
    //header('Location: report.php?t1='.$t1.'&t2='.$t2);
    //echo "<script>alert('$sDate');</script>";
   // header('Location: report.php?date='.$sDate.'&eDate=');
    echo "<script>location.replace('report.php?date=$sDate&eDate=');</script>";

}
if(isset($_POST['mReport']))
{
    $sDate=$_POST['startDate'];
    $eDate=$_POST['endDate'];
   // header('Location: report.php?date='.$sDate.'&eDate='.$eDate);
     //echo "<script>alert('$sDate.$eDate');</script>";
    //header('Location: report.php?date='.$sDate);
    echo "<script>location.replace('report.php?date=$sDate&eDate=$eDate');</script>";
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Entry Report</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                 <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Multi Date Entry Report</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="col-lg-12" method="post" action="">
                                 <span style="color:red; font-size:16px;">
                                  </span>
                                        <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>Start Date:</label>
                                            <input class="form-control" required type="date" name="startDate" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>End Date:</label>
                                            <input class="form-control" required type="date" name="endDate" />
                                        </div>
                                        </div>
                                        <button type="submit" name="mReport" class="btn btn-primary"><i class="fa fa-file fa-fw"></i> Report</button>
                                        <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
                                    </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                 <div class="col-lg-6">
                     <div class="panel panel-primary">
                         <div class="panel-heading">
                             <b>Signal Date Entry Report</b>
                         </div>
                         <div class="panel-body">
                             <form role="form" class="col-lg-12" method="post" action="">
                                 <span style="color:red; font-size:16px;">
                                  </span>
                                 <div class="form-group">
                                     <label>Select Date:</label>
                                     <input class="form-control" required type="date" name="sDate" />
                                 </div>
                                 <button type="submit" name="sReport" class="btn btn-primary"><i class="fa fa-file fa-fw"></i> Signal Report</button>
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