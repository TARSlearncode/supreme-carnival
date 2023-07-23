<?php
require_once "db_connection.php";
?>

    <?php
    // Retrieve the category from the URL query parameter
    $category = $_GET['category'];

    // Construct and execute the database query
    $query = "SELECT product_id, picture, product_name, material, price, size, color, brand FROM products WHERE category = '$category'";
    $result = mysqli_query($conn, $query);

    // Display the product details on the category page?>
    <!DOCTYPE html>
<html>
<head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="admin/all_admin.css">
    <link rel="stylesheet"  href="admin/styles_admin.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add the CSS styles here */
        .generate-report-btn {
            color: white;
            background-color: transparent;
            border: none;
            cursor: pointer;
            text-decoration: none;
            position: relative;
        }

        .generate-report-btn:before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 2px;
            background-color: white;
            visibility: hidden;
            transform: scaleX(0);
            transition: all 0.3s ease-in-out;
        }

        .generate-report-btn:hover:before {
            visibility: visible;
            transform: scaleX(1);
        }
    </style>
</head>
<body>
    <nav>
    <div class="title">Fashion</div>
    <ul class="nav-options">
      <li><a href="mainpage.php">Home</a></li>
      
    </ul>
  </nav>

<table>

    <tr>
        
        <th>Picture</th>
        <th>Product Name</th>
        <th>Material</th>
        <th>Price</th>
        <th>Size</th>
        <th>Color</th>
        <th>Brand</th>
        <th>Report</th> <!-- New column header for the button -->
        
    </tr>
    </div>
<?php
    // Iterate through the retrieved product data and display in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
       
        echo "<td><img src='picture_lol/" . $row['picture'] . "' alt='Product Image' class='product-image'></td>";
        echo '<td>' . $row['product_name'] . '</td>';
        echo '<td>' . $row['material'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '<td>' . $row['size'] . '</td>';
        echo '<td>' . $row['color'] . '</td>';
        echo '<td>' . $row['brand'] . '</td>';
        echo '<td><button class="generate-report-btn" onclick="generateReport(' . $row['product_id'] . ')">Generate</button></td>';
    
        echo '</tr>';
    }

    echo '</table>';
    ?>
 <script>
        function generateReport(productID) {
            window.open("product_report.php?product_id=" + productID);
        }
    </script>
    <!-- Other HTML and PHP code -->
</body>
</html>