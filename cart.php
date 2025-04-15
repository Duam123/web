<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "perfume_website");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<div class="fluid-container">
    <div class="row justify-content-center">
        <div class="col-lg-10 ">
            <div style="display:<?php if (isset($_SESSION['showAlert'])) { echo $_SESSION['showAlert']; unset($_SESSION['showAlert']); } else { echo 'none'; } ?>" class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; unset($_SESSION['message']); } ?></strong>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td colspan="8">
                            <h4 class="text-center text-info m-0">Products in your cart!</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');">
                                <i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stmt = $conn->prepare('SELECT * FROM cart');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $grand_total = 0;
                    while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                        <td><img src="<?= htmlspecialchars($row['product_image']) ?>" width="50"></td>
                        <td><?= htmlspecialchars($row['product_name']) ?></td>
                        <td><?= htmlspecialchars($row['pcate']) ?></td>
                        <td><i class="fa-solid fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'], 2); ?></td>
                        <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                        <td><input min="1" style="width:75px;" type="number" class="form-control itemQty" value="<?= $row['product_qty']; ?>"
                    </td>
                        <td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<span class="total-price"><?= number_format($row['total_price'], 2); ?></span></td>
                        <td>
                            <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $grand_total += $row['total_price']; ?>
                    <?php endwhile; ?>
                    <tr>
                        <td colspan="4">
                            <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
                        </td>
                        <td colspan="2"><b>Grand Total</b></td>
                        <td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<span id="grand-total"><?= number_format($grand_total, 2); ?></span></b></td>
                        <td>
                            <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script>
    $(document).ready(function () {

        // Change item quantity and update total price without page reload
        $(".itemQty").on('change', function () {
            var $el = $(this).closest('tr');
            var pid = $el.find(".pid").val();
            var pprice = parseFloat($el.find(".pprice").val());
            var qty = $(this).val();
            var totalPrice = (qty * pprice).toFixed(2);
            $el.find(".total-price").text(totalPrice);

            // Update grand total dynamically
            updateGrandTotal();

            $.ajax({
                url: 'action.php',
                method: 'POST',
                data: {
                    qty: qty,
                    pid: pid,
                    pprice: pprice
                },
                success: function (response) {
                    console.log(response);
                }
            });
        });

        // Function to update grand total
        function updateGrandTotal() {
            var grandTotal = 0;
            $(".total-price").each(function () {
                grandTotal += parseFloat($(this).text());
            });
            $("#grand-total").text(grandTotal.toFixed(2));
        }

    });
</script>
</body>
</html>
