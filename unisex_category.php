<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scentra Perfume Shop - Unisex's Collection</title>
    <link rel="stylesheet" href="styles/products.css">

</head>
<body>
<div class="header-container">
    <a class="button" href="index.php">Back</a>
    <h1 class="large-text">Our Unisex Collection</h1><br>
</div>
<!-- Product Page Section -->
 <br><hr>
<div class="product-container">
    <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "perfume_website";

        // Database connection
        $conn = mysqli_connect($hostname, $username, $password, $database);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to fetch all products in the "unisex" category
        $sql = "SELECT product_id, product_name, description, price, cover_image, category  FROM product WHERE category='unisex'";
        $result = mysqli_query($conn, $sql);

        // Display each product
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product-card'>";
                echo "<a href='product_detail.php?product_id=" . htmlspecialchars($row['product_id']) . "&category=unisex'>
                    <div class='product-image'>
                        
                            <img src='" . htmlspecialchars($row['cover_image']) . "' alt='" . htmlspecialchars($row['product_name']) . "'>
                        
                      </div>";
                echo "<div class='product-details'>
                        <h2>" . htmlspecialchars($row['product_name']) . "</h2><br>
                        <p class='description'>" . htmlspecialchars($row['description']) . "</p><br>
                        <p class='price'>PKR " . htmlspecialchars($row['price']) . "</p>
                      </div></a>";
                echo "</div>";
            }
            
        } else {
            echo "No products found in this category.";
        }

        // Close the connection
        mysqli_close($conn);
    ?>
</div>

</body>
</html>
