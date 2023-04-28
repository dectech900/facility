const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const movieSelect = document.getElementById('movie');



//Seat click event
container.addEventListener('click', e => {
  if (e.target.classList.contains('seat') &&
     !e.target.classList.contains('occupied')) {
    e.target.classList.toggle('selected');
  }
  updateSelectedCount();
});
var backButton = document.querySelector(".button");

backButton.addEventListener("click", function() {
   window.history.back();
});

// JavaScript
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

function confirmCancel() {
  history.back();
}

