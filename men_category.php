
<?php
        // Database credentials
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "perfume_website";

        // Establish a database connection
        $conn = mysqli_connect($hostname, $username, $password, $database);

        // Check if connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `cart`";
        $result = mysqli_query($conn, $sql);
      $num_rows=mysqli_num_rows($result);
      if ($num_rows > 0) {
        $countcart=mysqli_num_rows($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scentra Perfume Shop - Men's Collection</title>
    <link rel="stylesheet" href="styles/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<!-- Header Section -->
<div class="header-container">
    <a class="button" href="index.php">Back</a>
    <h1 class="large-text">Our Men's Collection</h1>

   <a href="cart.php"> <button class="button" ><i class="fa-solid fa-cart-shopping"></i> 
   <?php if ($num_rows > 0) {?>
   <span style="
    text-align: center;
    display: inline-block;
    color: red;
    font-size: 22px;
    background: white;
    border-radius: 50%;
    height: 26px;
    width: 26px;
"> 
      <?php  echo $countcart=mysqli_num_rows($result);
    } ?></span></button></a>
</div>

<hr>

<!-- Product Page Section -->
<div class="product-container">

<?php
        // SQL query to fetch products from the "men" category
        $sql = "SELECT product_id, product_name, description, price, cover_image, category
                FROM product 
                WHERE category = 'men'";
        $result = mysqli_query($conn, $sql);

        // Check if any products were found
        if (mysqli_num_rows($result) > 0) {
            // Loop through each product and display it
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="product-card">
                    <a href="product_detail.php?product_id=<?= htmlspecialchars($row['product_id']) ?>&category=men">
                        <div class="product-image">
                            <img src="<?= htmlspecialchars($row['cover_image']) ?>" alt="<?= htmlspecialchars($row['product_name']) ?>">
                        </div>
                        <div class="product-details">
                            <h2><?= htmlspecialchars($row['product_name']) ?></h2>
                            <p class="description"><?= htmlspecialchars($row['description']) ?></p>
                            <p class="price">PKR <?= htmlspecialchars($row['price']) ?></p>
                        </div>
                    </a>
                </div>
                <?php
            }
        } else {
            echo "<p>No products found in this category.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
</div>

</body>
</html>
