<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   
</head>
<body>
    <h1>Search a product</h1>

    <div id="productDisplay">
        <!-- Displayed products will be added here -->
    </div>

    

    
    <input type="text" id="addInput" placeholder="Enter product name">
    <button onclick="addProduct()">Search</button>

    <hr>

    <h2>search results</h2>
    <div id="comparisonResults">
        
        <!-- Compared products will be added/removed here -->
    </div>

    <script src="scripts.js"></script>
</body>
</html>
