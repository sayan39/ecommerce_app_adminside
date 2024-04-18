<?php
    include('mymethods.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <!-- <link rel="stylesheet" href="login.css"> -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <style>
    .category {
        width: 30%;
    }

    .container1 {
        background: #fff;
        width: 450px;
        padding: 30px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>



    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;ADMIN</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">logout</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <?php
    include('format.php');
         ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>update products</h2>
                    </div>
                </div>
                <hr />
                <!-- <input type="checkbox" id="show"> -->
                <?php
                    $product_id = $_GET['product_id'];

                    $response = get_data_by_productid($product_id);

                    $data = mysqli_fetch_assoc($response);
                 ?>
                <div class="container1">
                    <form action="" method="post" enctype="multipart/form-data">
                        <br>
                        <label>product id</label>
                        <input type="number" name="product_id" placehplder="" value="<?php echo $data["product_id"];?>"
                            readonly>
                        <br>
                        <label>category name</label>
                        <input type="number" name="category_id" placehplder=""
                            value="<?php echo $data["category_id"];?>" readonly>
                        <label>Enter product name</label>
                        <input type="text" name="pname" placehplder="enter product name"
                            value="<?php echo $data["pname"];?>">
                        <label>product price</label>
                        <input type="number" name="pprice" placehplder="enter price"
                            value="<?php echo $data["pprice"];?>">
                        <br><label>product image</label>
                        <input type="file" name="pimage" placeholder="photo" value="<?php echo $data["pimage"];?>">
                        <img src="<?php echo $data["pimage"];?>" width="10%">
                        <label>product description</label>
                        <textarea name="pdescription" cols="30" rows="3"
                            ><?php echo $data["pdescription"];?></textarea>
                        <input class="btn btn-success" type="submit" value="update" name="submit">
                    </form>
                </div>
            </div>
            <?php
                          if(isset($_POST['submit']))
                          {
                             $response = update_product($_POST);
                             echo "response ".$response;
                 
                            // if($response=="added sucessfully")
                            // {
                            //     header('location:dashboard.php');
                            // }
                            // else{
                            //     echo $response;
                            // }
                        }
                    ?>


            <!-- /. WRAPPER  -->
            <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
            <!-- JQUERY SCRIPTS -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- BOOTSTRAP SCRIPTS -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- METISMENU SCRIPTS -->
            <script src="assets/js/jquery.metisMenu.js"></script>
            <!-- CUSTOM SCRIPTS -->
            <script src="assets/js/custom.js"></script>


</body>

</html>