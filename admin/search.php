<?php include('includes/header.php')?>
<?php include('includes/sideBar.php')?>
<?php include_once('classes/Entery.php')?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="page-header"> Search Entry</h3>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-2" style="margin-top: 40px;">
                    <form action="" method="post"><button class="btn btn-primary" name="searchAll"><i class="fa fa-search" aria-hidden="true"></i> Search All</button></form>
                </div>
                <div class="col-lg-2" style="margin-top: 40px;">
                    <form action="" method="POST"><button class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" name="deleteAll" >Delete All</button></form>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Search Parameters</b>
                            </div>
                            <div class="panel-body">
                                <form role="form" class="col-lg-12" action="" method="post">
                                    <div class="form-group">
                                        <label>Bus No</label>
                                        <input class="form-control" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"   inputmode="numeric" autocomplete="off" name="busNo" placeholder="Enter Bus No" />
                                    </div>
                                    <div class="form-group">
                                        <label>Route No</label>
                                        <input class="form-control" type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"   inputmode="numeric" autocomplete="off" name="routeNo" placeholder="Enter Route No" />
                                    </div>
                                    <div class="form-group">
                                        <label>Single Date</label>
                                        <input class="form-control" type="date"  autocomplete="off" name="date" />
                                    </div>
                                    <div class="form-group text-center">
                                     <label>Select Signal Date Or Between Date</label>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Start Date</label>
                                        <input class="form-control" type="date"   autocomplete="off" name="sDate" />
                                    </div>
                                        <div class="form-group col-lg-6">
                                            <label>End Date</label>
                                            <input class="form-control" type="date" autocomplete="off" name="eDate" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right" name="search"><i class="fa fa-search fa-fw"></i> Seatch</button>
                                </form>

                            </div>
                            <!-- /.panel-body -->
                        <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Entry Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>BusNo</th>
                                    <th>Driver</th>
                                    <th>RouteNo</th>
                                    <th>Route</th>
                                    <th>OutTime</th>
                                    <th>OutDate</th>
                                    <th>InTime</th>
                                    <th>InDate</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $entry=new Entery();
                                $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );
                                $currentdate = $date->format('Y-m-d');
                                if(isset($_POST['search1']) && $_POST['date']!=0000-00-00)
                                {
                                    $currentdate=$_POST['date'];
                                }
                                $getAll=$entry-> getByDate($currentdate);
                                if(isset($_POST['search']))
                                {
                                    $busNo=$_POST['busNo'];
                                    $routeNo=$_POST['routeNo'];
                                    $Date=$_POST['date'];
                                    $sDate=$_POST['sDate'];
                                    $eDate=$_POST['eDate'];
                                    if(empty($busNo) && empty($routeNo) && empty($Date) && (empty($sDate) || empty($eDate)))
                                    {
                                        echo "<script>alert('Please Choose Any One Field To Search');</script>";
                                        echo "<script>location.replace('search.php');</script>";

                                    }else
                                    {
                                        if(!empty($Date) && !empty($sDate))
                                        {
                                            echo "<script>alert('Please Choose One Option Signal Or Between Date Opetion');</script>";
                                            echo "<script>location.replace('search.php');</script>";
                                        }else
                                        {
                                            $getAll=$entry->search($busNo,$routeNo,$Date,$sDate,$eDate);
                                        }

                                    }
                                }
                                if(isset($_POST['searchAll']))
                                    $getAll=$entry->getByAllEntry();
                                if ($getAll) {
                                    while ($result=$getAll->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $result['bus_No']; ?></td>
                                            <td><?php echo $result['bus_Driver']; ?></td>
                                            <td><?php echo $result['bus_Route_No']; ?></td>
                                            <td><?php echo $result['bus_route_address']; ?></td>
                                            <td><?php $date=date_create($result['OutTime']);
                                                echo date_format($date,"h:i:s A");
                                                ?></td>
                                            <td><?php $date=date_create( $result['Entry_Out_Date']);
                                                echo date_format($date,"m/d/y");
                                                ?></td>
                                            <td><?php if($result['InTime']=='00:00:00'){echo $result['InTime'];}else{ $date=date_create($result['InTime']);
                                                    echo date_format($date,"h:i:s A");}
                                                ?></td>
                                            <td><?php if($result['Entry_In_Date']=='0000-00-00'){echo $result['Entry_In_Date'];}else{$date=date_create( $result['Entry_In_Date']);
                                                    echo date_format($date,"m/d/y");}
                                            ?></td>
                                            <td class="center"  style="text-align: center;"><a class="btn btn-primary"  href="editEntry.php?editEntry=<?php echo $result['entry_id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sour to delete!')" href="viewEntry.php?delEntry=<?php echo $result['entry_id']; ?>">Delete</a></td>
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