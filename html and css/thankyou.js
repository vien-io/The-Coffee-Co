// Countdown before redirection
let countdown = 5; // Countdown time in seconds
const countdownElement = document.getElementById('countdown');

const interval = setInterval(() => {
    countdown -= 1;
    countdownElement.textContent = countdown;
    if (countdown === 0) {
        clearInterval(interval);
        redirectToHome();
    }
}, 1000);

// Redirect to home page
function redirectToHome() {
    window.location.href = 'index.html'; // Replace 'index.html' with your homepage URL
}
