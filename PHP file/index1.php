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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .x{
    background-color:black;
      }
    </style>
</head>
<body>
<?php include('header.php');?>
<!-- Home Slider -->
<div class="container-fluid">
    <div class="hero-slider">
        <div class="slider-item">
            <img src="img/honeycomb-honey-yellow-background_1028938-394008.avif" alt="Organic Premium Honey">
            <div class="slider-caption">
                <span>Test The Quality</span>
                <h1>Organic Premium <br>Honey</h1>
                <p>Enjoy sweet, aromatic honey made by hardworking people of <br>ecologically clean raw materials in the
                    most pure environment!</p>
                <a href="shop.php" class="btn">Shop Now</a>
            </div>
        </div>
        <div class="slider-item">
            <img src="img/golden-organic-honey-against-a-background-photo.jpg" alt="Organic Premium Honey">
            <div class="slider-caption">
                <span>Test The Quality</span>
                <h1>Organic Premium <br>Honey</h1>
                <p>Enjoy sweet, aromatic honey made by hardworking people of <br>ecologically clean raw materials in the
                    most pure environment!</p>
                <a href="shop.php" class="btn">Shop Now</a>
            </div>
        </div>
    </div>
</div>
<div class="controls">
            <i class="bi bi-chevron-left prev" ></i> 
            <i class="bi bi-chevron-right next"></i> 
    </div>
<div class="line"></div>

<div class="services a" style="height: 400px;">
    <div class="row">
        <div class="box">
            <img src="img/pngtree-black-free-shipping-png-image_3577608-fotor-bg-remover-20241220172346.png" width="200px" height="200px">
            <br><br>
            <div>
                <h1>Free Shipping Fast</h1>
                <p>Get your honey delivered quickly with free shipping—because you deserve the best!</p>
            </div>
        </div>
        <div class="box">
            <img src="img/360_F_366882293_r1vqoH4qBb4LDzT0ZoHJtjnRQL9x0nRh_processed-fotor-bg-remover-20241220171041.png" alt="Money Back Guarantee" width="270px" height="200px"> <br><br>
            <div>
                <h1>Money Back & Guarantee</h1>
                <p>100% satisfaction guaranteed or your money back!</p>
            </div>
        </div>
        <div class="box">
            <img src="img/png-transparent-24-7-service-customer-service-brand-information-overload-blue-text-service-thumbnail-fotor-bg-remover-20241220172853.png" alt="Online Support" width="150px" height="150px">
            <div>
                <h1>Online Support 24/7</h1>
                <p>Here for you anytime—our online support team is available 24/7.</p>
            </div>
        </div>
    </div>
</div>

<div class="line2"></div>
<div class="story"  style="height: 800px;">
  <div class="row">
    <div class="box">
      <span class="b">our story</span>
      <h1>Production of natural honey since 1990</h1>
      <p>
      Since 1990, our commitment to producing natural honey has been unwavering.
      We’ve carefully cultivated and harvested honey from pristine environments, ensuring it 
      retains its purity and quality. Each jar of honey is the result of generations of expertise, passed 
      down through our family. From beekeeping to bottling, 
      we take great pride in preserving the natural essence of our honey, bringing you a taste of nature’s finest since 1990.
      </p>
      <a href="shop.php" class="btn" style=" background-color:#ffff; margin-left: 500px;color:orange">shop now</a>
    </div>
    <div class="box">
      <img src="img/bee-infant-clip-art-cute-bee-thumbnail-fotor-bg-remover-2024122115515.png" width="250px" height="250px"/>
    </div>
  </div>
</div>



<!-- testimonial -->
<div class="line4"></div>
<div class="testimonial-fluid"  style="height: 400px;">
  <h1 class="title">What Our Customers Say's</h1>
  <div class="testimonial-slider">
    <div class="testimonial-item">
      <img src="img/Shah_Rukh_Khan_graces_the_launch_of_the_new_Santro.jpg" alt="Testimonial Image">
      <div class="testimonial-caption">
        <span>Test The Quality</span>
        <h1>Shah Rukh Khan</h1>
        <p>I’ve been buying honey from this shop since I moved to town in 1995, and I can honestly say it’s the best I’ve ever tasted. The wildflower honey adds a unique sweetness to my morning tea. Highly recommend!.</p>
      </div>
    </div>
    <div class="testimonial-item">
      <img src="img/robert-downey-jr.-iron-man-102824-76d8692b47054e37a7a2ba3301e0bae2.jpg" alt="Testimonial Image">
      <div class="testimonial-caption">
        <span>Test The Quality</span>
        <h1>Robert Downey Jr.</h1>
        <p>The eucalyptus honey is unlike any other I’ve tried! Its bold flavor is perfect in dressings and marinades. The quality and taste are unbeatable. I’ll definitely be coming back for more!</p>
      </div>
    </div>
    <div class="testimonial-item">
      <img src="img/images (1).jpg" alt="Testimonial Image">
      <div class="testimonial-caption">
        <span>Test The Quality</span>
        <h1>Adolf Hitler</h1>
        <p>“If I’m still alive, I will definitely buy it!”

A glowing endorsement from a satisfied customer who is excited about our honeyshop’s products. We appreciate your support!</p>
      </div>
    </div>
  </div>
  <i class="bi bi-chevron-left prev1"></i> 
  <i class="bi bi-chevron-right next1"></i> 
</div>





<div class="line"></div>




 <!-- Discover section -->
<div class="line2"></div>
<div class="discover">
  <div class="detail">
    <h1 class="title">Organic Honey Be Healthy</h1> 
    <span>Buy Now And Save 30% Off!</span>
    <p>Experience the purest form of sweetness with our organic honey. Packed with natural nutrients and antioxidants, it’s the
       perfect addition to a healthy lifestyle. Enjoy it in your teas, on your toast, or straight 
      from the spoon—transforming every meal into a deliciously wholesome treat. Be healthy, be sweet, with our organic honey.</p><br>
    <a href="shop.php" class="btn x" style=" background-color:#ffff; margin-left: 500px;color:orange">Discover Now</a>
  </div>
  <div class="img-box">
    <img src="img/pexels-maximilian-muller-349382899-14168472.jpg" alt="Organic Honey">
  </div>
</div>





<?php include('homeshop.php');?>


<div class="line"></div>
<div class="line4"></div>

<div class="newslatter a">
<br><br>
    <h1 class="title">Join Our To Newslatter</h1>
    <p>
        Get 15% off your next order. Be the first to learn about promotions, special events, 
        new arrivals, and more.
    </p>
    <input type="text" name="" placeholder="Your Email Address...">
    <button>Subscribe Now</button>
</div>









<?php include('footer.php');?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <script type="text/javascript" src="script2.js"></script> 
</body>
</html>