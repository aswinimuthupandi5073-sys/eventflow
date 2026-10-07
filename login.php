<?php

session_start();
require_once "config/db.php";

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($email === "" || $password === "") {

        $message = "Please enter email and password.";
        $messageType = "error";

    } else {

        $stmt = $conn->prepare(
            "SELECT id, name, email, password, role
             FROM users
             WHERE email = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_role"] = $user["role"];

                if ($user["role"] === "admin") {
                    header("Location: admin/dashboard.php");
                } else {
                    header("Location: index.php");
                }

                exit;

            } else {

                $message = "Invalid email or password.";
                $messageType = "error";
            }

        } else {

            $message = "Invalid email or password.";
            $messageType = "error";
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | EventFlow</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="./assets/css/style.css?v=2">

</head>

<body>

<div class="auth-page">

    <div class="auth-card">

        <div class="auth-logo">
            EventFlow
        </div>

        <h1>Welcome Back</h1>

        <p class="auth-subtitle">
            Login to continue exploring amazing events.
        </p>

        <?php if ($message !== ""): ?>

            <div class="auth-message <?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <div class="form-group">

                <label>Email Address</label>

                <div class="input-box">

                    <i class="bi bi-envelope"></i>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                    >

                </div>

            </div>

            <div class="form-group">

                <label>Password</label>

                <div class="input-box">

                    <i class="bi bi-lock"></i>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>

            </div>

            <button type="submit" class="auth-btn">

                Login

                <i class="bi bi-arrow-right"></i>

            </button>

        </form>

        <p class="auth-footer">

            Don't have an account?

            <a href="register.php">
                Create Account
            </a>

        </p>

    </div>

</div>

</body>

</html>