

<?php
require_once "db_connection.php";

// Process the sign-up form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match."; // changed
    }

    // Check if email is already registered
    $check_email = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        $error_message = "Email is already registered.";  //changed
    }

    // Check password strength
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z]).{5,}$/", $password)) {  //below here also
        $error_message = "Password must contain at least 5 characters with both uppercase and lowercase letters.";
    }

    if (empty($error_message)) {  // added this also to stop if got any error
        // Insert user data into the "user" table
        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === true) {
            $success_message = "User registered successfully.";  // last one
        }
    }
}
// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/front.css">
    <title>Signup Page</title>
</head>

<body>
    
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <section>
        <a href="index.php" class="back-button">Back</a>
        <div class="form-box1">
            <div class="form-value">
                <h2>Signup</h2>
                <form  id="signupForm" method="post" action=""> <!-- added this -->
                    <div class="inputbox">
                        <ion-icon name="happy-outline"></ion-icon>
                        <input type="text" required id="name" name="name">
                        <label for="">Name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" required id="email" name="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required id="password" name="password">
                        <label for="">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required id="confirm_password" name="confirm_password">
                        <label for="">Confirm password</label>
                    </div>
                    <button onclick="submitForm()">Sign up</button>
                </form> <!-- ending of form -->
                <div class="register">
                    <p>Have an account? <a href="login.php" target="_blank">Login</a></p>
                </div>
            </div>
        </div>
    </section>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var signupForm = document.getElementById('signupForm');
            signupForm.reset(); // Reset the form fields when the page loads
            history.replaceState(null, null, location.href); // Clear the form data from the browser's history
        });
    </script>

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
            window.location.href = "login.php";
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
