<?php
include 'connection.php';
session_start();
$admin_id = $_SESSION['admin_name'];
if (!isset($admin_id)) {
    header('location: login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

   
    

    // Delete the product from the wishlist table
    mysqli_query($conn, "DELETE FROM `order` WHERE id = '$delete_id'") or die('Query failed');
    $meaasage[] = 'user removed successfully';
    // Redirect back to the add_product.php page
    header('location: admin_order.php');
}

//update product
if (isset($_POST['update_product'])) { 
    $update_id = $_POST['update_id']; 
    $update_name = $_POST['update_name']; 
    $update_price = $_POST['update_price']; 
    $update_detail = $_POST['update_detail'];
   
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name']; 
    $update_image_folder='images/'.$update_image;
    $update_query = mysqli_query($conn, "UPDATE products SET id='$update_id',name = '$update_name', price='$ update_price', product_detail='$update_detail',image='$update_image' WHERE id = '$update_id'") or die ('query failed');
    if($update_query) {
    move_uploaded_file($update_image_tmp_name, $update_image_folder);
    header('location: admin_product.php');
    }
}
  //update payment status  
// Updating payment status
if (isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];

    // Update query
    $query = "UPDATE `order` SET `payment_status` = '$update_payment' WHERE `id` = '$order_id'";
    $result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));

    if ($result) {
        echo "Payment status updated successfully!";
    }
}




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
       
        <title>admin pannel</title>
       
        
    </head>
        <body>
            <?php include 'admin_header.php'; ?>

            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '
                    <div class="message">
                        <span>' . $message . '</span>
                        <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                    </div>
                    ';
                }
            }
            ?>

            <div class="line4"></div>
            
            <section class="order-container">
                <h1 class="title">total user account</h1>
                <div class="box-container">
                    <?php
                    $select_orders = mysqli_query($conn, "SELECT * FROM `order`;") or die('query failed'); 
                    if (mysqli_num_rows($select_orders) > 0) {
                        while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
                    ?>
                           <div class="box">
                                <p>User Name: <span><?php echo $fetch_orders['name']; ?></span></p>
                                <p>User ID: <span><?php echo $fetch_orders['user_id']; ?></span></p>
                                <p>Placed On: <span><?php echo $fetch_orders['placed_on']; ?></span></p>
                                <p>Number: <span><?php echo $fetch_orders['number']; ?></span></p>
                                <p>Email: <span><?php echo $fetch_orders['email']; ?></span></p>
                                <p>Total Price: <span><?php echo $fetch_orders['total_price']; ?></span></p>
                                <p>Method: <span><?php echo $fetch_orders['method']; ?></span></p>
                                <p>Address: <span><?php echo $fetch_orders['address']; ?></span></p>
                                <p>Total Products: <span><?php echo $fetch_orders['total_products']; ?></span></p>
                                <form method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                                    <select name="update_payment">
                                        <option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
                                        <option value="pending">Pending</option>
                                        <option value="complete">Complete</option>
                                        <input type="submit" name="update_order" value="update payment" class="btn">
                                        <a href="admin_order.php?delete=<?php echo $fetch_orders['id']; ?>;" 
                                        onclick="return confirm('Delete this message');" 
                                        class="delete">
                                            Delete
                                        </a>
                                    </select>
                                </form>
                                <br>
                                
                            </div>

                             <?php
                                    }
                                } else {
                                    echo  '
                                    <div class="empty">
                                            <p>No products added yet!</p>
                                            
                                        </div>
                                        ';
                                }
                            ?>
                </div>
            </section>
            <div class="line"></div>
            <script type="text/javascript" src="s.js"></script>
        </body>

</html>