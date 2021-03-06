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
                if (!Session::get('Login') == true)
                {
                    echo '<script>window.location.replace("index.php")</script>';
                }
                $m=new Manage();
                $id=$_GET['id'];

                if(!$id)
                    echo "<script>location.replace('seller_all_listing.php');</script>";

                $pro=$m->getProductById($id);
                $product=$pro->fetch_assoc();
                if(isset($_POST['add']))
                {
                $oldEmail=Session::get('email');
                $title=$_POST['title'];
                $price=$_POST['price'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $category=$_POST['category'];
                $about=$_POST['about'];
                $city=$_POST['city'];
                $district=$_POST['district'];
                $street=$_POST['street'];
                $img=$_FILES['img'];
                    $stock=$_FILES['stock'];
                $newPic=$_FILES["img"]["name"];


                    $size=$img['size'];


                    //image work here
                    $temp = explode(".", $_FILES["img"]["name"]);
                    $newfilename = str_replace(' ', '', $title) . '.' . end($temp);
                    $target_dir = "assets/img/products/";
                    $target_file = $target_dir . $newfilename;

                    $imageOk=$m->checkImage($target_file,$size);

                    if($newPic)
                    {
                        echo "getting pic";
                        if($imageOk==2)
                        {
                            $m->editProduct($title,$price,$stock,$name,$email,$phone,$category,$about,$city,$district,$street,$id,$target_file,$_FILES["img"]["tmp_name"]);
                            echo "<script>alert('Product Updated')</script>";
                            echo "<script>location.replace('seller_all_listing.php');</script>";
                            //$results =$m->addProduct($title,$price,$name,$email,$phone,$category,$about,$city,$district,$street,$target_file,$oldEmail,$_FILES["img"]["tmp_name"]);
                            //   echo "<script>alert('$results')</script>";
                            // echo '<script>window.location.replace("seller_all_listing.php")</script>';
                        }else
                        {

                            echo "<script>alert('Please Check Image Format or Size is Invalid')</script>";
                        }

                    }else
                    {

                        $m->editProduct($title,$price,$stock,$name,$email,$phone,$category,$about,$city,$district,$street,$id);
                        echo "<script>alert('Product Updated')</script>";
                        echo "<script>location.replace('seller_all_listing.php');</script>";


                    }



                }




                ?>
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Edit Product</h1>
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
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label required">Title</label>
                                        <input name="title" type="text" class="form-control" id="title" value="<?php echo $product['title'];?>" placeholder="Title" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-8-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label required">Price Per KG</label>
                                        <input name="price" type="number" onkeypress="return event.charCode >= 48" class="form-control"  value="<?php echo $product['price'];?>" id="price" required>
                                        <span class="input-group-addon">PKR</span>
                                    </div>
                                    <!--end form-group-->
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label required">Stock Per KG</label>
                                        <input name="stock" type="number" onkeypress="return event.charCode >= 48" class="form-control" id="title" value="<?php echo $product['stock'];?>" placeholder="Title" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label required">Your Name</label>
                                        <input name="name" type="text" class="form-control"  value="<?php echo $product['name'];?>" id="name" placeholder="Name" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label required">Your Email</label>
                                        <input name="email" type="email" class="form-control"  value="<?php echo $product['email'];?>" id="email" placeholder="Email" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label required">Your Phone</label>
                                        <input name="phone" type="text" class="form-control"  value="<?php echo $product['phone'];?>" id="phone" placeholder="Phone" required>
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-4-->
                            </div>
                        </section>
                        <!--end basic information-->
                        <section>
                            <div class="row">
                                <div class="col-md-4">
                                    <h2>Category</h2>
                                    <div class="form-group">
                                        <label for="submit-category" class="col-form-label">Category</label>
                                        <select  name="category">
                                            <option value="<?php echo $product['category'];?>"><?php echo $m->getCategoryBYId($product['category']);?> </option>
                                            <?php
                                                $cat=$m->getAllCategroy();
                                                while ($cats=$cat->fetch_assoc())
                                                {
                                            ?>
                                            <option value="<?php echo $cats['id']; ?>"><?php echo $cats['name']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end form-group-->
                                </div>

                            </div>
                            <!--end row-->
                        </section>

                        <section>
                            <h2>Details</h2>
                            <div class="form-group">
                                <label for="details" class="col-form-label">Additional Details</label>
                                <textarea name="about"  id="details" class="form-control" rows="4"><?php echo $product['about'];?></textarea>
                            </div>
                            <!--end form-group-->
                        </section>

                        <section>
                            <h2>Location</h2>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label required">City</label>
                                        <input name="city" value="<?php echo $product['city'];?>" type="text" class="form-control" id="" placeholder="City">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district" class="col-form-label required">District</label>
                                        <input name="district" value="<?php echo $product['district'];?>" type="text" class="form-control" id="" placeholder="District">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="street" class="col-form-label">Street</label>
                                        <input name="street" type="text" value=" <?php echo $product['street'];?>" class="form-control" id="street">
                                    </div>
                                    <!--end form-group-->
                                </div>
                                <!--end col-md-6-->
                            </div>
                            <!--end row-->

                            <!--end form-group-->

                        </section>

                        <section>
                            <h2>Product Picture</h2>
                            <div class="file-upload-previews"></div>
                            <div class="file-upload">
                                <input type="file" name="img" value=" <?php echo $product['img'];?>"   accept="gif|jpg|png" >
                            </div>
                        </section>



                        <section class="clearfix">
                            <div class="form-group">
                                <button type="submit" name="add" class="btn btn-primary large icon float-right">Save Product<i class="fa fa-chevron-right"></i></button>
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
