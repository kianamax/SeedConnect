<?php
session_start();

// Ensure the user is logged in as an admin
if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connect_seed";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle user deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user_id'])) {
    $delete_user_id = intval($_POST['delete_user_id']);

    // Prepare and execute the deletion query
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delete_user_id);

    if ($stmt->execute()) {
        $message = "User deleted successfully.";
        $message_type = "success";
    } else {
        $message = "An error occurred while deleting the user.";
        $message_type = "danger";
    }

    $stmt->close();
}
// Handle order deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_order_id'])) {
    $delete_order_id = intval($_POST['delete_order_id']);

    // Prepare and execute the deletion query
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->bind_param("i", $delete_order_id);

    if ($stmt->execute()) {
        $message = "Order deleted successfully.";
        $message_type = "success";
    } else {
        $message = "An error occurred while deleting the order.";
        $message_type = "danger";
    }

    $stmt->close();
}


// Fetch users
$users = [];
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
// Fetch orders
$orders = [];
$sql = "SELECT id, name, total_amount, created_at FROM orders"; // Adjust query based on your database schema
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}


// Fetch stock (if required in your dashboard)
$products = [];
$sql = "SELECT id, name, price FROM products"; // Adjust query based on your database schema
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SeedConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-6">
            <h1 class="text-3xl font-bold">Admin Dashboard</h1>
            <a href="index.php" class="text-red-500">Logout</a>
        </div>

        <!-- Alert message -->
        <?php if (isset($message)): ?>
            <div class="bg-<?= $message_type ?>-100 border border-<?= $message_type ?>-400 text-<?= $message_type ?>-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold"><?= $message ?></strong>
            </div>
        <?php endif; ?>

        <!-- Users Section -->
        <section id="users">
            <h2 class="text-2xl font-semibold mb-4">Users</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Username</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($users as $user): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left"><?= $user['id'] ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['username']) ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['email']) ?></td>
                            <td class="py-3 px-6 text-center">
                                <form method="POST" action="admin_dashboard.php">
                                    <input type="hidden" name="delete_user_id" value="<?= $user['id'] ?>">
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Orders Section -->
<section id="orders" class="mt-8">
    <h2 class="text-2xl font-semibold mb-4">Orders</h2>
    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Customer Name</th>
                    <th class="py-3 px-6 text-left">Total Price (KES)</th>
                    <th class="py-3 px-6 text-left">Order Date</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($orders as $order): ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left"><?= $order['id'] ?></td>
                    <td class="py-3 px-6 text-left"><?= htmlspecialchars($order['name']) ?></td>
                    <td class="py-3 px-6 text-left"><?= number_format($order['total_amount'], 2) ?></td>
                    <td class="py-3 px-6 text-left"><?= htmlspecialchars($order['created_at']) ?></td>
                    <td class="py-3 px-6 text-center">
                        <form method="POST" action="admin_dashboard.php">
                            <input type="hidden" name="delete_order_id" value="<?= $order['id'] ?>">
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>


        <!-- Stock Section -->
        <section id="stock" class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Stock</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Price (KES)</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($products as $product): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left"><?= $product['id'] ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($product['name']) ?></td>
                            <td class="py-3 px-6 text-left"><?= number_format($product['price'], 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>
