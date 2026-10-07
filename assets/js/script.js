document.addEventListener("DOMContentLoaded", function () {

    /* Event cards */

    const cards = document.querySelectorAll(".event-card");

    cards.forEach(function (card, index) {

        setTimeout(function () {
            card.classList.add("show");
        }, index * 150);

    });


    /* Heart buttons */

    const hearts = document.querySelectorAll(".heart-btn");

    hearts.forEach(function (button) {

        button.addEventListener("click", function () {

            const icon = button.querySelector("i");

            if (icon.classList.contains("bi-heart")) {

                icon.classList.remove("bi-heart");
                icon.classList.add("bi-heart-fill");

            } else {

                icon.classList.remove("bi-heart-fill");
                icon.classList.add("bi-heart");

            }

        });

    });

});