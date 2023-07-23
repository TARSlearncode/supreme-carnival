<?php



// Include the database connection file
require_once "db_connection.php";

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email, username, and password from the form
    $email = sanitize($_POST["email"]);
    $username = sanitize($_POST["name"]);
    $password = sanitize($_POST["password"]);

    // Prepare the SQL statement to select the user by email and username
    $sql = "SELECT * FROM user WHERE email = '$email' AND name = '$username'";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Fetch the user row
        $user = $result->fetch_assoc();

        // Verify the password
        if ($password === $user['password']) {
            // Password is correct
            
            $success_message = "Login successfully.";
        } else {
            // Invalid password
            $error_message = "Invalid password";
        }
    } else {
        // Invalid email or username
        $error_message = "Account not found";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/front.css">
  <title>Login Page</title>
</head>
<body>
  

 
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
   
    <section>
    

        
    <a href="index.php" class="back-button">Back</a>
        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>Login</h2>
    
                    <div class="inputbox">
                        <<ion-icon name="happy-outline"></ion-icon>
                        <input type="text" required id="name" name="name">
                        <label for="">Name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" required id="email" name="email">
                        <label for="email">Email</label></div>               
                        
                        <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required id="password" name="password">
                        <label for="">Password</label>
                    </div>
                    <button a href="mainpage.php">Log in</button>
                    <div class="register">
                     <p>Don't have a account? <a href="signup.php" target="_blank">Register</a></p>
                    </div>
                    
                </form>
            </div>
            
                    
        </div>

     
    </section>
    
                    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <style>
        .popout {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
        }
    </style>

    <div id="errorPopout" class="popout">
        <h3>Error</h3>
        <p id="errorMessage"></p>
        <button onclick="closePopout('errorPopout')">Close</button>
    </div>

    <div id="successPopout" class="popout">
        <h3>Success</h3>
        <p id="successMessage"></p>
        <button onclick="closePopoutAndRedirect('successPopout')">Close</button>
    </div>

    <script>
        function closePopout(popoutId) {
            var popout = document.getElementById(popoutId);
            popout.style.display = "none";
        }

        function closePopoutAndRedirect(popoutId) {
            var popout = document.getElementById(popoutId);
            popout.style.display = "none";
            // Redirect the user to a page
            window.location.href = "mainpage.php";
        }

        window.addEventListener('DOMContentLoaded', function() {
            var errorPopout = document.getElementById("errorPopout");
            var errorMessage = document.getElementById("errorMessage");
            var successPopout = document.getElementById("successPopout");
            var successMessage = document.getElementById("successMessage");

            <?php if (isset($error_message)) : ?>
                errorPopout.style.display = "block";
                errorMessage.textContent = <?php echo json_encode($error_message); ?>;
            <?php endif; ?>

            <?php if (isset($success_message)) : ?>
                successPopout.style.display = "block";
                successMessage.textContent = <?php echo json_encode($success_message); ?>;
            <?php endif; ?>
        });
    </script>

</body>
</html>
