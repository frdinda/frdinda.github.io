// window.addEventListener('scroll', function () {
//     header = document.querySelector('header');
//     header.classList.toggle('scrolling-active');
// })
function changeBg() {
    var navbar = document.getElementById('navbar');
    var scrollValue = window.scrollY;
    if (scrollValue < 211) {
        navbar.classList.remove('bgColor');
        document.getElementById('navbar').style.transitionDuration = '1s';
    } else {
        navbar.classList.add('bgColor');
    }
}

window.addEventListener('scroll', changeBg);