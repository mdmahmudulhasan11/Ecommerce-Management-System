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

<<div class="line2"></div>
<div class="about-us">
    <div class="row">
        <div class="box">
            <div class="title">
                <span>ABOUT OUR ONLINE STORE</span>
                <h1>Hello, With 25 Years of Experience</h1>
            </div>
            <p>Over 25 years of eCommerce experience helping companies reach their financial and branding goals.</p>
            <p>The perfect way to enjoy brewing tea on low hanging fruit to identify. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. For me, the most important part of improving at photography.</p>
            <div class="img-box" style="float:right">
                <img src="img/COLOURBOX61403561-ezgif.com-webp-to-jpg-converter.jpg" alt="About Us Image">
            </div>
        </div>
    </div>
</div>
<div class="line3"></div>
<!-- features -->
<div class="line3"></div>

<div class="features">
    <div class="title">
       
        <h1>Complete Customer Ideas</h1>
        <span>best features</span>
    </div>
    
    <div class="row">
        <div class="box">
            <img src="img/13280358.png" alt="24 X 7 Support">
            <h4>24 X 7</h4>
            <p>Online Support 27/7</p>
        </div>
        
        <div class="box">
            <img src="img/100-Money-Back-Guarantee.png" alt="Money Back Guarantee">
            <h4>Money Back Guarantee</h4>
            <p>100% Secure Payment</p>
        </div>
        
        <div class="box">
            <img src="img/6664427.png" alt="Special Gift Card" >
            <h4>Special Gift Card</h4>
            <p>Give The Perfect Gift</p>
        </div>
        
        <div class="box">
            <img src="img/images (3).jpg" alt="Worldwide Shipping">
            <h4>Worldwide Shipping</h4>
            <p>On Order Over $99</p>
        </div>
    </div>
</div>

<div class="line"></div>

<!-- Team Section -->
<div class="line2"></div>
<div class="team">
    <div class="title">
        <h1>Our Workable Team</h1>
        <span>Best Team</span>
    </div>

    <div class="row">
        <div class="box">
    <div class="img-box">
        <img src="img/Zoellick,_Robert_(official_portrait_2008).jpg" alt="Team Member">
    </div>
    <div class="detail">
        <span>Finance Manager</span>
        <h4>Miguel Rodriguez</h4>
        <div class="icon">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
        </div>
    </div>
</div>



<div class="box">
    <div class="img-box">
        <img src="img/images (4).jpg" alt="Team Member">
    </div>
    <div class="detail">
        <span>Finance Manager</span>
        <h4>Miguel Rodriguez</h4>
        <div class="icon">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
        </div>
    </div>
</div>

<div class="box">
    <div class="img-box">
        <img src="img/160512-kim-jong-un-mn-1120.jpg" alt="Team Member">
    </div>
    <div class="detail">
        <span>Finance Manager</span>
        <h4>Miguel Rodriguez</h4>
        <div class="icon">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
        </div>
    </div>
</div>

<div class="box">
    <div class="img-box">
        <img src="img/images (5).jpg" alt="Team Member">
    </div>
    <div class="detail">
        <span>Finance Manager</span>
        <h4>Miguel Rodriguez</h4>
        <div class="icon">
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i>
            <i class="bi bi-twitter"></i>
            <i class="bi bi-behance"></i>
            <i class="bi bi-whatsapp"></i>
        </div>
    </div>
</div>

        <!-- You can add more team members here with the same structure -->
    </div>
</div>
<div class="line3"></div>
<div class="line4"></div>
<div class="project">
    <div class="title">
        <h1>Our Best Project</h1>
        <span>How it works</span>
    </div>
    <div class="row">
        <div class="box">
            <img src="img/istockphoto-514325215-612x612.jpg" alt="Project Image 1">
        </div>
        <div class="box">
            <img src="img/istockphoto-1358406754-612x612.jpg" alt="Project Image 2 " style="height:410px">
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
 <script type="text/javascript" src="script2.js"></script> 
</body>
</html>