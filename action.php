<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "perfume_website");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'remove' parameter is set in the GET request
if (isset($_GET['remove'])) {
    // Sanitize input to prevent SQL injection
    $id =($_GET['remove']);
   

    // Check if id is a valid positive integer
    if ($id > 0) {
        // Execute delete query
        $sql = "DELETE FROM `cart` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Check if a row was deleted
            if (mysqli_affected_rows($conn) > 0) {
                $_SESSION['showAlert'] = 'block';
                $_SESSION['message'] = 'Item removed from the cart!';
            } else {
                $_SESSION['showAlert'] = 'block';
                $_SESSION['message'] = 'Failed to remove item. Item may not exist.';
            }
        } else {
            $_SESSION['showAlert'] = 'block';
            $_SESSION['message'] = 'Error: Unable to execute delete query.';
        }
    } else {
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Invalid item ID.';
    }

    // Redirect to cart page
    header('Location: cart.php');
    exit();
}

if (isset($_GET['clear'])) {
   $sql="DELETE FROM cart";
   $result = mysqli_query($conn, $sql);
   if($result){

   
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header('location:cart.php');}
  }

  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $qty * $pprice;

    $sql = "UPDATE cart SET product_qty='$qty', total_price='$tprice' WHERE id='$pid'";
$result = mysqli_query($conn, $sql);
    
  }

  if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];

    $data = '';

    $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
    $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
    $stmt->execute();
    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();
    $data .= '<div class="text-center">
                              <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                              <h2 class="text-success">Your Order Placed Successfully!</h2>
                              <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
                              <h4>Your Name : ' . $name . '</h4>
                              <h4>Your E-mail : ' . $email . '</h4>
                              <h4>Your Phone : ' . $phone . '</h4>
                              <h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
                              <h4>Payment Mode : ' . $pmode . '</h4>
                              
                             <a href="index.php"><button class="btn">Continue Shopping</button> </a>
                              
                        </div>';
    echo $data;
  }
mysqli_close($conn);
?>
