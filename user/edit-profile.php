<?php

require_once "../config/auth.php";
require_once "../config/db.php";

$userId = $_SESSION["user_id"];

$stmt = $conn->prepare("
    SELECT name, email, phone, location
    FROM users
    WHERE id = ?
");

$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();

$name = $user["name"] ?? "";
$email = $user["email"] ?? "";
$phone = $user["phone"] ?? "";
$location = $user["location"] ?? "";

$userId = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $location = trim($_POST["location"] ?? "");

    if ($name !== "" && $email !== "") {

        $update = $conn->prepare("
            UPDATE users
            SET name = ?, email = ?, phone = ?, location = ?
            WHERE id = ?
        ");

        $update->bind_param(
            "ssssi",
            $name,
            $email,
            $phone,
            $location,
            $userId
        );

        if ($update->execute()) {

    echo "Profile updated successfully";
    exit;

            $_SESSION["user_name"] = $name;
            $_SESSION["user_email"] = $email;

            $update->close();

            header("Location: profile.php");
            exit;

        } else {

            $error = "Unable to update profile.";
        }

        $update->close();
    } else {

        $error = "Name and email are required.";
    }
}

$stmt = $conn->prepare("
    SELECT name, email, phone, location
    FROM users
    WHERE id = ?
");

$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

$stmt->close();

$name = $user["name"] ?? "";
$email = $user["email"] ?? "";
$phone = $user["phone"] ?? "";
$location = $user["location"] ?? "";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile | EventFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f7f7f5;
            color: #111;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            height: 80px;
            padding: 0 7%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            border-bottom: 1px solid #e5e5e2;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .logo span {
            font-weight: 400;
        }

        nav {
            display: flex;
            gap: 35px;
        }

        nav a {
            font-size: 13px;
            color: #777;
        }

        nav a:hover {
            color: #111;
        }

        .back-link {
            font-size: 12px;

            padding: 10px 17px;

            border: 1px solid #111;

            border-radius: 25px;
        }

        .container {
            width: 100%;
            max-width: 850px;

            margin: auto;

            padding: 60px 7% 90px;
        }

        .back {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            font-size: 12px;

            color: #777;

            margin-bottom: 35px;
        }

        .eyebrow {
            font-size: 10px;

            letter-spacing: 2px;

            color: #999;

            font-weight: 600;
        }

        h1 {
            margin-top: 12px;

            font-size: clamp(42px, 5vw, 62px);

            letter-spacing: -3px;
        }

        .subtitle {
            margin-top: 12px;

            color: #777;

            font-size: 14px;
        }

        .form-card {
            margin-top: 40px;

            background: white;

            border: 1px solid #e8e8e4;

            border-radius: 22px;

            padding: 35px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;

            font-size: 10px;

            font-weight: 600;

            letter-spacing: 1px;

            color: #777;

            margin-bottom: 9px;
        }

        input {
            width: 100%;

            padding: 14px 16px;

            border: 1px solid #deded9;

            border-radius: 12px;

            background: #fafaf8;

            font-family: inherit;

            font-size: 13px;

            outline: none;

            transition: .3s;
        }

        input:focus {
            border-color: #111;

            background: white;
        }

        .actions {
            display: flex;

            gap: 12px;

            margin-top: 30px;
        }

        .save-btn,
        .cancel-btn {
            padding: 13px 20px;

            border-radius: 25px;

            font-family: inherit;

            font-size: 11px;

            cursor: pointer;

            text-decoration: none;
        }

        .save-btn {
            border: none;

            background: #111;

            color: white;
        }

        .cancel-btn {
            border: 1px solid #ddd;

            background: white;

            color: #111;
        }

        .save-btn:hover {
            opacity: .85;
        }

        .cancel-btn:hover {
            border-color: #111;
        }

        @media (max-width: 650px) {

            nav {
                display: none;
            }

            .container {
                padding: 40px 5% 60px;
            }

            .form-card {
                padding: 25px;
            }

            .actions {
                flex-direction: column;
            }

            .save-btn,
            .cancel-btn {
                width: 100%;

                text-align: center;
            }

            .back-link {
                display: none;
            }
        }

    </style>

</head>

<body>


<header class="navbar">

    <div class="logo">
        <span>Event</span>Flow
    </div>

    <nav>

        <a href="../index.php">Home</a>

        <a href="events.php">Events</a>

        <a href="live.php">Live</a>

    </nav>

    <a href="events.php" class="back-link">
        Explore Events
    </a>

</header>


<main class="container">


    <a href="profile.php" class="back">

        <i class="bi bi-arrow-left"></i>

        Back to Profile

    </a>


    <span class="eyebrow">
        ACCOUNT SETTINGS
    </span>


    <h1>
        Edit Profile
    </h1>


    <p class="subtitle">
        Update your personal information.
    </p>


    <form class="form-card" method="POST">


        <div class="form-group">

            <label>
                FULL NAME
            </label>

            <input
                type="text"
                name="name"
                value="<?php echo $name; ?>"
                required>

        </div>


        <div class="form-group">

            <label>
                EMAIL ADDRESS
            </label>

            <input
                type="email"
                name="email"
                value="<?php echo $email; ?>"
                required>

        </div>


        <div class="form-group">

            <label>
                PHONE NUMBER
            </label>

            <input
                type="text"
                name="phone"
                value="<?php echo $phone; ?>"
                required>

        </div>


        <div class="form-group">

            <label>
                LOCATION
            </label>

            <input
                type="text"
                name="location"
                value="<?php echo $location; ?>"
                required>

        </div>


        <div class="actions">

            <button type="submit" class="save-btn">
                Save Changes
                <i class="bi bi-check2"></i>
            </button>

            <a href="profile.php" class="cancel-btn">
                Cancel
            </a>

        </div>


    </form>

</main>


</body>

</html>