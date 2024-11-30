document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll("[data-animate]");
    const productSection = document.querySelector(".products-container");
    const header = document.querySelector("header");

    const observerOptions = {
        threshold: 0.1
    };
    const observerOptions2 = {
        threshold: .5
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                console.log("theres data animate here")
            } else {
                entry.target.classList.remove("visible");
            }
        });
    }, observerOptions);

    const productObserver = new IntersectionObserver((entries)=>{
        entries.forEach(entry=>{
            if (entry.isIntersecting){
                productSection.classList.add("visible");
                console.log("theres contents here")
            } else if (entry.boundingClientRect.top > 0){
                productSection.classList.remove("visible");
            }
        });
    }, observerOptions2);

    const headerObserver = new IntersectionObserver((entries)=>{
        entries.forEach(entry =>{
            if (entry.isIntersecting){
                header.classList.add("visible");
            } else {
                // header.classList.remove("visible");
            }
        });
    }, observerOptions);

    sections.forEach(section => observer.observe(section));
    productObserver.observe(productSection);
    headerObserver.observe(productSection);

    window.addEventListener("scroll", ()=> {
        if (window.scrollY <= 450){
            productSection.classList.remove("visible");
            header.classList.remove("visible");
            console.log("top page reached")
        }
    });
});




// for wrapper
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=>{
    wrapper.classList.add('active');
})

loginLink.addEventListener('click', ()=>{
    wrapper.classList.remove('active');
})

btnPopup.addEventListener('click', ()=>{
    wrapper.classList.add('active-popup');
})

iconClose.addEventListener('click', ()=>{
    wrapper.classList.remove('active-popup');
})



