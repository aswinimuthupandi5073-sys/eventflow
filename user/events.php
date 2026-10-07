<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Explore Events | EventFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/events.css">

</head>


<body>


<!-- NAVBAR -->

<nav class="events-nav">

    <a href="../index.php" class="brand">
        Event<span>Flow</span>
    </a>


    <div class="events-nav-links">

        <a href="../index.php">
            Home
        </a>

        <a href="events.php" class="active">
            Events
        </a>

        <a href="#">
            Live
        </a>

    </div>


    <div class="nav-right">

        <button class="nav-search">
            <i class="bi bi-search"></i>
        </button>

        <a href="../login.php" class="sign-in">
            Sign In
        </a>

    </div>

</nav>



<!-- PAGE HEADER -->

<section class="events-header">

    <div>

        <span class="small-label">
            DISCOVER
        </span>

        <h1>
            Explore Events
        </h1>

        <p>
            Find your next experience.
        </p>

    </div>


    <div class="search-box">

        <i class="bi bi-search"></i>

        <input
            type="text"
            id="eventSearch"
            placeholder="Search events..."
        >

    </div>

</section>



<!-- FILTERS -->

<section class="filter-section">

    <button class="filter active" data-category="all">
        All
    </button>

    <button class="filter" data-category="technology">
        Technology
    </button>

    <button class="filter" data-category="music">
        Music
    </button>

    <button class="filter" data-category="business">
        Business
    </button>

    <button class="filter" data-category="workshop">
        Workshop
    </button>

</section>



<!-- EVENT CARDS -->

<section class="explore-events">


    <article class="explore-card" data-category="technology">

        <div class="explore-image">

            <img src="../assets/images/event-tech.jpg"
                 alt="Technology Event">

            <span class="card-category">
                Technology
            </span>

            <button class="save-btn">
                <i class="bi bi-heart"></i>
            </button>

        </div>


        <div class="explore-info">

            <span class="date">
                18 OCT 2026
            </span>

            <h2>
                Future Tech Summit
            </h2>

            <div class="meta">

                <span>
                    <i class="bi bi-geo-alt"></i>
                    Chennai
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    10:00 AM
                </span>

            </div>

            <a href="event-details.php?id=21" class="details">
                View Details
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </article>



    <article class="explore-card" data-category="music">

        <div class="explore-image">

            <img src="../assets/images/event-music.jpg"
                 alt="Music Event">

            <span class="card-category">
                Music
            </span>

            <button class="save-btn">
                <i class="bi bi-heart"></i>
            </button>

        </div>


        <div class="explore-info">

            <span class="date">
                25 OCT 2026
            </span>

            <h2>
                Sound & Soul
            </h2>

            <div class="meta">

                <span>
                    <i class="bi bi-geo-alt"></i>
                    Coimbatore
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    07:30 PM
                </span>

            </div>

            <a href="event-details.php?id=2" class="details">
                View Details
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </article>



    <article class="explore-card" data-category="business">

        <div class="explore-image">

            <img src="../assets/images/event-business.jpg"
                 alt="Business Event">

            <span class="card-category">
                Business
            </span>

            <button class="save-btn">
                <i class="bi bi-heart"></i>
            </button>

        </div>


        <div class="explore-info">

            <span class="date">
                02 NOV 2026
            </span>

            <h2>
                Business Connect
            </h2>

            <div class="meta">

                <span>
                    <i class="bi bi-geo-alt"></i>
                    Bengaluru
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    06:00 PM
                </span>

            </div>

            <a href="event-details.php?id=3" class="details">
                View Details
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </article>



    <article class="explore-card" data-category="workshop">

        <div class="explore-image">

            <img src="../assets/images/hero-event.jpg"
                 alt="Creative Workshop">

            <span class="card-category">
                Workshop
            </span>

            <button class="save-btn">
                <i class="bi bi-heart"></i>
            </button>

        </div>


        <div class="explore-info">

            <span class="date">
                08 NOV 2026
            </span>

            <h2>
                Creative Workshop
            </h2>

            <div class="meta">

                <span>
                    <i class="bi bi-geo-alt"></i>
                    Madurai
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    11:00 AM
                </span>

            </div>

            <a href="event-details.php?id=4" class="details">
                View Details
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </article>


</section>



<script src="../assets/js/events.js"></script>

</body>

</html>