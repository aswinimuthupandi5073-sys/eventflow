<?php
require_once "../config/auth.php";
require_once "../config/db.php";
$eventId = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

$events = [

    1 => [
        "category" => "TECHNOLOGY",
        "title" => "Future Tech Summit",
        "date" => "18 October 2026",
        "time" => "10:00 AM",
        "location" => "Chennai",
        "price" => 799,
        "image" => "event-tech.jpg"
    ],

    2 => [
        "category" => "MUSIC",
        "title" => "Sound & Soul",
        "date" => "25 October 2026",
        "time" => "07:30 PM",
        "location" => "Coimbatore",
        "price" => 599,
        "image" => "event-music.jpg"
    ],

    3 => [
        "category" => "BUSINESS",
        "title" => "Business Connect",
        "date" => "02 November 2026",
        "time" => "06:00 PM",
        "location" => "Bengaluru",
        "price" => 999,
        "image" => "event-business.jpg"
    ],

    4 => [
        "category" => "WORKSHOP",
        "title" => "Creative Workshop",
        "date" => "08 November 2026",
        "time" => "11:00 AM",
        "location" => "Madurai",
        "price" => 399,
        "image" => "hero-event.jpg"
    ]

];

if (!isset($events[$eventId])) {
    $eventId = 1;
}

if ($quantity < 1) {
    $quantity = 1;
}

$event = $events[$eventId];

$total = $quantity * $event["price"];

$bookingId = "EVT" . date("YmdHis") . rand(100, 999);

$userId = $_SESSION["user_id"];
$status = "Confirmed";

$stmt = $conn->prepare("
    INSERT INTO bookings
    (
        booking_code,
        user_id,
        event_id,
        event_title,
        event_date,
        event_time,
        location,
        tickets,
        price,
        total,
        status
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "siissssidds",
    $bookingId,
    $userId,
    $eventId,
    $event["title"],
    $event["date"],
    $event["time"],
    $event["location"],
    $quantity,
    $event["price"],
    $total,
    $status
);

if (!$stmt->execute()) {
    die("Booking failed: " . $stmt->error);
}

$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Confirmed | EventFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/confirmation.css">
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
        <i class="bi bi-arrow-left"></i>
        Explore Events
    </a>

</header>


<main class="confirmation-container">

    <div class="confirmation-card">

        <div class="success-icon">
            <i class="bi bi-check2"></i>
        </div>

        <span class="eyebrow">BOOKING CONFIRMED</span>

        <h1>Your spot is secured.</h1>

        <p class="message">
           You're all set for the <?php echo $event["title"]; ?>.
        </p>


        <div class="event-preview">

          <img src="../assets/images/<?php echo $event["image"]; ?>"
     alt="<?php echo $event["title"]; ?>">

            <div class="event-details">

                <span><?php echo $event["category"]; ?></span>

<h2><?php echo $event["title"]; ?></h2>

<div>
    <i class="bi bi-calendar-event"></i>
    <?php echo $event["date"]; ?>
</div>

<div>
    <i class="bi bi-clock"></i>
    <?php echo $event["time"]; ?>
</div>

<div>
    <i class="bi bi-geo-alt"></i>
    <?php echo $event["location"]; ?>
</div>

            </div>

        </div>


        <div class="booking-info">

            <div>
                <span>Booking ID</span>
                <strong><?php echo $bookingId; ?></strong>
            </div>

            <div>
                <span>Tickets</span>
                <strong><?php echo $quantity; ?></strong>
            </div>

            <div>
                <span>Total Paid</span>
                <strong>₹<?php echo number_format($total); ?></strong>
            </div>

        </div>


        <div class="actions">

            <a href="events.php" class="primary-btn">
                Explore More Events
                <i class="bi bi-arrow-right"></i>
            </a>

            <a href="../index.php" class="secondary-btn">
                Back to Home
            </a>

        </div>

    </div>

</main>

</body>
</html>