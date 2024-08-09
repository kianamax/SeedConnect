<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume user is logged in with id 1 (implement proper authentication in real application)
    $user_id = 5; // Replace this with the actual logged-in user's ID

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $total_amount = $_POST['total_amount'];
    $cart_items = $_POST['cart_items'];

    try {
        // Start transaction
        $pdo->beginTransaction();

        // Validate the user exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        if ($stmt->rowCount() === 0) {
            throw new Exception("Invalid user ID");
        }

        // Insert the order
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, name, email, address, total_amount, created_at) VALUES (:user_id, :name, :email, :address, :total_amount, NOW())");
        $stmt->execute([
            'user_id' => $user_id,
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'total_amount' => $total_amount,
        ]);

        // Get the newly inserted order ID
        $order_id = $pdo->lastInsertId();

        // Prepare the insert statement for order items
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)");

        // Loop through cart items and insert them into order_items
        foreach ($cart_items as $item) {
            // Validate each product exists
            $stmtProduct = $pdo->prepare("SELECT id FROM products WHERE id = :product_id");
            $stmtProduct->execute(['product_id' => $item['product_id']]);
            if ($stmtProduct->rowCount() === 0) {
                throw new Exception("Invalid product ID: " . $item['product_id']);
            }

            $stmt->execute([
                'order_id' => $order_id,
                'product_id' => $item['product_id'], 
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Optionally clear the cart for this user
        $stmt = $pdo->prepare("DELETE FROM cart_items WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);

        // Commit transaction
        $pdo->commit();

        // Redirect to receipt page with order ID
        header("Location: receipt.php?order_id=" . $order_id);
        exit();
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $pdo->rollBack();
        die("Error processing order: " . $e->getMessage());
    }
}
?>   
