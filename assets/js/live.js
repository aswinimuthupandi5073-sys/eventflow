document.addEventListener("DOMContentLoaded", function () {

    const timer = document.getElementById("liveTimer");

    let totalSeconds = (1 * 60 * 60) + (24 * 60) + 36;

    function updateTimer() {

        const hours = Math.floor(totalSeconds / 3600);

        const minutes = Math.floor((totalSeconds % 3600) / 60);

        const seconds = totalSeconds % 60;

        timer.textContent =
            String(hours).padStart(2, "0") + ":" +
            String(minutes).padStart(2, "0") + ":" +
            String(seconds).padStart(2, "0");

        totalSeconds++;

    }

    updateTimer();

    setInterval(updateTimer, 1000);

});