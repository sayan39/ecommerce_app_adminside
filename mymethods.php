<?php
function connect()
{
    $hostName = "localhost";
    $username = "root";
    $password = ""; 
    $database = "ecommerce";
   
    $conn = mysqli_connect($hostName, $username, $password, $database);

    return $conn;
}

function insert_cat($data)
{
   $cat_name = $data['cat_name'];
    $conn = connect();
    if($conn)
    {
        $insert = " insert into category(category_name) values ('$cat_name')";
        $response = mysqli_query($conn, $insert);

        if($response == 1)
            {
                    return "added sucessfully";
               
            }
            else
            {
                return "Not added";
            }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not ';
    }
} 
function display_cat()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select *from category";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
   
     }
}
function delete_cat($category_id)
{
    $conn = connect();
    if($conn)
    {
        $delete = "delete from category where category_id='$category_id'";
        $response = mysqli_query($conn, $delete);

        if($response == 1)
        {
            return "deleted sucessfully";
        }
        else
        {
            return "not deleted";
        }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not' ;
    }
} 
function get_data_by_catid($category_id)
{
    $conn = connect();

    if($conn)
    {
        $sql =  "select *from category where category_id ='$category_id'";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
    }
}
function update_category($data)
{   
    $category_id = $data['category_id'];
    $cat_name = $data['cat_name'];
    $conn = connect();
    if($conn)
    {
        $update = "update category set category_name='$cat_name' where category_id='$category_id'";
        $response = mysqli_query($conn, $update);

        if($response == 1)
        {
            return "updated sucessfully";
        }
        else
        {
            return "not updated";
        }
        //echo ' sucessfully';
    }
    else
    {
        return 'Not' ;
    }
}    

function insert_product($data)
{
    $cat_id = $data['cat_id'];
   $pname = $data['pname'];
    $pprice = $data['pprice'];
    $pdescription = $data['pdescription'];
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pimage"]["name"]);
 
    $conn = connect();
    if($conn)
    {
        $insert = " insert into products(category_id,pname,pprice,pimage,pdescription) values ('$cat_id','$pname','$pprice','$target_file','$pdescription')";
        $response = mysqli_query($conn, $insert);

        if($response == 1)
            {
                if (move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file))
                 {
                    return "added sucessfully";
                  } 
                  else
                   {
                    return "Sorry, there was an error uploading your file.";
                  }
               
            }
            else
            {
                return mysqli_error($conn);
            }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not ';
    }
}    

function display_product()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select *from products";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
   
     }
}



function delete_products($product_id)
{
    $conn = connect();
    if($conn)
    {
        $delete = "delete from products where product_id='$product_id'";
        $response = mysqli_query($conn, $delete);

        if($response == 1)
        {
            return "deleted sucessfully";
        }
        else
        {
            return "not deleted";
        }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not' ;
    }
} 
function get_data_by_productid($product_id)
{
    $conn = connect();

    if($conn)
    {
        $sql =  "select *from products where product_id='$product_id'";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
    }
}
function update_product($data)
{   
    $product_id = $data['product_id'];
     $cat_id = $data['category_id'];
    $pname = $data['pname'];
     $pprice = $data['pprice'];
     $pdescription = $data['pdescription'];
     
     $target_dir = "uploads/";
     $target_file = $target_dir . basename($_FILES["pimage"]["name"]);
  
     $conn = connect();
     if($conn)
    {
        $update = "update products set category_id='$cat_id', pname='$pname' , pprice='$pprice' ,pimage='$target_file',  pdescription='$pdescription' where product_id='$product_id'";
        $response = mysqli_query($conn, $update);

        if($response == 1)
        {
            if (move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file)) {
                return "updated sucessfully";
              } else {
                return "Sorry, there was an error uploading your file.";
              }
        }
        else
        {
            return mysqli_error($conn);
        }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not' ;
    }
        //echo ' sucessfully';
}  
function display_user()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select *from user";
        $response = mysqli_query($conn, $sql);
        return $response;
    }
    else{
        return "Not Connected";
   
     }
}
function delete_user($email)
{
    $conn = connect();
    if($conn)
    {
        $delete = "delete from user where email='$email'";
        $response = mysqli_query($conn, $delete);

        if($response == 1)
        {
            return "deleted sucessfully";
        }
        else
        {
            return "not deleted";
        }
        //echo 'registered sucessfully';
    }
    else
    {
        return 'Not' ;
    }
} 

function count_cat()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select * from category";
        $response = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($response);
        return $records;
    }
    else{
        return "0";
   
     }
}

function count_product()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select * from products";
        $response = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($response);
        return $records;
    }
    else{
        return "0";
   
     }
}

function count_user()
{
    $conn = connect();

    if($conn)
    {
        $sql = "select * from user";
        $response = mysqli_query($conn, $sql);
        $records = mysqli_num_rows($response);
        return $records;
    }
    else{
        return "0";
   
     }
}
?>   