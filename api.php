<?php
    include('db.php');
    session_start();
    if($_POST['function'] == 'get_product_details')
    {
        $query = "select * from products";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if($_POST['function'] == 'store_sales')
    {
        $query = "INSERT INTO `sales`(`item`, `quantity`, `customer_code`, `payment_method`, `user`) VALUES ('".$_POST['name']."','".$_POST['quantity']."','".$_POST['customer_code']."', '". $_POST['p_type'] ."', '". $_POST['user_name'] ."')";
        // echo $query;exit;
        $result = mysqli_query($conn, $query);
        echo "Done";
    }

    if($_POST['function'] == 'get_sales')
    {
        $query = "SELECT  item, SUM(CASE WHEN payment_method = 'Cash' THEN quantity ELSE 0 END) AS Cash, SUM(CASE WHEN payment_method = 'Online' THEN quantity ELSE 0 END) AS Online FROM `sales` WHERE user = '".$_POST['shope']."' AND current_time_stamp BETWEEN '".$_POST['start_date']."' AND '". $_POST['end_date'] ."' GROUP BY item";
        // echo $query;exit;
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) 
        {
            $data[] = $row; 
        }

        echo json_encode($data);    
    }

    if($_POST['function'] == 'login')
    {
        $query = 'SELECT * FROM `users` WHERE username = "' .$_POST['username']. '" and password = "'. $_POST['psw'] .'"';
        // echo $query;exit;
        $result = mysqli_query($conn, $query);
        // print_r(mysqli_num_rows($result));
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['username'] = $_POST['username'];
            echo 'done';exit;
        }
        else
        {
            echo 'login failed';exit;
        }

    }

    if($_POST['function'] == 'set_product_details')
    {
        $productImage = $_FILES['product_image'];
        $fileName = $productImage['name'];
        $fileTmpName = $productImage['tmp_name'];
        $uploadDirectory = 'D:/AppData/Xampp/htdocs/murali-main/img/';
        // print_r(mkdir($uploadDirectory, 0755, true));
        $uploadedFilePath = $uploadDirectory . $fileName;
        $product_url =  'http://localhost/murali-main/img/' . $fileName;
        move_uploaded_file($fileTmpName, $uploadedFilePath);
        // print_r($uploadedFilePath);
        // print_r(move_uploaded_file($fileTmpName, $uploadedFilePath));
        // exit;
        $sql = "INSERT INTO `products`(`product_id`, `product_name`, `product_image`, `product_price`) VALUES ('". $_POST['product_code'] ."','". $_POST['product_name'] ."','". 
        $product_url ."','". $_POST['product_price'] ."')";
        // print_r($sql);exit;
        $result = mysqli_query($conn, $sql);
        echo $uploadedFilePath;
    }
?>