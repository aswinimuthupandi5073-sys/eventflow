<?php

require_once "../config/auth.php";
require_once "../config/db.php";

if ($_SESSION["user_role"] !== "admin") {
    header("Location: ../index.php");
    exit;
}

$userCount = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()["total"];
$bookingCount = $conn->query("SELECT COUNT(*) AS total FROM bookings")->fetch_assoc()["total"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | EventFlow</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            color: #111;
        }

        .admin-header {
            height: 72px;
            background: #111;
            color: white;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-size: 21px;
            font-weight: 700;
        }

        .brand span {
            color: #999;
        }

        .logout {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
            padding: 55px 30px;
        }

        .welcome {
            margin-bottom: 35px;
        }

        .welcome small {
            color: #777;
            font-size: 13px;
        }

        .welcome h1 {
            margin: 8px 0 0;
            font-size: 34px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 28px;
            border: 1px solid #eee;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #111;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .stat-card h2 {
            margin: 22px 0 5px;
            font-size: 34px;
        }

        .stat-card p {
            margin: 0;
            color: #777;
        }

        .actions {
            margin-top: 35px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .action-card {
            background: white;
            border: 1px solid #eee;
            border-radius: 18px;
            padding: 25px;
            text-decoration: none;
            color: #111;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: 0.25s ease;
        }

        .action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .action-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .action-icon {
            font-size: 22px;
        }

        .action-title {
            font-weight: 700;
        }

        .action-subtitle {
            color: #777;
            font-size: 13px;
            margin-top: 4px;
        }

        @media (max-width: 700px) {

            .stats,
            .actions {
                grid-template-columns: 1fr;
            }

            .dashboard {
                padding: 40px 20px;
            }

        }

    </style>

</head>

<body>

<header class="admin-header">

    <div class="brand">
        Event<span>Flow</span> Admin
    </div>

    <a href="../logout.php" class="logout">
        Logout
        <i class="bi bi-box-arrow-right"></i>
    </a>

</header>

<main class="dashboard">

    <div class="welcome">

        <small>ADMIN PANEL</small>

        <h1>Dashboard</h1>

    </div>

    <section class="stats">

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-people"></i>
            </div>

            <h2><?php echo $userCount; ?></h2>

            <p>Total Users</p>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-ticket-perforated"></i>
            </div>

            <h2><?php echo $bookingCount; ?></h2>

            <p>Total Bookings</p>

        </div>

    </section>

    <section class="actions">

        <a href="events.php" class="action-card">

            <div class="action-left">

                <div class="action-icon">
                    <i class="bi bi-calendar-event"></i>
                </div>

                <div>
                    <div class="action-title">
                        Manage Events
                    </div>

                    <div class="action-subtitle">
                        View and manage event listings
                    </div>
                </div>

            </div>

            <i class="bi bi-arrow-right"></i>

        </a>

        <a href="../index.php" class="action-card">

            <div class="action-left">

                <div class="action-icon">
                    <i class="bi bi-globe2"></i>
                </div>

                <div>
                    <div class="action-title">
                        View Website
                    </div>

                    <div class="action-subtitle">
                        Open the EventFlow user website
                    </div>

                </div>

            </div>

            <i class="bi bi-arrow-up-right"></i>

        </a>

    </section>

</main>

</body>

</html>