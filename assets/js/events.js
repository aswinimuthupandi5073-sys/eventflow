document.addEventListener("DOMContentLoaded", function () {

    const filters = document.querySelectorAll(".filter");
    const cards = document.querySelectorAll(".explore-card");
    const search = document.getElementById("eventSearch");


    /* CATEGORY FILTER */

    filters.forEach(function (filter) {

        filter.addEventListener("click", function () {

            filters.forEach(function (item) {
                item.classList.remove("active");
            });

            filter.classList.add("active");

            const category = filter.dataset.category;

            cards.forEach(function (card) {

                if (
                    category === "all" ||
                    card.dataset.category === category
                ) {

                    card.style.display = "block";

                } else {

                    card.style.display = "none";

                }

            });

        });

    });


    /* SEARCH */

    search.addEventListener("input", function () {

        const keyword = search.value.toLowerCase();

        cards.forEach(function (card) {

            const title = card
                .querySelector("h2")
                .textContent
                .toLowerCase();

            if (title.includes(keyword)) {

                card.style.display = "block";

            } else {

                card.style.display = "none";

            }

        });

    });


    /* SAVE BUTTON */

    document.querySelectorAll(".save-btn").forEach(function (button) {

        button.addEventListener("click", function () {

            const icon = button.querySelector("i");

            icon.classList.toggle("bi-heart");
            icon.classList.toggle("bi-heart-fill");

        });

    });

});