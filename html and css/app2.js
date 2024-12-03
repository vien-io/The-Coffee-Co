document.addEventListener("DOMContentLoaded", ()=>{
    const sections = document.querySelectorAll("[content]");
    const header = document.querySelector("header");
    const nonCoff = document.querySelector("[dark]");

    const observerOptions = {
        threshold: 0.1,
    };

    const nonCoffObserver = new IntersectionObserver((entries)=>{
        entries.forEach(entry=> {
            if (entry.isIntersecting) {
                document.body.classList.add("dark");
                console.log("dark here");
            } else {
                document.body.classList.remove("dark");
            }
        });
    }, {
        threshold: 0,
        rootMargin: "0px 0px -700px 0px"
    });

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                header.classList.add("visible");
                console.log("added visible")
            } else {
                header.classList.remove("visible");
            }
        });
    }, observerOptions);

    sections.forEach(section => observer.observe(section));
    nonCoffObserver.observe(nonCoff);
});





// for wrapper
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const btnLogged = document.querySelector('.btnLogged'); // logged-in button
const iconClose = document.querySelector('.icon-close');
console.log(wrapper, loginLink, registerLink, btnPopup, iconClose);

registerLink.addEventListener('click', ()=>{
    wrapper.classList.add('active');
})

loginLink.addEventListener('click', ()=>{
    wrapper.classList.remove('active');
})

btnPopup.addEventListener('click', ()=>{
    wrapper.classList.add('active-popup');
})
btnLogged.addEventListener('click', ()=>{
    wrapper.classList.add('active-popup');
})

iconClose.addEventListener('click', ()=>{
    wrapper.classList.remove('active-popup');
})


