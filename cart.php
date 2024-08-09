<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - SeedConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-green {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }
        .btn-green:hover {
            background-color: #45a049;
            border-color: #45a049;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-green-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-2xl font-bold">SeedConnect</a>
            <a href="index.php" class="text-white">Back to Shop</a>
        </div>
    </nav>

    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-green-700">Your Cart</h1>
        
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left p-2">Product</th>
                        <th class="text-left p-2">Price</th>
                        <th class="text-left p-2">Quantity</th>
                        <th class="text-left p-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once 'db_connection.php';

                $user_id = 1; // Assume user is logged in with id 1

                // Fetch cart items
                $stmt = $pdo->prepare("SELECT p.id, p.name, p.price, c.quantity, (p.price * c.quantity) as total 
                                       FROM cart_items c 
                                       JOIN products p ON c.product_id = p.id 
                                       WHERE c.user_id = :user_id");
                $stmt->execute(['user_id' => $user_id]);
                $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $total = 0;
                foreach ($cartItems as $item):
                    $total += $item['total'];
                ?>
                <tr class="border-b">
                    <td class="p-2"><?php echo htmlspecialchars($item['name']); ?></td>
                    <td class="p-2">KES<?php echo number_format($item['price'], 2); ?></td>
                    <td class="p-2"><?php echo $item['quantity']; ?></td>
                    <td class="p-2">KES<?php echo number_format($item['total'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right p-2"><strong>Total:</strong></td>
                        <td class="p-2"><strong>KES<?php echo number_format($total, 2); ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4 text-green-700">Checkout</h2>
            <form action="process_order.php" method="POST">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                    <textarea id="address" name="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required></textarea>
                </div>

                <!-- Hidden inputs for cart items -->
                <?php foreach ($cartItems as $item): ?>
                    <input type="hidden" name="cart_items[<?php echo htmlspecialchars($item['id']); ?>][product_id]" value="<?php echo htmlspecialchars($item['id']); ?>">
                    <input type="hidden" name="cart_items[<?php echo htmlspecialchars($item['id']); ?>][quantity]" value="<?php echo htmlspecialchars($item['quantity']); ?>">
                    <input type="hidden" name="cart_items[<?php echo htmlspecialchars($item['id']); ?>][price]" value="<?php echo htmlspecialchars($item['price']); ?>">
                <?php endforeach; ?>

                <input type="hidden" name="total_amount" value="<?php echo htmlspecialchars($total); ?>">

                <button type="submit" class="btn-green text-white px-4 py-2 rounded-md">Place Order</button>
            </form>
        </div>
    </div>

    <footer class="bg-green-600 text-white mt-10 py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 SeedConnect. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
