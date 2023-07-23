// Add this code to your script.js file

function addProduct() {
    var productName = document.getElementById("addInput").value;
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("productDisplay").innerHTML = this.responseText;
        }
    };
    
    xhttp.open("GET", "search.php?product=" + productName, true);
    xhttp.send();
}

// Optional: Remove the old search results when performing a new search
function clearResults() {
    document.getElementById("productDisplay").innerHTML = "";
}

// Trigger the search and clear previous results
function performSearch() {
    clearResults();
    addProduct();
}
