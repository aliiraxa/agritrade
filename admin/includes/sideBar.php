<?php
ob_start();
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text"class="form-control" readonly placeholder="Quick Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="viewUser.php">View Sellers</a>
                        <a href="buyers.php">View Buyer</a>
                        <a href="viewUser.php">View Agents</a>
                        <a href="viewUser.php">Store Lister's</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Route<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addRoute.php">Add Route</a>
                    </li>
                    <li>
                        <a href="viewRoute.php">View Route</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Driver<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addDriver.php">Add Driver</a>
                    </li>
                    <li>
                        <a href="viewDriver.php">View Driver</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-bus" aria-hidden="true"></i> Buses<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addBus.php">Add Bus</a>
                    </li>
                    <li>
                        <a href="viewBus.php">View Bus Reocord</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Entry<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addEntry.php">Add Entry</a>
                    </li>
                    <li>
                        <a href="viewEntry.php">View Entry</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="search.php"><i class="fa fa-search"></i> Search Entry</a>
            </li>
            <li>
                <a href="entryReport.php"><i class="fa fa-bar-chart fa-fw"></i> Entry Report</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
