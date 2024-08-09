<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = 1; // Assume user is logged in with id 1
    $product_id = $_POST['product_id'];
    $quantity = 1; // Default quantity

    // Check if item already in cart
    $stmt = $pdo->prepare("SELECT id, quantity FROM cart_items WHERE user_id = :user_id AND product_id = :product_id");
    $stmt->execute(['user_id' => $user_id, 'product_id' => $product_id]);
    $existing_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing_item) {
        // Update quantity if item exists
        $new_quantity = $existing_item['quantity'] + $quantity;
        $stmt = $pdo->prepare("UPDATE cart_items SET quantity = :quantity WHERE id = :id");
        $stmt->execute(['quantity' => $new_quantity, 'id' => $existing_item['id']]);
    } else {
        // Insert new item if it doesn't exist
        $stmt = $pdo->prepare("INSERT INTO cart_items (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $user_id, 'product_id' => $product_id, 'quantity' => $quantity]);
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>