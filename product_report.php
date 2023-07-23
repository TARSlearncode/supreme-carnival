<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <!-- Other head elements -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: url("background_lol.jpg") no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .report-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 20px;
            backdrop-filter: blur(2px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-image {
            max-width: 200px; /* Adjust the width as needed */
            height: auto;
            border-radius: 5px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .product-details {
            text-align: center;
        }
        
        .print-button {
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 20px;
        }
        
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <span class="close-button" onclick="closePage()">&times;</span> <!-- Close button -->
        <?php
        require_once "db_connection.php";

        // Retrieve the product ID from the URL query parameter
        $productID = $_GET['product_id'];

        // Construct and execute the database query to fetch the product details
        $query = "SELECT * FROM products WHERE product_id = '$productID'";
        $result = mysqli_query($conn, $query);

        // Fetch the product details
        $product = mysqli_fetch_assoc($result);

        // Display the product information
        echo "<h1>Product Report</h1>";
        echo "<img src='picture_lol/" . $product['picture'] . "' alt='Product Image' class='product-image'>";
        echo "<div class='product-details'>";
        echo "<p><strong>Product Name:</strong> " . $product['product_name'] . "</p>";
        echo "<p><strong>Material:</strong> " . $product['material'] . "</p>";
        echo "<p><strong>Price:</strong> " . $product['price'] . "</p>";
        echo "<p><strong>Size:</strong> " . $product['size'] . "</p>";
        echo "<p><strong>Color:</strong> " . $product['color'] . "</p>";
        echo "<p><strong>Brand:</strong> " . $product['brand'] . "</p>";
        echo "</div>";

        // Other HTML and PHP code for the product report page
        ?>
        <!-- Print button -->
        <button class="print-button" onclick="printProduct()">Print Product Details</button>

        <!-- JavaScript code to close the page and print the product details -->
        <script>
            // Function to close the page
            function closePage() {
                window.close(); // Close the current window/tab
            }

            // Function to trigger the print functionality
            function printProduct() {
                // Hide the print button to avoid it being printed
                document.querySelector('.print-button').style.display = 'none';

                // Trigger the print functionality
                window.print();

                // Show the print button again after printing is done
                document.querySelector('.print-button').style.display = 'block';
            }
        </script>
    </div>
</body>
</html>
