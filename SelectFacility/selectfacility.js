
function openBook() {
    window.location.href = "../BookingPage/booking.html";
}
var backButton = document.querySelector(".button");

backButton.addEventListener("click", function() {
   window.history.back();
});

