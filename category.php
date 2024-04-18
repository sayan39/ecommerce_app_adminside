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
                        <h2>category</h2>
                    </div>
                </div>
                <hr />
                <!-- <input type="checkbox" id="show"> -->

                <div class="container1">
                    <form action="" method="post">
                        <div class="data">
                            <label>Enter category name</label>
                            <input type="text" name="cat_name">
                            <input class="btn btn-success" type="submit" value="add" name="submit">
                        </div>
                        <div>



                        </div>
                    </form>
                </div>

                <table class="container1" style="margin-left:300px; margin-top:100px">
                    <thead>
                        <tr>
                            <th scope="col">category id</th>
                            <th scope="col">category name</th>
                            <th scope="col">update</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $response = display_cat();

                        $records = mysqli_num_rows($response);  //count no. of records
          
                        if($records > 0)
                        {
                            while($data = mysqli_fetch_assoc($response))   //One By One records insert into data
                            {
                              echo'
                              
                                <tr>
                                    <td>'.$data["category_id"].'</td>
                                    <td>'.$data["category_name"].'</td>
                                   <td> <a class="btn btn-primary" name="delete" onclick="deleteUser(`'.$data["category_id"].'`)">delete</a><td>
                                   <td><a href="updateCategory.php?category_id='.$data["category_id"].'" class="btn btn-danger" name="edit" >edit</a></td>
                                </tr>
                                ';  
                            }
                        }    
                        ?>

                    </tbody>
                </table>
            </div>



        </div>
        <!-- <div class="container1">
            
            </div> -->

        <?php
         if(isset($_POST['submit']))
         {
            $response = insert_cat($_POST);
            echo "Response ".$response;
            // if($response=="added sucessfully")
            // {
            //     header('location:dashboard.php');
            // }
            // else{
            //     echo $response;
            // }
         }
    ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function deleteUser(category_id)
  {

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
              url: "DeleteCategory.php",
              method: "get",
              data:{"category_id": category_id},
              success: function(response)
              {
                Swal.fire({
                  title: "Deleted!",
                  text: response,
                  icon: "success"
                });

                window.location.href = "";
              }
          })
          
        }
      });
  }
</script>
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