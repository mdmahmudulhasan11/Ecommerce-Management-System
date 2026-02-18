
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
        <div class="line4"></div>
        <section class="dashboard">
            <div class="box-container">
                <div class="box">
                    <?php
                    // Initialize total_pendings to 0
                    $total_pendings = 0;

                    // Fetch pending orders from the database
                    $select_pendings = mysqli_query($conn, "SELECT * FROM `order` WHERE payment_status = 'pending'") or die('Query failed');

                    // Loop through the results and calculate the total
                    while ($fetch_pending = mysqli_fetch_assoc($select_pendings)) {
                        $total_pendings += $fetch_pending['total_price'];
                    }
                    ?>

                    <!-- Display total pendings -->
                    <h3>$ <?php echo number_format($total_pendings, 2); ?>/-</h3>
                    <p>total pendings</p>
                </div>
                <div class="box">
                        <?php
                        // Initialize total_pendings to 0
                        $total_pendings = 0;

                        // Fetch pending orders from the database
                        $select_pendings = mysqli_query($conn, "SELECT * FROM `order` WHERE payment_status = 'pending'") or die('Query failed');

                        // Loop through the results and calculate the total
                        while ($fetch_pending = mysqli_fetch_assoc($select_pendings)) {
                            $total_pendings += $fetch_pending['total_price'];
                        }
                        ?>

                        <!-- Display total pendings -->
                        <h3>$ <?php echo number_format($total_pendings, 2); ?>/-</h3>
                        <p>total pendings</p>
                </div>
                <div class="box">
                        <?php
                        // Query to count orders
                        $select_orders = mysqli_query($conn, "SELECT * FROM `order`") or die('Query failed');
                        $num_of_orders = mysqli_num_rows($select_orders);
                        ?>

                        <!-- Display number of orders placed -->
                        <h3><?php echo $num_of_orders; ?></h3>
                        <p>Order placed</p>
                </div>

                <div class="box">
                        <?php
                        // Query to count products
                        $select_products = mysqli_query($conn, "SELECT * FROM `order`") or die('Query failed');
                        $num_of_products = mysqli_num_rows($select_products);
                        ?>

                        <!-- Display number of products added -->
                        <h3><?php echo $num_of_products; ?></h3>
                        <p>Product added</p>
                </div>

                <div class="box">
                        <?php
                        // Query to count normal users
                        $select_users = mysqli_query($conn, "SELECT * FROM users WHERE user_type = 'user'") or die('Query failed');
                        $num_of_users = mysqli_num_rows($select_users);
                        ?>

                        <!-- Display number of normal users -->
                        <h3><?php echo $num_of_users; ?></h3>
                        <p>Total normal users</p>
                </div>
                
                <div class="box">
                    <?php
                    // Query to count admins
                    $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('Query failed');
                    $num_of_admin = mysqli_num_rows($select_admins);
                    ?>

                    <!-- Display number of admins -->
                    <h3><?php echo $num_of_admin; ?></h3>
                    <p>Total admin</p>
            </div>

            <div class="box">
                <?php
                // Query to count total registered users
                $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('Query failed');
                $num_of_users = mysqli_num_rows($select_users);
                ?>

                <!-- Display total number of registered users -->
                <h3><?php echo $num_of_users; ?></h3>
                <p>Total registered users</p>
            </div>

            <div class="box">
                <?php
                $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('Query failed');
                $num_of_message = mysqli_num_rows($select_message);
                ?>

                <!-- Display number of new messages -->
                <h3><?php echo $num_of_message; ?></h3>
                <p>New messages</p>
            </div>


            </div>
        </section>
        <script type="text/javascript" src="s.js"></script>


    </body> 
</html>