<?php 
$conn = mysqli_connect("localhost", "root", "", "perfume_website");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['addcart'])) {
        // Retrieve form data
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcate=$_POST['pcate'];
       
        
        
        
        // Set quantity and calculate total price
        $product_qty = 1;  // Default quantity added to cart
        $total_price = $pprice * $product_qty;

        // Insert data into `cart` table
        $sql = "INSERT INTO `cart` (`id`, `product_name`, `product_price`, `product_image`, `product_qty`, `total_price`,`pcate`) 
                VALUES ('$pid', '$pname', '$pprice', '$pimage', '$product_qty', '$total_price','$pcate')";
                
        $result = mysqli_query($conn, $sql);

        if($result){

             echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Product added to your cart!</strong>
						</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Product already added to your cart!</strong>
          </div>';
        }
    }
}


?>
<?php
   
$sql = "SELECT * FROM `cart`";
        $result = mysqli_query($conn, $sql);
      $num_rows=mysqli_num_rows($result);
  
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="styles/product_detail.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    $category = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : 'index';
    $backLink = 'index.html';

    if ($category === 'men') {
        $backLink = 'men_category.php';
    } elseif ($category === 'women') {
        $backLink = 'women_category.php';
    } elseif ($category === 'unisex') {
        $backLink = 'unisex_category.php';
    }
    ?>

    <div class="pagination">
        <a class="button" href="<?= $backLink; ?>">Back</a>
        <a href="cart.php" class="float-end"> <button class="button" ><i class="fa-solid fa-cart-shopping"></i> <span style="
    text-align: center;
    
    display: inline-block;
    color: red;
    font-size: 22px;
    background: white;
    border-radius: 50%;
    
    width: 36px;
"> <?php if ($num_rows > 0) {
       echo $countcart=mysqli_num_rows($result);
    } ?></span></button></a>
    </div>
<div id="message>"> </div> 
    <section class="product-container">
        <?php
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_GET['product_id'])) {
            $product_id = intval($_GET['product_id']);
            $sql = "SELECT product_name, price, description,cover_image, category FROM product WHERE product_id = $product_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>

                <div class="img-card">
                    <img src="<?= htmlspecialchars($row['cover_image']); ?>"
                        alt="<?= htmlspecialchars($row['product_name']); ?>" id="featured-image">
                </div>

                <div class="product-info">
                    <h3><?= htmlspecialchars($row['product_name']); ?></h3>
                    <h5>Price: PKR <?= htmlspecialchars($row['price']); ?></h5>
                    <p><?= htmlspecialchars($row['description']); ?></p>
                    
                    <br>
                    <br>

                    <form class="form-submit" action="" method="post">
                        <input type="hidden" name="pid" value="<?= $product_id ?>">
                        <input type="hidden" name="pname" value="<?= htmlspecialchars($row['product_name']); ?>">
                        <input type="hidden" name="pprice" value="<?= htmlspecialchars($row['price']); ?>">
                        <input type="hidden" name="pimage" value="<?= htmlspecialchars($row['cover_image']); ?>">
                        <input type="hidden" name="pcate" value="<?= htmlspecialchars($row['category']); ?>">
                        <button class="addItemBtn" name="addcart">Add to Cart</button>
                    </form>
                </div>

                <?php
            } else {
                echo "<p>Product information is currently unavailable.</p>";
            }
        } else {
            echo "<p>No product specified.</p>";
        }

        mysqli_close($conn);
        ?>
    </section>

    <!-- <script src="js/cart.js"></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <!-- <script>
        $(document).ready(function () {
            // Add to cart button click event
            $(".addItemBtn").click(function (e) {
                e.preventDefault();

                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pimage = $form.find(".pimage").val();
                var pcate = $form.find(".pcate").val();
                var pstock = $form.find(".pcstock").val();


                // AJAX request to add the item to cart
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {
                        pid: pid,
                        pname: pname,
                        pprice: pprice,
                        pstock: pstock,
                        pimage: pimage,
                        pcate: pcate
                    },
                    success: function (response) {
                        $("#message").html(response);
                        window.scrollTo(0, 0);

                    }
                });
            });

            // Function to load cart item number
            // function load_cart_item_number() {
            //     $.ajax({
            //         url: 'action.php',
            //         method: 'get',
            //         data: {
            //             cartItem: "cart_item"
            //         },
            //         success: function(response) {
            //             $("#cart-item").html(response);
            //         }
            //     });
            // }

            // // Initial load of cart item number
            // load_cart_item_number();
        });
    </script> -->
</body>

</html>