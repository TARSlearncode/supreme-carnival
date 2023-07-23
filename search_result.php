<?php
require_once "db_connection.php";

$productName = $_GET["product"];

// Retrieve the product details from the database based on the product name
$sql = "SELECT * FROM products WHERE product_name LIKE '%$productName%'";
$result = $conn->query($sql);

// Display the product details
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productId = $row["product_id"];
        echo '<div id="' . $productId . '" class="product">';
        echo "<td><img src='picture_lol/" . $row['picture'] . "' alt='Product Image' class='product-image'></td>";
        echo '<h2>' . $row["product_name"] . '</h2>';
        echo "<td><img src='" . $row['picture'] . "' alt='Product Image' width='100'></td>";
        echo '<p>Price: $' . $row["price"] . '</p>';
        echo '<p>Material: ' . $row["material"] . '</p>';
        echo '<p>Size: ' . $row["size"] . '</p>';
        echo '<p>Color: ' . $row["color"] . '</p>';
        echo '<p>Brand: ' . $row["brand"] . '</p>';
        echo '<button onclick="removeProduct(' . $productId . ')">Remove</button>';
        echo '</div>';
    }
} else {
    echo 'No products found.';
}

// Close the database connection
$conn->close();
?>
