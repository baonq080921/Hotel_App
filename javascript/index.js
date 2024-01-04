const login = document.getElementById('Log_in');
const signup = document.getElementById('sign_up');

//Login - Sign up page
signuppage = ()=>{
    login.style.display = 'none';
    signup.style.display = 'flex';
};

loginpage = () =>{
    signup.style.display = 'none';
    login.style.display = 'flex';
};


// Employee- user login:

const btns = document.querySelectorAll('.btns');
const authsection = document.querySelectorAll('.authsection');

var slideNav = function(manual) {
    btns.forEach((btn)=>{
        btn.classList.remove('active');
    });

    authsection.forEach((slide) =>{
        slide.classList.remove('active');
    });
    btns[manual].classList.add('active');
    authsection[manual].classList.add('active');
};

btns.forEach((btn,i) => {
    btn.addEventListener('click',() =>{
        slideNav(i);
    })
});

// Get the logo element by its class
const logo = document.querySelector('.vinpearlogo'); ; // Assuming there is only one element with the 'logo' class

// Attach a click event listener to the logo
logo.addEventListener('click', function(event) {
    // Prevent the default behavior of the anchor tag (which is to navigate)
    event.preventDefault();

    // Scroll to the top of the page
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // You can use 'auto' or 'smooth' for a smooth scroll effect
    });
});
