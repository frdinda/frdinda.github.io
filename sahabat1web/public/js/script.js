// window.addEventListener('scroll', function () {
//     header = document.querySelector('header');
//     header.classList.toggle('scrolling-active');
// })
function changeBg() {
    var navbar = document.getElementById('navbar');
    // var navbar_a = document.getElementById('navbar-a');
    var scrollValue = window.scrollY;
    var windowWidth = window.innerWidth;
    console.log(scrollValue);
    if (scrollValue < 211) {
        navbar.classList.remove('bgColor');
        // navbar_a.classList.remove('navbar-a a');
        document.getElementById('navbar').style.transitionDuration = '1s';
    } else {
        navbar.classList.add('bgColor');
        // navbar.classList.remove('header .navbar a');
    }
    
}

window.addEventListener('scroll', changeBg);

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }