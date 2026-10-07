<?php
require_once "../config/auth.php";
$eventId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$events = [

    1 => [
        "category" => "TECHNOLOGY",
        "title" => "Future Tech Summit",
        "description" => "Explore ideas, innovation and the future of technology.",
        "date" => "18 October 2026",
        "time" => "10:00 AM",
        "location" => "Chennai",
        "seats" => 124,
        "price" => 799,
        "image" => "event-tech.jpg"
    ],

    2 => [
        "category" => "MUSIC",
        "title" => "Sound & Soul",
        "description" => "An immersive evening of music, rhythm and unforgettable moments.",
        "date" => "25 October 2026",
        "time" => "07:30 PM",
        "location" => "Coimbatore",
        "seats" => 86,
        "price" => 599,
        "image" => "event-music.jpg"
    ],

    3 => [
        "category" => "BUSINESS",
        "title" => "Business Connect",
        "description" => "Connect with professionals, ideas and opportunities.",
        "date" => "02 November 2026",
        "time" => "06:00 PM",
        "location" => "Bengaluru",
        "seats" => 72,
        "price" => 999,
        "image" => "event-business.jpg"
    ],

    4 => [
        "category" => "WORKSHOP",
        "title" => "Creative Workshop",
        "description" => "Learn, create and explore new creative possibilities.",
        "date" => "08 November 2026",
        "time" => "11:00 AM",
        "location" => "Madurai",
        "seats" => 40,
        "price" => 399,
        "image" => "hero-event.jpg"
    ]

];

if (!isset($events[$eventId])) {
    $eventId = 1;
}

$event = $events[$eventId];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $event["title"]; ?> | EventFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/event-details.css">

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

    <a href="events.php" class="sign-btn">
        Explore Events
    </a>

</header>


<main class="event-details">


    <a href="events.php" class="back-link">

        <i class="bi bi-arrow-left"></i>

        Back to Events

    </a>


    <section class="event-details-layout">


        <div class="event-image">

            <img src="../assets/images/<?php echo $event["image"]; ?>"
                 alt="<?php echo $event["title"]; ?>">

            <div class="image-badge">

                <i class="bi bi-calendar-event"></i>

                <?php echo $event["date"]; ?>

            </div>

        </div>


        <div class="event-content">

            <span class="category">
                <?php echo $event["category"]; ?>
            </span>


            <h1>
                <?php echo $event["title"]; ?>
            </h1>


            <p class="description">
                <?php echo $event["description"]; ?>
            </p>


            <div class="info-grid">


                <div class="info-item">

                    <i class="bi bi-calendar-event"></i>

                    <div>
                        <span>Date</span>
                        <strong><?php echo $event["date"]; ?></strong>
                    </div>

                </div>


                <div class="info-item">

                    <i class="bi bi-clock"></i>

                    <div>
                        <span>Time</span>
                        <strong><?php echo $event["time"]; ?></strong>
                    </div>

                </div>


                <div class="info-item">

                    <i class="bi bi-geo-alt"></i>

                    <div>
                        <span>Location</span>
                        <strong><?php echo $event["location"]; ?></strong>
                    </div>

                </div>


                <div class="info-item">

                    <i class="bi bi-people"></i>

                    <div>
                        <span>Available Seats</span>
                        <strong><?php echo $event["seats"]; ?> Seats</strong>
                    </div>

                </div>


            </div>


            <div class="booking-box">

                <div>

                    <span>Entry Price</span>

                    <strong>
                        ₹<?php echo number_format($event["price"]); ?>
                    </strong>

                </div>


                <a href="booking.php?id=<?php echo $eventId; ?>"
                   class="book-btn">

                    Book Ticket

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>


        </div>

    </section>

</main>


</body>

</html>