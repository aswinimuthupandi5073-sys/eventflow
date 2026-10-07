document.addEventListener("DOMContentLoaded", function () {

    const minus = document.getElementById("minus");
    const plus = document.getElementById("plus");
    const quantity = document.getElementById("quantity");
    const summaryQty = document.getElementById("summaryQty");
    const totalPrice = document.getElementById("totalPrice");

    let count = 1;

    function updateBooking() {

        quantity.textContent = count;

        summaryQty.textContent = count;

        totalPrice.textContent =
            "₹" + (ticketPrice * count).toLocaleString("en-IN");

    }

    plus.addEventListener("click", function () {

        if (count < 5) {

            count++;

            updateBooking();

        }

    });


    minus.addEventListener("click", function () {

        if (count > 1) {

            count--;

            updateBooking();

        }

    });

});


function confirmBooking(eventId) {

    const quantity =
        document.getElementById("quantity").textContent;

    window.location.href =
        "booking-confirmation.php?id=" +
        eventId +
        "&quantity=" +
        quantity;

}