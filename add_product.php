<?php
require_once "db_connection.php";

$productName = $_GET["product"];

// Retrieve the product details from the database based on the product name
$sql = "SELECT * FROM products WHERE product_name = '$productName'";
$result = $conn->query($sql);

// Display the product details
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $productId = $row["product_id"];
    echo '<div id="' . $productId . '" class="product-box">';
    echo "<img src='picture_lol/" . $row['picture'] . "' alt='Product Image' class='product-image'><br>";
    echo '<h2>' . $row["product_name"] . '</h2>';
    echo '<p>Price: $' . $row["price"] . '</p>';
    echo '<p>Material: ' . $row["material"] . '</p>';
    echo '<p>Size: ' . $row["size"] . '</p>';
    echo '<p>Color: ' . $row["color"] . '</p>';
    echo '<p>Brand: ' . $row["brand"] . '</p>';
    echo '<button onclick="removeProduct(' . $productId . ')">Remove</button>';
    echo '</div>';
} else {
    echo 'Product not found.';
}

// Close the database connection
$conn->close();
?>
