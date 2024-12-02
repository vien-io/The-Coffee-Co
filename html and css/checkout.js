window.onload = function() {
    displayCartSummary();
};

function displayCartSummary() {
    let cart = []; // This should be fetched from localStorage, database, or session

    // For example, if you're using a simple cart array:
    cart = [
        { title: "Classic Honey 70ml", price: 39 },
        { title: "Honey Banana 100ml", price: 64 }
    ];

    if (cart.length === 0) {
        document.getElementById("cartSummary").innerHTML = "<p>Your cart is empty.</p>";
    } else {
        let cartHTML = '';
        let total = 0;

        cart.forEach(item => {
            cartHTML += `
                <div class="cart-item">
                    <p>${item.title}</p>
                    <h2>$${item.price}.00</h2>
                </div>
            `;
            total += item.price;
        });

        document.querySelector('.cart-items').innerHTML = cartHTML;
        document.getElementById("checkoutTotal").textContent = total.toFixed(2);
    }

    // Handle the place order button click
    document.getElementById("placeOrderButton").addEventListener("click", function() {
        // Example: Redirect to a confirmation page or payment page
        alert("Order placed successfully!");
    });
}
