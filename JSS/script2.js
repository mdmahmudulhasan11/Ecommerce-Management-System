//slider
$('.hero-slider').slick({
    autoplay: true,
    infinite: false,
    speed: 300,
    nextArrow: $('.next'),
    prevArrow: $('.prev'),
});

// Initialize Slick Slider for Testimonials
$('.testimonial-slider').slick({
    autoplay: true,
    infinite: false,
    speed: 300,
    nextArrow: $('.next1'), 
    prevArrow: $('.prev1')
});






const header = document.querySelector('header');

function fixedNavbar() {
    header.classList.toggle('scrolled', window.pageYOffset > 0);
}

fixedNavbar(); // Initial check for the page load
window.addEventListener('scroll', fixedNavbar);

// Toggle the menu button
let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click', function() {
    let nav = document.querySelector('.navbar');
   nav.classList.toggle('active');
   
   
})
// Toggle the user box

userBtn.addEventListener('click', function() {
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
  
   
})

// Select the close button
const closeBtn = document.querySelector('#close-form');

// Add a click event listener to the close button
closeBtn.addEventListener('click', () => {
    // Hide the update-container when the close button is clicked
    document.querySelector('.update-container').style.display = 'none';
});
