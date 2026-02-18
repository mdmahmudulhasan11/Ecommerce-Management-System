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
    mysqli_query($conn, "DELETE FROM users WHERE id = '$delete_id'") or die('Query failed');
    $meaasage[] = 'user removed successfully';
    // Redirect back to the add_product.php page
    header('location: admin_user.php');
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
            
            <section class="message-container">
                <h1 class="title">total user account</h1>
                <div class="box-container">
                    <?php
                    $select_users = mysqli_query($conn, "SELECT * FROM users") or die('query failed'); 
                    if (mysqli_num_rows($select_users) > 0) {
                        while ($fetch_users = mysqli_fetch_assoc($select_users)) {
                    ?>
                            <div class="box">
                                <p> User ID: <span><?php echo $fetch_users['id']; ?></span> </p>
                                <p> Name: <span><?php echo $fetch_users['name']; ?></span></p>
                                <p>Email: <span><?php echo $fetch_users['email']; ?></span> </p>
                                <p>User Type: 
                                    <span style="color: <?php if ($fetch_users['user_type'] == 'admin') { echo 'orange'; } ?>">
                                        <?php echo $fetch_users['user_type']; ?>
                                    </span>
                                </p>
                                <a href="admin_user.php?delete=<?php echo $fetch_users['id']; ?>;" 
                                onclick="return confirm('Delete this message');" 
                                class="delete">
                                    Delete
                                </a>

                            </div>
                             <?php
                                    }
                                } else {
                                    echo '
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