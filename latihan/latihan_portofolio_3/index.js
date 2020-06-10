const btn_profile = document.querySelector('.btn.profile');
const btn_home = document.querySelector('.btn.home');
const profile = document.querySelector('.container-profile');
const home = document.querySelector('.container-home');
const filter = document.querySelector('.filter');

btn_profile.addEventListener("click", function(){
    filter.style.zIndex="0";
    filter.style.opacity=".8";
    filter.style.transition="opacity 1s";
    profile.style.transform="translate(0vw)";
    profile.style.transition="all 1.7s";
    home.style.transform="translate(150vw)";
    home.style.transitionDelay="2s";
});

btn_home.addEventListener("click", function(){
    profile.style.transform="translate(150vw)";
    profile.style.transition="all 1.7s";
    profile.style.transitionDelay=".2s";
    home.style.transform="translate(0vw)";
    home.style.transitionDelay="0s";
    filter.style.zIndex="-999";
    filter.style.opacity="0";
    filter.style.transition="opacity 2s, z-index 0s 2s";
});

