<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EventFlow | Discover Events</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="assets/css/style.css?v=4">
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

    <div class="logo">
        Event<span>Flow</span>
    </div>

    <div class="nav-links">
        <a href="index.php" class="active">Home</a>
        <a href="user/events.php">Events</a>
        <a href="user/live.php">Live</a>
        <a href="index.php#about">About</a>
    </div>

    <div class="nav-actions">

        <button class="icon-btn">
            <i class="bi bi-search"></i>
        </button>

        <?php if (isset($_SESSION["user_id"])): ?>

            <a href="user/profile.php" class="login-btn">
                Profile
            </a>

            <a href="logout.php" class="create-btn">
                Logout
                <i class="bi bi-box-arrow-right"></i>
            </a>

        <?php else: ?>

            <a href="login.php" class="login-btn">
                Sign In
            </a>

            <a href="login.php" class="create-btn">
                Create Event
                <i class="bi bi-arrow-up-right"></i>
            </a>

        <?php endif; ?>

    </div>

</nav>

<!-- HERO -->

<section class="hero">

    <div class="hero-content">

        <div class="eyebrow">
            <span></span>
            REAL-TIME EVENTS
        </div>

        <h1>
            Discover.
            <br>
            Connect.
            <br>
            <span>Experience.</span>
        </h1>

        <p>
            Find unforgettable events happening around you.
        </p>

        <div class="hero-buttons">

            <a href="user/events.php" class="primary-btn">
                Explore Events
                <i class="bi bi-arrow-right"></i>
            </a>

           <a href="user/live.php" class="live-view-btn">
    View Live Events
    <i class="bi bi-arrow-right"></i>
</a>

        </div>

    </div>


    <div class="hero-visual">

        <div class="hero-image">

            <img src="assets/images/hero-event.jpg"
                 alt="Event">

            <div class="live-badge">
                <span></span>
                LIVE NOW
            </div>

        </div>

        <div class="floating-card">

            <div class="floating-icon">
                <i class="bi bi-calendar-event"></i>
            </div>

            <div>
                <small>Next Event</small>
                <strong>Tech Summit 2026</strong>
            </div>

        </div>

    </div>

</section>


<!-- EVENTS -->

<section class="events-section">

    <div class="section-heading">

        <div>
            <span class="section-label">
                EXPLORE
            </span>

            <h2>
                Trending Events
            </h2>
        </div>

        <a href=""user/events.php class="view-link">
            View all
            <i class="bi bi-arrow-up-right"></i>
        </a>

    </div>


    <div class="event-grid">


        <!-- CARD 1 -->

        <div class="event-card">

            <div class="event-image">

                <img src="assets/images/event-tech.jpg"
                     alt="Technology Event">

                <span class="category">
                    Technology
                </span>

                <button class="heart-btn">
                    <i class="bi bi-heart"></i>
                </button>

            </div>

            <div class="event-info">

                <span class="event-date">
                    18 OCT 2026
                </span>

                <h3>
                    Future Tech Summit
                </h3>

                <div class="event-meta">

                    <span>
                        <i class="bi bi-geo-alt"></i>
                        Chennai
                    </span>

                    <span>
                        <i class="bi bi-clock"></i>
                        10:00 AM
                    </span>

                </div>

            </div>

        </div>


        <!-- CARD 2 -->

        <div class="event-card">

            <div class="event-image">

                <img src="assets/images/event-music.jpg"
                     alt="Music Event">

                <span class="category">
                    Music
                </span>

                <button class="heart-btn">
                    <i class="bi bi-heart"></i>
                </button>

            </div>

            <div class="event-info">

                <span class="event-date">
                    25 OCT 2026
                </span>

                <h3>
                    Sound & Soul
                </h3>

                <div class="event-meta">

                    <span>
                        <i class="bi bi-geo-alt"></i>
                        Coimbatore
                    </span>

                    <span>
                        <i class="bi bi-clock"></i>
                        07:30 PM
                    </span>

                </div>

            </div>

        </div>


        <!-- CARD 3 -->

        <div class="event-card">

            <div class="event-image">

                <img src="assets/images/event-business.jpg"
                     alt="Business Event">

                <span class="category">
                    Business
                </span>

                <button class="heart-btn">
                    <i class="bi bi-heart"></i>
                </button>

            </div>

            <div class="event-info">

                <span class="event-date">
                    02 NOV 2026
                </span>

                <h3>
                    Business Connect
                </h3>

                <div class="event-meta">

                    <span>
                        <i class="bi bi-geo-alt"></i>
                        Bengaluru
                    </span>

                    <span>
                        <i class="bi bi-clock"></i>
                        06:00 PM
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


<script src="assets/js/script.js"></script>
    <!-- About Section -->
    <section id="about" class="about-section">

        <div class="about-content">

            <span class="about-label">ABOUT EVENTFLOW</span>

            <h2>Discover events.<br>Experience moments.</h2>

            <p>
                EventFlow helps you discover, explore and book
                memorable events in one simple platform.
            </p>

        </div>

    </section>
</body>
</html>