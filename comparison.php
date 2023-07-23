<!DOCTYPE html>
<html>
<head>
<style>
    body {
      zoom: 100%; /* Initial zoom level */
      background-image: url('wallpaper.jpg');
      background-size: cover;
      background-repeat: no-repeat;
     color: #fff;
    }
    
    #zoomSlider {
      width: 200px;
      margin-bottom: 20px;
    }
    
   
  </style>
  <script>
    function changeZoom() {
      var zoomSlider = document.getElementById("zoomSlider");
      var dot = document.getElementById("dot");
      
      var zoomValue = zoomSlider.value;
      var zoomLevel = parseFloat(zoomValue) / 100;
      
      document.body.style.zoom = zoomLevel;
      
      var dotPosition = zoomSlider.clientWidth * zoomLevel;
      dot.style.left = dotPosition + "px";
    }
  </script>





    <title>Product Comparison</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style>
        

        .product-image {
            max-width: 300px; /* Adjust the width as needed */
            height: 200px;
            border-radius: 5px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        
  /* CSS styles for the comparison page */
  .product-box {
    
        display: inline-block;
        width: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        margin: 10px;
        /* Add transparency */
        opacity: 0.8;
        /* Add blur effect */
        backdrop-filter: blur(5px);
        background-color: white;
        color: black;
        border-radius: 25px;
    }

  
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }

  
  


    </style>
</head>
<body>
<input type="range" min="50" max="200" value="100" step="10" id="zoomSlider" oninput="changeZoom()">
  <div id="dot"></div>
    <h1>Product Comparison</h1>

    <div id="productDisplay">
        <!-- Displayed products will be added here -->
    </div>

    

    <h2>Add Product to Comparison</h2>
    <input type="text" id="addInput" placeholder="Enter product name">
    <button onclick="addProduct()">Add to Comparison</button>

    <hr>
    
    <h2>Comparison Results</h2>
    <div class="container">
    <div id="comparisonResults">
        
        <!-- Compared products will be added/removed here -->
    </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
