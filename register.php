<?php

session_start();
require_once "config/db.php";

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($name === "" || $email === "" || $password === "") {

        $message = "Please fill all fields.";
        $messageType = "error";

    } else {

        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $message = "Email already registered.";
            $messageType = "error";

        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare(
                "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
            );

            $stmt->bind_param(
                "sss",
                $name,
                $email,
                $hashedPassword
            );

            if ($stmt->execute()) {

                $message = "Registration successful. You can login now.";
                $messageType = "success";

            } else {

                $message = "Registration failed. Please try again.";
                $messageType = "error";
            }

            $stmt->close();
        }

        $check->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | EventFlow</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <link rel="stylesheet" href="./assets/css/style.css?v=2">
</head>

<body>

<div class="auth-page">

    <div class="auth-card">

        <div class="auth-logo">
            EventFlow
        </div>

        <h1>Create Account</h1>

        <p class="auth-subtitle">
            Join EventFlow and start discovering events.
        </p>

        <?php if ($message !== ""): ?>

            <div class="auth-message <?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <div class="form-group">

                <label>Full Name</label>

                <div class="input-box">
                    <i class="bi bi-person"></i>

                    <input type="text"
                           name="name"
                           placeholder="Enter your name"
                           required>
                </div>

            </div>

            <div class="form-group">

                <label>Email Address</label>

                <div class="input-box">
                    <i class="bi bi-envelope"></i>

                    <input type="email"
                           name="email"
                           placeholder="Enter your email"
                           required>
                </div>

            </div>

            <div class="form-group">

                <label>Password</label>

                <div class="input-box">
                    <i class="bi bi-lock"></i>

                    <input type="password"
                           name="password"
                           placeholder="Create a password"
                           required>
                </div>

            </div>

            <button type="submit" class="auth-btn">
                Create Account
                <i class="bi bi-arrow-right"></i>
            </button>

        </form>

        <p class="auth-footer">
            Already have an account?
            <a href="login.php">Login</a>
        </p>

    </div>

</div>

</body>
</html>