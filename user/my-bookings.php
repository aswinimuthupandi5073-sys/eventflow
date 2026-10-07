<?php

require_once "../config/auth.php";
require_once "../config/db.php";

$userId = $_SESSION["user_id"];

$stmt = $conn->prepare("
    SELECT *
    FROM bookings
    WHERE user_id = ?
    ORDER BY created_at DESC
");

$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();

$bookings = [];

while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Bookings | EventFlow</title>

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
            border: 1px solid #111;
            padding: 10px 17px;
            border-radius: 25px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
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

        .bookings {
            margin-top: 45px;
            display: grid;
            gap: 20px;
        }

        .booking-card {
            background: white;
            border: 1px solid #e8e8e4;
            border-radius: 22px;
            padding: 18px;

            display: grid;
            grid-template-columns: 180px 1fr auto;
            gap: 25px;
            align-items: center;

            transition: .3s;
        }

        .booking-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0,0,0,.06);
        }

        .booking-image {
            width: 180px;
            height: 140px;
            border-radius: 16px;
            overflow: hidden;
        }

        .booking-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category {
            font-size: 9px;
            letter-spacing: 2px;
            color: #999;
        }

        .booking-content h2 {
            margin-top: 8px;
            font-size: 24px;
            letter-spacing: -1px;
        }

        .event-info {
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
        }

        .event-info span {
            font-size: 11px;
            color: #777;
        }

        .event-info i {
            margin-right: 5px;
        }

        .status {
            display: inline-block;
            margin-top: 15px;
            padding: 6px 10px;
            border-radius: 20px;
            background: #f0f0ed;
            font-size: 9px;
            font-weight: 600;
        }

        .booking-side {
            text-align: right;
        }

        .booking-side small {
            display: block;
            font-size: 9px;
            color: #999;
            margin-bottom: 5px;
        }

        .booking-side strong {
            display: block;
            font-size: 20px;
        }

        .booking-id {
            margin-top: 8px;
            font-size: 9px;
            color: #999;
        }

        .view-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            margin-top: 15px;

            padding: 10px 15px;

            background: #111;
            color: white;

            border-radius: 25px;

            font-size: 10px;
        }

        @media (max-width: 800px) {

            nav {
                display: none;
            }

            .booking-card {
                grid-template-columns: 130px 1fr;
            }

            .booking-image {
                width: 130px;
                height: 120px;
            }

            .booking-side {
                grid-column: 1 / -1;
                text-align: left;
            }
        }

        @media (max-width: 550px) {

            .navbar {
                padding: 0 5%;
            }

            .back-link {
                display: none;
            }

            .container {
                padding: 40px 5% 60px;
            }

            .booking-card {
                grid-template-columns: 1fr;
            }

            .booking-image {
                width: 100%;
                height: 220px;
            }

            .booking-side {
                grid-column: auto;
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

    <span class="eyebrow">YOUR EVENTS</span>

    <h1>My Bookings</h1>

    <p class="subtitle">
        Keep track of your upcoming experiences.
    </p>


    <div class="bookings">

        <?php foreach ($bookings as $booking): ?>

            <article class="booking-card">

                <div class="booking-image">

                    <img src="../assets/images/<?php echo $booking["image"]; ?>"
                         alt="<?php echo $booking["title"]; ?>">

                </div>


                <div class="booking-content">

                    <span class="category">
                        <?php echo $booking["category"]; ?>
                    </span>

                    <h2>
                        <?php echo $booking["event_title"]; ?>
                    </h2>

                    <div class="event-info">

                        <span>
                            <i class="bi bi-calendar-event"></i>
                            <?php echo $booking["event_date"]; ?>
                        </span>

                        <span>
                            <i class="bi bi-clock"></i>
                            <?php echo $booking["event_time"]; ?>
                        </span>

                        <span>
                            <i class="bi bi-geo-alt"></i>
                            <?php echo $booking["location"]; ?>
                        </span>

                    </div>

                    <span class="status">
                        <?php echo $booking["status"]; ?>
                    </span>

                </div>


                <div class="booking-side">

                    <small>
                        <?php echo $booking["tickets"]; ?> Tickets
                    </small>

                    <strong>
                        ₹<?php echo number_format($booking["total"]); ?>
                    </strong>

                    <div class="booking-id">
                        <?php echo $booking["booking_code"]; ?>
                    </div>

                    <a href="event-details.php" class="view-btn">
                        View Event
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</main>

</body>

</html>