<?php
require_once "db_connection.php";

$productName = $_GET["product"];

// Retrieve the product details from the database based on the product name
$sql = "SELECT * FROM products WHERE product_name = '$productName'";
$result = $conn->query($sql);

// Prepare the product details as JSON response
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product = [
        "productId" => $row["product_id"],
        "productName" => $row["product_name"],
        "picture" => $row["picture"],
        "price" => $row["price"],
        "material" => $row["material"],
        "size" => $row["size"],
        "color" => $row["color"],
        "brand" => $row["brand"]
    ];
    echo json_encode($product);
} else {
    // Product not found
    echo json_encode(null);
}

// Close the database connection
$conn->close();
?>
