
    

const maxProductCount = 3;
    const products = new Set();

    function changeZoom() {
        // Your existing changeZoom() function
    }

    function addProduct() {
        const input = document.getElementById("addInput");
        const productName = input.value.trim();

        if (productName === "") {
            alert("Please enter a valid product name.");
            return;
        }

        if (products.size >= maxProductCount) {
            alert("Maximum compare products reached. You can only compare up to 3 products.");
            return;
        }

        if (products.has(productName)) {
            alert("This product is already in the comparison list.");
            return;
        }

      
    }

   
  
// Function to add a product to the comparison
function addProduct() {
    var productName = document.getElementById('addInput').value;

    // Call a PHP script using AJAX to retrieve the product details
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var comparisonResults = document.getElementById('comparisonResults');
            comparisonResults.innerHTML += this.responseText;
        }
    };
    xmlhttp.open("GET", "add_product.php?product=" + productName, true);
    xmlhttp.send();
}

// Function to remove a product from the comparison
function removeProduct(productId) {
    var product = document.getElementById(productId);
    product.parentNode.removeChild(product);
}

