const product = [
    {
        id: 0,
        image: '../images/HC.png',
        title: 'Classic Honey 70ml<br>(Original Honey)',
        price: 39,
    },
    {
        id: 0,
        image: '../images/HC.png',
        title: 'Classic Honey 85ml<br>(Original Honey)',
        price: 49,
    },
    {
        id: 0,
        image: '../images/HC.png',
        title: 'Classic Honey 100ml<br>(Original Honey)',
        price: 59,
    },
    {
        id: 1,
        image: '../images/HB.png',
        title: 'Honey Banana 70ml',
        price: 44,  
    },    {
        id: 1,
        image: '../images/HB.png',
        title: 'Honey Banana 85ml',
        price: 54,  
    },    {
        id: 1,
        image: '../images/HB.png',
        title: 'Honey Banana 100ml',
        price: 64,  
    },
    {
        id: 2,
        image: '../images/SH.png',
        title: 'Strawberry Honey 70ml',
        price: 49,
    },    {
        id: 2,
        image: '../images/SH.png',
        title: 'Strawberry Honey 85ml',
        price: 59,
    },    {
        id: 2,
        image: '../images/SH.png',
        title: 'Strawberry Honey 100ml',
        price: 69,
    },
];
const categories = [...new Set(product.map((item)=>
    {return item}))]
    let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var {image, title, price} = item;
    return(
        `<div class='box'>
            <div class='img-box'>
                <img class='images' src=${image}></img>
            </div>
        <div class='bottom'>
        <p>${title}</p>
        <h2>$ ${price}.00</h2>`+
        "<button onclick='addtocart("+(i++)+")'>Add to cart</button>"+
        `</div>
        </div>`
    )
}).join('')

var cart =[];

function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}
function delElement(a){
    cart.splice(a, 1);
    displaycart();
}

function displaycart(){
    let j = 0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "$ "+0+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((items)=>
        {
            var {image, title, price} = items;
            total=total+price;
            document.getElementById("total").innerHTML = "$ "+total+".00";
            return(
                `<div class='cart-item'>
                <div class='row-img'>
                    <img class='rowimg' src=${image}>
                </div>
                <p style='font-size:12px;'>${title}</p>
                <h2 style='font-size: 15px;'>$ ${price}.00</h2>`+
                "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i></div>"
            );
        }).join('');
    }

    
}



// observers
document.addEventListener("DOMContentLoaded", ()=> {
    const scrolledDown = document.querySelector("[scrolled]");
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -500px 0px"
    }
    const scrollObserver = new IntersectionObserver((entries)=> {
        entries.forEach(entry=> {
            if (entry.isIntersecting) {
                document.body.classList.add("scrolled");
                console.log("Scrolled!");
            } else {
                document.body.classList.remove("scrolled");
            }
        });
    }, observerOptions);

    scrollObserver.observe(scrolledDown);
});







// // for wrapper
// const wrapper = document.querySelector('.wrapper');
// const loginLink = document.querySelector('.login-link');
// const registerLink = document.querySelector('.register-link');
// const btnPopup = document.querySelector('.btnLogin-popup');
// const iconClose = document.querySelector('.icon-close');

// registerLink.addEventListener('click', ()=>{
//     wrapper.classList.add('active');
// })

// loginLink.addEventListener('click', ()=>{
//     wrapper.classList.remove('active');
// })

// btnPopup.addEventListener('click', ()=>{
//     wrapper.classList.add('active-popup');
// })

// iconClose.addEventListener('click', ()=>{
//     wrapper.classList.remove('active-popup');
// })
