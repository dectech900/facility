const navSlide = () => {
    const hamburger = document.querySelector('.hamburger')
    const navLinks = document.querySelector('.nav-links')

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active')
        hamburger.classList.toggle('toggle')
    })
}

navSlide();


function studentLogin() {
    location.href = "StudentLogin/studentlogin.php";
}

function memberLogin() {
    location.href = "MemberLogin/memberlogin.html";
}

function publicLogin() {
    location.href = "SelectFacility/selectfacility.php";
}
