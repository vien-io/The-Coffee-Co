document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll("[data-animate]");
    const productSection = document.querySelector(".products-container");
    const header = document.querySelector("header");
    const aboutUs = document.querySelector("[dark]");

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


    const aboutUsObserver = new IntersectionObserver((entries)=> {
        entries.forEach(entry=>{
                if(entry.isIntersecting){
                    document.body.classList.add("visible");
                    console.log("about us is now visible");
                } else {
                    document.body.classList.remove("visible");
                }
        });
    }, {
        threshold: 0,
        rootMargin: "0px 0px -500px 0px"
    });

    sections.forEach(section => observer.observe(section));
    productObserver.observe(productSection);
    headerObserver.observe(productSection);
    aboutUsObserver.observe(aboutUs);

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



