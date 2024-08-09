<?php
require_once 'db_connection.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = :order_id");
    $stmt->execute(['order_id' => $order_id]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($order) {
        // Fetch order items
        $stmt = $pdo->prepare("SELECT oi.*, p.name as product_name 
                               FROM order_items oi 
                               JOIN products p ON oi.product_id = p.id 
                               WHERE oi.order_id = :order_id");
        $stmt->execute(['order_id' => $order_id]);
        $orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        die("Order not found");
    }
} else {
    die("No order ID provided");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt - SeedConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold mb-6 text-green-700">Order Receipt</h1>
            
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Order Details</h2>
                <p>Order ID: <?php echo htmlspecialchars($order['id']); ?></p>
                <p>Date: <?php echo htmlspecialchars($order['created_at']); ?></p>
                <p>Name: <?php echo htmlspecialchars($order['name']); ?></p>
                <p>Email: <?php echo htmlspecialchars($order['email']); ?></p>
                <p>Address: <?php echo htmlspecialchars($order['address']); ?></p>
            </div>

            <table class="w-full mb-4">
                <thead>
                    <tr class="border-b">
                        <th class="text-left p-2">Product</th>
                        <th class="text-left p-2">Price</th>
                        <th class="text-left p-2">Quantity</th>
                        <th class="text-left p-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderItems as $item): ?>
                    <tr class="border-b">
                        <td class="p-2"><?php echo htmlspecialchars($item['product_name']); ?></td>
                        <td class="p-2">KES<?php echo number_format($item['price'], 2); ?></td>
                        <td class="p-2"><?php echo $item['quantity']; ?></td>
                        <td class="p-2">KES<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right p-2"><strong>Total:</strong></td>
                        <td class="p-2"><strong>KES<?php echo number_format($order['total_amount'], 2); ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <a href="index.php" class="bg-green-600 text-white px-4 py-2 rounded-md">Back to Shop</a>
        </div>
    </div>
</body>
</html>