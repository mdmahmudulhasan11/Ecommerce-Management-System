<?php
session_start();
include 'connection.php';

if (isset($_POST['submit-btn'])) {
    // Sanitize and escape input values
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    // Check if the user exists
    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('Query failed');
    
    if (mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_assoc($select_user);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            if ($row['user_type'] == 'admin') {
                // Admin login
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location: admin_pannel.php');
                exit();
            } else if ($row['user_type'] == 'user') {
                // User login
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('location: index1.php');
                exit();
            }
        } else {
            // Invalid password
            $message[] = 'Incorrect email or password';
        }
    } else {
        // No user found with the provided email
        $message[] = 'Incorrect email or password';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Box Icon Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register Page</title>
</head>

<body>
    <section class="form-container">
        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">';
                echo '<span>' . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') . '</span>';
                echo '<i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>';
                echo '</div>';
            }
        }
        ?>

        <form method="post">
            <h1>Login Now</h1>
            
            <!-- Email Field -->
            <div class="input-field">
                <label for="email">Your Email</label><br>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <!-- Password Field -->
            <div class="input-field">
                <label for="password">Your Password</label><br>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <!-- Submit Button -->
            <input type="submit" name="submit-btn" value="Login Now" class="btn">
            
            <!-- Register Link -->
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>

    </section>
</body>

</html>
