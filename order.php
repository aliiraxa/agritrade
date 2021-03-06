<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <title>Agritrade Project</title>

</head>
<body>
    <div class="page sub-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header class="hero">
            <div class="hero-wrapper">
                <?php include_once "includes/navbar.php"; ?>
                <?php include_once "config/manage.php"; ?>
                <?php
                if (Session::get('role') != 2)
                {

                    echo '<script>window.location.replace("index.php")</script>';
                }
                $m=new Manage();
                $id=$_GET['pro'];
                if(!isset($_GET['pro']))
                {
                    echo '<script>window.location.replace("index.php")</script>';
                }
                if(isset($_POST['add']))
                {
                $oldEmail=Session::get('email');

                $title=$_POST['title'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $city=$_POST['city'];
                $district=$_POST['district'];
                $street=$_POST['street'];
                $id=$_POST['id'];

                   $m->orderNow($title,$price,$qty,$name,$email,$phone,$city,$district,$street,$oldEmail,$id);

                    echo '<script>window.location.replace("buyer_orders.php")</script>';
                }


                $pro=$m->getProductById($id);
                $products=$pro->fetch_assoc();





                ?>
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Add Order</h1>
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Page Title =====================================================================-->
                <div class="background"></div>
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
        </header>
        <!--end hero-->

        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="content">
            <section class="block">
                <div class="container">

                    <form class="form form-submit" method="post" action="" enctype="multipart/form-data">
                        <section>
                            <h2>Basic Information</h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label required">Title</label>
                                        <input name="title" type="text" readonly value="<?php echo $products['title']; ?>" class="form-control" id="title" placeholder="Title" required>
                                        <input name="id" type="hidden" readonly value="<?php echo $products['id']; ?>" class="form-control" id="id"  >

                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-8-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label required">Price</label>
                                        <input name="price" type="text" value="<?php echo $products['price']; ?>" readonly class="form-control" id="price" required>
                                        <span class="input-group-addon">PKR</span>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label required">QTY</label>
                                        <input name="qty" type="number" value="1" onkeyup="calPrice()" onkeypress="return event.charCode >= 48" min="1"  class="form-control" id="qty" required>

                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label required">Total Price</label>
                                        <input name="totalPrice" type="text" value="<?php echo $products['price']; ?>" readonly class="form-control" id="totalPrice" required>
                                        <span class="input-group-addon">PKR</span>
                                    </div>
                                    <!--end form-group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label required">Your Name</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label required">Your Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label required">Your Phone</label>
                                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                            </div>
                        </section>
                        <!--end basic information-->



                        <section>
                            <h2>Location</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label required">City</label>
                                        <input name="city" type="text" class="form-control" id="" placeholder="City">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district" class="col-form-label required">District</label>
                                        <input name="district" type="text" class="form-control" id="" placeholder="District">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="street" class="col-form-label required">Street</label>
                                        <input name="street" type="text" class="form-control" id="street" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                            </div>
                            <!--end row-->

                            <!--end form-group-->

                        </section>



                        <section class="clearfix">
                            <div class="form-group">
                                <button type="submit" name="add"  class="btn btn-primary large icon float-right">Order<i class="fa fa-chevron-right"></i></button>
                            </div>
                        </section>
                    </form>
                    <!--end form-submit-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->

        <?php

include_once "includes/footer.php";

?>
        <script>

            function  calPrice()
            {
                var qty=document.getElementById("qty").value;
                var price=document.getElementById('price').value;

                var id=document.getElementById('id').value;
                $(document).ready(function() {
                    var response = '';
                    $.ajax({
                        type: "POST",
                        url: "config/record.php",
                        data: {name: id},
                        async: false,
                        success: function(text) {
                            response = text;
                        }
                    });
                    if(parseInt(response)>parseInt(qty))
                    {
                        document.getElementById('totalPrice').value = qty * price;
                    }
                    else
                    {
                        document.getElementById("qty").value = "1";
                        document.getElementById('totalPrice').value = price;
                        alert('Stock Is less than Your QTY Available Stock:'+response);

                    }
                });
            }





        </script>