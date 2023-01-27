function toSel() {
    window.location.href = "../SelectFacility/selectfacility.html";
}
var backButton = document.querySelector(".button");

backButton.addEventListener("click", function() {
   window.history.back();
});