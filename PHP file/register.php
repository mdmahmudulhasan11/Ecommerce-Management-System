<?php
include 'connection.php';

if (isset($_POST['submit-btn'])) {
    // Sanitize and escape input values
    $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $name = mysqli_real_escape_string($conn, $filter_name);

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
    $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);

    // Check if user already exists
    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('Query failed');
    if (mysqli_num_rows($select_user) > 0) {
        $message[] = 'User already exists';
    } else {
        // Check if passwords match
        if ($password != $cpassword) {
            $message[] = 'Passwords do not match';
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            $insert_user = mysqli_query($conn, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashed_password')") or die('Query failed');

            if ($insert_user) {
                $message[] = 'Registered successfully';
                header('location:login.php');
                exit();
            } else {
                $message[] = 'Registration failed';
            }
        }
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
            <h1>Register Now</h1>
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="password" name="cpassword" placeholder="Confirm your password" required>
            <input type="submit" name="submit-btn" value="Register Now" class="btn">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>
    </section>
</body>

</html>
