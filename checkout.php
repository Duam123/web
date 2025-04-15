

<?php


$conn = mysqli_connect("localhost", "root", "", "perfume_website");

$grand_total = 0;
$allItems = '';
$items = [];

// Fetch items in the cart
// $sql = "SELECT CONCAT('',product_name, '(', product_qty, ')') AS ItemQty, total_price FROM cart";
$sql = "SELECT CONCAT(product_name, ' - ', pcate, ' (Qty: ', product_qty, ')') AS ItemQty, total_price FROM cart";

$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $grand_total += $row['total_price'];
        $items[] = $row['ItemQty'];
    }
    $allItems = implode(', ', $items);
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-info p-2">Complete your order!</h4>
                <div class="jumbotron p-3 mb-2 text-center">
                    <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
                    <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
                    <h5><b>Total Amount Payable : </b><?= number_format($grand_total, 2) ?>/-</h5>
                </div>
                <form action="" method="post" id="placeOrder">
                    <input type="hidden" name="products" value="<?= $allItems; ?>">
                    <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                    </div>
                    <div class="form-group">
                        <textarea name="address" class="form-control" rows="3" cols="10"
                            placeholder="Enter Delivery Address Here..."></textarea>
                    </div>
                    <h6 class="text-center lead">Select Payment Mode</h6>
                    <div class="form-group">
                        <select name="pmode" class="form-control">
                            <option value="" selected disabled>-Select Payment Mode-</option>
                            <option value="cod">Cash On Delivery</option>
                            <option value="netbanking" disabled>Net Banking</option>
                            <option value="cards" disabled>Debit/Credit Card</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#placeOrder").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: $(this).serialize() + "&action=order",
                    success: function (response) {
                        $("#order").html(response);
                    },
                    error: function () {
                        console.log("Error in AJAX request.");
                    }
                });
            });
        });
    </script>
</body>

</html>

