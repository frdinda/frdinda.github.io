const a_home = document.querySelector('.a-home');
const a_profile = document.querySelector('.a-profile');
const profile = document.querySelector('.profile');
const home = document.querySelector('.home');
const body = document.querySelector('body');
const navbar = document.querySelector('.navbar');
const li = document.querySelector('li');

a_home.addEventListener("click", function(){
    body.style.backgroundColor = "#f1d1d1";
    navbar.style.backgroundColor = "#7d5a5a";
    profile.style.zIndex = "-99";
    home.style.zIndex = "99";
});

a_profile.addEventListener("click", function(){
    profile.style.zIndex = "99";
    home.style.zIndex = "-99";
});