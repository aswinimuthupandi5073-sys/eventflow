<?php
require_once "../config/auth.php";
$eventId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

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

$event = $events[$eventId];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Ticket | EventFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/booking.css">

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

        Back to Events

    </a>

</header>


<main class="booking-container">


    <div class="page-heading">

        <span>SECURE YOUR SPOT</span>

        <h1>Book Your Ticket</h1>

        <p>Complete your booking and get ready for the experience.</p>

    </div>


    <div class="booking-layout">


        <section class="event-summary">


            <div class="event-image">

                <img src="../assets/images/<?php echo $event["image"]; ?>"
                     alt="<?php echo $event["title"]; ?>">

            </div>


            <div class="event-content">

                <span class="category">
                    <?php echo $event["category"]; ?>
                </span>


                <h2>
                    <?php echo $event["title"]; ?>
                </h2>


                <div class="event-info">

                    <div>

                        <i class="bi bi-calendar-event"></i>

                        <span>
                            <?php echo $event["date"]; ?>
                        </span>

                    </div>


                    <div>

                        <i class="bi bi-clock"></i>

                        <span>
                            <?php echo $event["time"]; ?>
                        </span>

                    </div>


                    <div>

                        <i class="bi bi-geo-alt"></i>

                        <span>
                            <?php echo $event["location"]; ?>
                        </span>

                    </div>

                </div>

            </div>

        </section>


        <section class="booking-card">


            <div class="card-header">

                <span>01</span>

                <div>

                    <h3>Ticket Details</h3>

                    <p>Select the number of tickets.</p>

                </div>

            </div>


            <div class="ticket-row">


                <div>

                    <strong>Standard Ticket</strong>

                    <small>Entry to the event</small>

                </div>


                <div class="price">

                    ₹<?php echo number_format($event["price"]); ?>

                </div>


                <div class="quantity">

                    <button type="button" id="minus">

                        <i class="bi bi-dash"></i>

                    </button>


                    <span id="quantity">1</span>


                    <button type="button" id="plus">

                        <i class="bi bi-plus"></i>

                    </button>

                </div>

            </div>


            <div class="summary">


                <div>

                    <span>Ticket Price</span>

                    <strong>
                        ₹<?php echo number_format($event["price"]); ?>
                    </strong>

                </div>


                <div>

                    <span>Quantity</span>

                    <strong id="summaryQty">1</strong>

                </div>


                <div class="total">

                    <span>Total</span>

                    <strong id="totalPrice">
                        ₹<?php echo number_format($event["price"]); ?>
                    </strong>

                </div>

            </div>


            <button class="confirm-btn"
                    type="button"
                    onclick="confirmBooking(<?php echo $eventId; ?>)">

                Confirm Booking

                <i class="bi bi-arrow-right"></i>

            </button>


            <p class="secure-note">

                <i class="bi bi-shield-check"></i>

                Secure booking experience

            </p>


        </section>

    </div>

</main>


<script>

    const ticketPrice = <?php echo $event["price"]; ?>;

</script>

<script src="../assets/js/booking.js"></script>


</body>

</html>