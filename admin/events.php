<?php

require_once "../config/auth.php";
require_once "../config/db.php";

if ($_SESSION["user_role"] !== "admin") {
    header("Location: ../index.php");
    exit;
}

$events = [
    [
        "title" => "Future Tech Summit",
        "category" => "Technology",
        "date" => "18 October 2026",
        "time" => "10:00 AM",
        "location" => "Chennai",
        "status" => "Active"
    ],
    [
        "title" => "Sound & Soul",
        "category" => "Music",
        "date" => "25 October 2026",
        "time" => "07:30 PM",
        "location" => "Coimbatore",
        "status" => "Active"
    ],
    [
        "title" => "Business Connect",
        "category" => "Business",
        "date" => "02 November 2026",
        "time" => "06:00 PM",
        "location" => "Bengaluru",
        "status" => "Active"
    ],
    [
        "title" => "Creative Workshop",
        "category" => "Workshop",
        "date" => "08 November 2026",
        "time" => "11:00 AM",
        "location" => "Madurai",
        "status" => "Upcoming"
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Events | EventFlow</title>

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

        .header {
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

        .header a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 50px 30px;
        }

        .page-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .page-label {
            color: #777;
            font-size: 12px;
            letter-spacing: 1.5px;
            font-weight: 700;
        }

        .page-top h1 {
            margin: 8px 0 0;
            font-size: 34px;
        }

        .back-btn {
            text-decoration: none;
            color: #111;
            background: white;
            border: 1px solid #e5e5e5;
            padding: 12px 17px;
            border-radius: 9px;
        }

        .event-list {
            display: grid;
            gap: 16px;
        }

        .event-card {
            background: white;
            border: 1px solid #e9e9e9;
            border-radius: 16px;
            padding: 23px;
            display: grid;
            grid-template-columns: 2.2fr 1fr 1fr 1fr auto;
            gap: 22px;
            align-items: center;
            box-shadow: 0 7px 25px rgba(0,0,0,0.04);
        }

        .event-main {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .event-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #111;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .event-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .category {
            color: #777;
            font-size: 13px;
        }

        .info-label {
            display: block;
            color: #999;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            background: #edf8f0;
            color: #218343;
            font-size: 12px;
            font-weight: 700;
        }

        .upcoming {
            background: #f2f2f2;
            color: #555;
        }

        @media (max-width: 850px) {

            .event-card {
                grid-template-columns: 1fr 1fr;
            }

            .event-main {
                grid-column: 1 / -1;
            }

        }

        @media (max-width: 550px) {

            .container {
                padding: 35px 18px;
            }

            .page-top {
                align-items: flex-start;
                gap: 18px;
                flex-direction: column;
            }

            .event-card {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

<header class="header">

    <div class="brand">
        Event<span>Flow</span> Admin
    </div>

    <a href="../logout.php">
        Logout
        <i class="bi bi-box-arrow-right"></i>
    </a>

</header>

<main class="container">

    <div class="page-top">

        <div>

            <div class="page-label">
                ADMIN PANEL
            </div>

            <h1>Manage Events</h1>

        </div>

        <a href="dashboard.php" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Dashboard
        </a>

    </div>

    <div class="event-list">

        <?php foreach ($events as $event): ?>

            <div class="event-card">

                <div class="event-main">

                    <div class="event-icon">
                        <i class="bi bi-calendar-event"></i>
                    </div>

                    <div>

                        <div class="event-title">
                            <?php echo $event["title"]; ?>
                        </div>

                        <div class="category">
                            <?php echo $event["category"]; ?>
                        </div>

                    </div>

                </div>

                <div>
                    <span class="info-label">Date</span>
                    <span class="info-value">
                        <?php echo $event["date"]; ?>
                    </span>
                </div>

                <div>
                    <span class="info-label">Time</span>
                    <span class="info-value">
                        <?php echo $event["time"]; ?>
                    </span>
                </div>

                <div>
                    <span class="info-label">Location</span>
                    <span class="info-value">
                        <?php echo $event["location"]; ?>
                    </span>
                </div>

                <div>

                    <span class="status <?php echo $event["status"] === "Upcoming" ? "upcoming" : ""; ?>">
                        <?php echo $event["status"]; ?>
                    </span>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</main>

</body>

</html>