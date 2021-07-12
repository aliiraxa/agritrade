<?php
include_once "config\session.php";
include_once "config\database.php";
Session::init();

?>

<!--============ Secondary Navigation ===============================================================-->
<div class="secondary-navigation">
    <div class="container">
        <!--end left-->
        <ul class="right">
            <?php
            if(Session::get('Login')!=true)
            {
            ?>
            <li>
                <a href="sign-in.php">
                    <i class="fa fa-sign-in"></i>Sign In
                </a>
            </li>
            <li>
                <a href="register.php">
                    <i class="fa fa-pencil-square-o"></i>Register
                </a>
            </li>
            <?php }else {?>
            <li>
                <a>
                    <?php  echo "Welcome, " .Session::get('name');  ?>
                </a>
            </li>
            <?php } ?>
        </ul>
        <!--end right-->
    </div>
    <!--end container-->
</div>
<!--============ End Secondary Navigation ===========================================================-->
<!--============ Main Navigation ====================================================================-->
<div class="main-navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <!--Main navigation list-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sellers.php">Sellers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stores.php">Zari Stores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <?php
                    if(Session::get('Login')==true)
                    {
                    ?>
                    <li class="nav-item has-child">
                        <a class="nav-link" href="#">User Panel</a>
                        <ul class="child">
                            <li class="nav-item">
                                <a href="my-profile.php" class="nav-link">My Profile</a>
                            </li>
                            <?php
                            if(Session::get('role')==1)
                            {
                            ?>
                            <li class="nav-item">
                                <a href="seller_all_listing.php" class="nav-link">My Listing</a>
                            </li>
                            <?php } ?>
                            <?php
                            if(Session::get('role')==4)
                            {
                                ?>
                                <li class="nav-item">
                                    <a href="submit_store.php" class="nav-link">My Store</a>
                                </li>
                            <?php } ?>

                            <?php
                            if(Session::get('role')==3)
                            {
                                ?>
                                <li class="nav-item">
                                    <a href="agent.php" class="nav-link">Apply For Transport Agent</a>
                                </li>
                            <?php } ?>

                            <?php
                            if(Session::get('role')==2)
                            {
                                ?>
                                <li class="nav-item">
                                    <a href="buyer_orders.php" class="nav-link">Buyer Order</a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a href="change-password.php" class="nav-link">Change
                                    Password</a>
                            </li>
                            <?php
                            if (isset($_GET['action']) && $_GET['action']=="logout") {
                                session::destroy();
                            }
                            ?>
                            <li class="nav-item">
                                <a href="?action=logout" class="nav-link">Log Out</a>
                            </li>
                        </ul>

                    </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a href="book.php" class="btn btn-primary text-caps btn-rounded btn-framed">Book Training</a>
                    </li>
                </ul>
                <!--Main navigation list-->
            </div>
            <!--end navbar-collapse-->
        </nav>
        <!--end navbar-->
    </div>
    <!--end container-->
</div>