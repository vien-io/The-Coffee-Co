  //fetch cart data from localStorage
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
  // display cart details on the confirmation page
  function displayOrderSummary() {
      if (cart.length > 0) {
          let orderSummary = '<h3>Your Cart</h3>';
          let total = 0;
          cart.forEach(item => {
              orderSummary += `
                  <div class="order-item">
                      <img src="${item.image}" alt="${item.title}" />
                      <p>${item.title}</p>
                      <h2>$${item.price}.00</h2>
                  </div>
              `;
              total += item.price;
          });

          orderSummary += `<h3>Total: $${total}.00</h3>`;
          document.getElementById('order-summary').innerHTML = orderSummary;
      }
  }

  displayOrderSummary();

  //  order confirmation
  function finalizeOrder() {
const cart = JSON.parse(localStorage.getItem('cart')) || [];
const total = cart.reduce((acc, item) => acc + item.price, 0);

const orderData = {
  user_id: 1, // Replace this with the actual logged-in user's ID
  cart: cart,
  total_price: total,
};

fetch('save_order.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(orderData),
})
.then((response) => response.text()) // Getting raw text from response
.then((data) => {
    console.log(data); // Log the raw response to the console
    try {
        const parsedData = JSON.parse(data); // Try to parse it as JSON
        if (parsedData.success) {
            alert('Your order has been confirmed! Thank you for your purchase.');
            localStorage.removeItem('cart'); // Clear the cart
            window.location.href = 'thankyou.html'; // Redirect to a thank-you page
        } else {
            alert('There was an issue processing your order: ' + parsedData.message);
        }
    } catch (error) {
        alert('Error: Unable to parse response as JSON: ' + error.message);
    }
})
.catch((error) => {
    alert('An error occurred: ' + error.message);
});


}


  // cancellaton
  function cancelOrder() {
      // clear cart
      localStorage.removeItem('cart'); 
      window.location.href = 'shop.html'; 
  }