const product = [
    {
        id: 0,
        image: '../images/HC.png',
        title: 'Classic Honey 70ml<br>(Original Honey)',
        price: 39,
    },
    {
        id: 1,
        image: '../images/HC.png',
        title: 'Classic Honey 85ml<br>(Original Honey)',
        price: 49,
    },
    {
        id: 2,
        image: '../images/HC.png',
        title: 'Classic Honey 100ml<br>(Original Honey)',
        price: 59,
    },
    {
        id: 3,
        image: '../images/HB.png',
        title: 'Honey Banana 70ml',
        price: 44,  
    },    {
        id: 4,
        image: '../images/HB.png',
        title: 'Honey Banana 85ml',
        price: 54,  
    },    {
        id: 5,
        image: '../images/HB.png',
        title: 'Honey Banana 100ml',
        price: 64,  
    },
    {
        id: 6,
        image: '../images/SH.png',
        title: 'Strawberry Honey 70ml',
        price: 49,
    },    {
        id: 7,
        image: '../images/SH.png',
        title: 'Strawberry Honey 85ml',
        price: 59,
    },    {
        id: 8,
        image: '../images/SH.png',
        title: 'Strawberry Honey 100ml',
        price: 69,
    },
];
const categories = product; 

    let i=0;
    document.getElementById('root').innerHTML = categories.map((item) => {
        const { id, image, title, price } = item;
        return (
            `<div class='box'>
                <div class='img-box'>
                    <img class='images' src=${image}></img>
                </div>
                <div class='bottom'>
                    <p>${title}</p>
                    <h2>$ ${price}.00</h2>
                    <button onclick='addtocart(${id})'>Add to cart</button>
                </div>
            </div>`
        );
    }).join('');
    
    
    

var cart =[];

function addtocart(id) {
    const product = categories.find(item => item.id === id); // Find product by ID

    // Send product data to the server to save in the cart database
    fetch('http://localhost/shop/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `action=addToCart&product_id=${product.id}&quantity=1`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Only push to local cart if it was successfully added to the database
            cart.push({ ...product, quantity: 1 });
            displaycart();
        } else {
            console.error('Failed to add to cart');
        }
    })
    .catch(error => console.error('Error:', error));
}






function delElement(index) {
    const product = cart[index];

    // Remove the product from the server
    fetch('http://localhost/shop/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `action=removeFromCart&product_id=${product.id}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Remove item from local cart and update display
            cart.splice(index, 1);
            displaycart();
        } else {
            console.error('Failed to remove item from cart');
        }
    })
    .catch(error => console.error('Error:', error));
}





function displaycart() {
    let total = 0;

    // Fetch cart items from the database
    fetch('http://localhost/shop/api.php?action=getCart')
        .then(response => response.json())
        .then(data => {
            cart = data.cart;  // Update local cart data with the server response
            document.getElementById("count").innerHTML = cart.length;

            if (cart.length === 0) {
                document.getElementById('cartItem').innerHTML = "Your cart is empty";
                document.getElementById("total").innerHTML = "$ 0.00";
            } else {
                let cartHTML = cart.map((item, index) => {
                    const { image, title, price, quantity } = item;
                    total += price * quantity; // Multiply price by quantity
                    return (
                        `<div class='cart-item'>
                            <div class='row-img'>
                                <img class='rowimg' src=${image} alt="${title}">
                            </div>
                            <p style='font-size:12px;'>${title}</p>
                            <h2 style='font-size: 15px;'>$ ${(price * quantity).toFixed(2)}</h2>
                            <i class='fa-solid fa-trash' onclick='delElement(${index})'></i>
                        </div>`
                    );
                }).join('');

                document.getElementById("cartItem").innerHTML = cartHTML;
                document.getElementById("total").innerHTML = `$ ${total.toFixed(2)}`;
            }
        })
        .catch(error => console.error('Error:', error));
}









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
