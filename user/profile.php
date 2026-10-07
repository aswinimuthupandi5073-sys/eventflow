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

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile | EventFlow</title>

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

        /* NAVBAR */

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

        /* CONTAINER */

        .profile-container {
            width: 100%;
            max-width: 1100px;

            margin: auto;

            padding: 60px 7% 90px;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: 2px;
            color: #999;
            font-weight: 600;
        }

        h1 {
            margin-top: 12px;

            font-size: clamp(42px, 5vw, 65px);

            letter-spacing: -3px;
        }

        .subtitle {
            margin-top: 12px;

            color: #777;

            font-size: 14px;
        }

        /* PROFILE */

        .profile-layout {
            margin-top: 45px;

            display: grid;

            grid-template-columns: 280px 1fr;

            gap: 25px;
        }

        .profile-card,
        .details-card {
            background: white;

            border: 1px solid #e8e8e4;

            border-radius: 22px;

            padding: 30px;
        }

        /* LEFT */

        .profile-card {
            text-align: center;
        }

        .avatar {
            width: 100px;
            height: 100px;

            margin: auto;

            border-radius: 50%;

            background: #111;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 34px;
            font-weight: 700;
        }

        .profile-card h2 {
            margin-top: 18px;

            font-size: 22px;

            letter-spacing: -1px;
        }

        .profile-card p {
            margin-top: 7px;

            color: #888;

            font-size: 12px;
        }

        .member {
            display: inline-block;

            margin-top: 18px;

            padding: 7px 12px;

            background: #f1f1ee;

            border-radius: 20px;

            font-size: 9px;

            font-weight: 600;

            letter-spacing: 1px;
        }

        /* DETAILS */

        .details-card h3 {
            font-size: 18px;

            margin-bottom: 25px;
        }

        .detail-row {
            padding: 18px 0;

            border-bottom: 1px solid #eeeeeb;

            display: flex;

            align-items: center;

            gap: 15px;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-icon {
            width: 42px;
            height: 42px;

            background: #f5f5f2;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 16px;
        }

        .detail-row span {
            display: block;

            font-size: 9px;

            color: #999;

            letter-spacing: 1px;

            margin-bottom: 5px;
        }

        .detail-row strong {
            font-size: 13px;
        }

        .edit-btn {
            margin-top: 25px;

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 12px 18px;

            background: #111;

            color: white;

            border-radius: 25px;

            font-size: 11px;
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {

            nav {
                display: none;
            }

            .profile-container {
                padding: 40px 5% 60px;
            }

            .profile-layout {
                grid-template-columns: 1fr;
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


<main class="profile-container">

    <span class="eyebrow">
        ACCOUNT
    </span>

    <h1>
        My Profile
    </h1>

    <p class="subtitle">
        Manage your EventFlow account details.
    </p>


    <div class="profile-layout">


        <!-- PROFILE CARD -->

        <section class="profile-card">

            <div class="avatar">
                A
            </div>

            <h2>
                <?php echo $name; ?>
            </h2>

            <p>
                <?php echo $email; ?>
            </p>

            <span class="member">
                EVENT MEMBER
            </span>

        </section>


        <!-- DETAILS CARD -->

        <section class="details-card">

            <h3>
                Personal Information
            </h3>


            <div class="detail-row">

                <div class="detail-icon">
                    <i class="bi bi-person"></i>
                </div>

                <div>
                    <span>Name</span>
                    <strong><?php echo $name; ?></strong>
                </div>

            </div>


            <div class="detail-row">

                <div class="detail-icon">
                    <i class="bi bi-envelope"></i>
                </div>

                <div>
                    <span>Email Address</span>
                    <strong><?php echo $email; ?></strong>
                </div>

            </div>


            <div class="detail-row">

                <div class="detail-icon">
                    <i class="bi bi-phone"></i>
                </div>

                <div>
                    <span>Phone</span>
                    <strong><?php echo $phone; ?></strong>
                </div>

            </div>


            <div class="detail-row">

                <div class="detail-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>

                <div>
                    <span>Location</span>
                    <strong><?php echo $location; ?></strong>
                </div>

            </div>


            <a href="edit-profile.php" class="edit-btn">

                Edit Profile

                <i class="bi bi-arrow-right"></i>

            </a>

        </section>


    </div>

</main>

</body>

</html>