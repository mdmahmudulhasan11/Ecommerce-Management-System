<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <title>Veggen</title>
</head>
<body>
    <section class="popular-brands" style="background-color: #fcc927;;">
        <h2>POPULAR BRANDS</h2>
        <div class="control">
            <i class="bi bi-chevron-left left"></i>
            <i class="bi bi-chevron-right right"></i>
        </div>
        <div class="popular-brands-content">
            <?php
            // Assuming you have a valid database connection in $conn
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('Query failed');

            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
                    <form method="post" class="card" style="height:450px">
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
            } else {
                echo '<p class="empty">No products added yet!</p>';
            }
            ?>
        </div>
    </section>

    <!-- JavaScript Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.popular-brands-content').slick({
                lazyLoad: 'ondemand',
                slidesToShow: 4,
                slidesToScroll: 1,
                nextArrow: $('.left'), 
                prevArrow: $('.right'),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>