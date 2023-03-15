function toSelect() {
    window.location.href = "../GuestLogin/guestLogin.html";
}
var backButton = document.querySelector(".button");

backButton.addEventListener("click", function() {
   window.history.back();
});
