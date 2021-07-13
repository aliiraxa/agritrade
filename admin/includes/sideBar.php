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
                        <a href="sellers.php">View Sellers</a>
                        <a href="buyers.php">View Buyer</a>
                        <a href="agent.php">View Agents</a>
                        <a href="listers.php">Store Lister's</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span> Stores list<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="stores.php">View Stores</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Products<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="product.php">Products</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="glyphicon glyphicon-sort-by-order-alt" aria-hidden="true"></i> Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="orders.php">View Orders</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>



            <li>
                <a href="generateReport.php"><i class="fa fa-bar-chart fa-fw"></i> Billing Report</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
