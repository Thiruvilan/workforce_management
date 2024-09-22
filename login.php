<?php
// Start a session
session_start();

// Hardcoded credentials (for example purposes)
$valid_username = 'admin';
$valid_password = 'password123';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials
    if ($username === $valid_username && $password === $valid_password) {
        // Set session variables to store user login status
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;

        // Redirect to the dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // If invalid, set an error message
        $error = 'Invalid username or password';
    }
}
?>

<!-- Simple login form with error display -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <div class="login-container">
        <h2>Workforce Management System</h2>
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <?php if (!empty($error)): ?>
                <div class="error" style="color: red;"><?php echo $error; ?></div>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>  
