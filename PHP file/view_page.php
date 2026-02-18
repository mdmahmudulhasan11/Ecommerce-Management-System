<?php
include 'connection.php';
session_start();
$admin_id = $_SESSION['user_name'];
if (!isset($admin_id)) {
    header('location: login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
}
if (isset($_POST['add_to_wishlist'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];

  $wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$admin_id'") 
    or die('Query failed: wishlist');

$cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$admin_id'") 
    or die('Query failed: cart');

if (mysqli_num_rows($wishlist_number) > 0) {
    $message[] = 'Product already exists in wishlist';
} else if (mysqli_num_rows($cart_num) > 0) {
    $message[] = 'Product already exists in cart';
} else {
    mysqli_query($conn, "INSERT INTO `wishlist` (`user_id`, `pid`, `name`, `price`, `image`) 
        VALUES ('$admin_id', '$product_id', '$product_name', '$product_price', '$product_image')") 
        or die('Query failed: insert wishlist');
    $message[] = 'Product successfully added to your wishlist';
}

}
// Adding product to cart
if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  // Check if the product already exists in the cart
  $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$admin_id'") 
      or die('Query failed: cart');

  if (mysqli_num_rows($cart_num) > 0) {
      $message[] = 'Product already exists in the cart';
  } else {
      // Insert the product into the cart
      mysqli_query($conn, "INSERT INTO `cart` (`user_id`, `pid`, `name`, `price`, `quantity`, `image`) 
          VALUES ('$admin_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") 
          or die('Query failed: insert cart');
      $message[] = 'Product successfully added to your cart';
  }
}

?>

<style>
    <?php 
        include('main.css');
    
    ?>
       
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap Icon Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <!-- Main CSS File -->
    <link rel="stylesheet" href="main.css">
    
    <title>Veggen Home Page</title>
</head>

<body>
<?php include 'header.php'; ?>


<div class="banner">
    <div class="detail">
        <h1>Product details</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
        <a href="index.php">Home</a> <span>/ About Us</span>
    </div>
</div>

<div class="line"></div>
<!-- shop -->

<section class="shop" style="background-color: #fcc927;;">
        <h1>Shop best sellers</h1>
        <div class="control">
            <i class="bi bi-chevron-left left"></i>
            <i class="bi bi-chevron-right right"></i>
        </div>
        <div class="box-container">
            <?php
                if (isset($_GET['pid'])) {
                    $pid = $_GET['pid'];
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or die('query failed');
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
               
                
           
            ?>
                    <form method="post" class="box" style="height:450px">
                        <img src="img/<?php echo $fetch_products['image']; ?>" alt="Product Image">
                        <div class="price"><?php echo $fetch_products['price']; ?></div>
                        <div class="name"><?php echo $fetch_products['name']; ?></div>

                        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                        <input type="hidden" name="product_quantity" value="1">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

                        <div class="icon">
                            <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bi bi-eye-fill"></a>
                            <button type="submit" name="add_to_wishlist" class="bi bi-heart"></button>
                            <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                        </div>
                    </form>
            <?php
                }
            } 
        }
            ?>
        </div>
    </section>





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <script type="text/javascript" src="script2.js"></script> 
</body>
</html>