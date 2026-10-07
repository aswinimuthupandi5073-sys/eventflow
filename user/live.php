<?php
require_once "../config/auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Live Events | EventFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/live.css?v=2">

</head>

<body>

<!-- NAVBAR -->

<header class="navbar">

    <div class="logo">
        Event<span>Flow</span>
    </div>

    <nav>

        <a href="../index.php">
            Home
        </a>

        <a href="events.php">
            Events
        </a>

        <a href="live.php" class="active">
            Live
        </a>

        <a href="../index.php#about">
            About
        </a>

    </nav>

    <a href="events.php" class="explore-btn">
        Explore Events
        <i class="bi bi-arrow-up-right"></i>
    </a>

</header>


<!-- HERO -->

<section class="live-hero">

    <div class="hero-content">

        <div class="live-label">

            <span class="live-dot"></span>

            LIVE NOW

        </div>

        <h1>
            Experience events<br>
            as they happen.
        </h1>

        <p>
            Watch live sessions, connect with audiences
            and experience memorable moments in real time.
        </p>

    </div>

</section>


<!-- LIVE EVENT -->

<section class="live-section">

    <div class="section-heading">

        <div>

            <span>HAPPENING NOW</span>

            <h2>Live Event</h2>

        </div>

        <div class="live-status">

            <span class="status-dot"></span>

            Streaming Live

        </div>

    </div>


    <div class="live-card">


        <!-- IMAGE -->

        <div class="live-image">

            <img
                src="../assets/images/event-tech.jpg"
                alt="Future Tech Summit">

            <div class="live-badge">

                <span></span>

                LIVE

            </div>

            <div class="viewer-count">

                <i class="bi bi-people"></i>

                1.2K watching

            </div>

        </div>


        <!-- CONTENT -->

        <div class="live-content">

            <span class="category">
                TECHNOLOGY
            </span>

            <h3>
                Future Tech Summit
            </h3>

            <p>
                Explore innovation, artificial intelligence
                and the future of technology with industry experts.
            </p>


            <div class="event-meta">

                <div>

                    <i class="bi bi-calendar3"></i>

                    18 October 2026

                </div>

                <div>

                    <i class="bi bi-clock"></i>

                    10:00 AM

                </div>

                <div>

                    <i class="bi bi-geo-alt"></i>

                    Chennai

                </div>

            </div>


            <div class="live-timer">

                <span>
                    LIVE FOR
                </span>

                <strong id="liveTimer">
                    01:24:36
                </strong>

            </div>


            <a href="event-details.php?id=1" class="join-btn">

                Join Live Event

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    <!-- UPCOMING -->

    <div class="upcoming-heading">

        <span>COMING SOON</span>

        <h2>Upcoming Live Sessions</h2>

    </div>


    <div class="upcoming-grid">


        <!-- CARD 1 -->

        <div class="upcoming-card">

            <img
                src="../assets/images/event-music.jpg"
                alt="Sound & Soul">

            <div class="upcoming-content">

                <span>
                    MUSIC
                </span>

                <h3>
                    Sound & Soul
                </h3>

                <p>
                    25 October 2026 · 07:30 PM
                </p>

                <a href="event-details.php?id=2">

                    View Event

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


        <!-- CARD 2 -->

        <div class="upcoming-card">

            <img
                src="../assets/images/event-business.jpg"
                alt="Business Connect">

            <div class="upcoming-content">

                <span>
                    BUSINESS
                </span>

                <h3>
                    Business Connect
                </h3>

                <p>
                    02 November 2026 · 06:00 PM
                </p>

                <a href="event-details.php?id=3">

                    View Event

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


    </div>

</section>


<script>

let seconds = 1 * 60 * 60 + 24 * 60 + 36;

function updateTimer() {

    seconds++;

    let hours = Math.floor(seconds / 3600);

    let minutes = Math.floor((seconds % 3600) / 60);

    let secs = seconds % 60;

    hours = String(hours).padStart(2, "0");

    minutes = String(minutes).padStart(2, "0");

    secs = String(secs).padStart(2, "0");

    document.getElementById("liveTimer").textContent =
        hours + ":" + minutes + ":" + secs;
}

setInterval(updateTimer, 1000);

</script>

</body>

</html>