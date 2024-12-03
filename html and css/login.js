document.querySelector('.login form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.querySelector('.login input[type="email"]').value;
    const password = document.querySelector('.login input[type="password"]').value;

    const formData = new URLSearchParams();
    formData.append("email", email);
    formData.append("password", password);

    try {
        const response = await fetch('http://localhost/dashboard/projects/The Coffee Co/html and css/login_next.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (response.ok && result.message) { // Check for success message
            // Display success message
            alert(result.message); 

            // Add the logged-in state
            document.querySelector('header').classList.add('logged-in');
            
            // Close the wrapper (login form)
            document.querySelector('.wrapper').classList.remove('active-popup');

            // Show user info and hide login/registration
            document.querySelector('.wrapper').classList.add('logged-in');
            document.querySelector('.user-info').style.display = 'block';
            document.querySelector('.form-box.login').style.display = 'none'; // Make sure it's targeting the login form
            document.querySelector('.form-box.register').style.display = 'none'; // And the registration form

            // Set user info on the welcome screen
            document.querySelector('#username').textContent = result.user.username;
            document.querySelector('#email').textContent = result.user.email;

            // Update the button with the username
            const btnLogged = document.querySelector('.btnLogged');
            const usernamePlaceholder = btnLogged.querySelector('.username-placeholder');
            if (usernamePlaceholder) {
                usernamePlaceholder.textContent = result.user.username;
            }

            // Show the logged-in button and hide the login button
            btnLogged.style.display = 'inline-block'; // Show the logged-in button
            document.querySelector('.btnLogin-popup').style.display = 'none'; // Hide the login button

            // Update user info display
            const userInfo = document.querySelector('.user-info');
            if (userInfo) {
                userInfo.innerHTML = `
                    <p>Welcome, ${result.user.username}!</p>
                    <p>Email: ${result.user.email}</p>
                    <button id="logout-btn">Logout</button>
                `;
            }
        } else if (result.error) { 
            // Handle error
            alert(result.error); 
        } else {
            alert('Unexpected response format');
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
});

// Handle logout
document.querySelector('.wrapper').addEventListener('click', (e) => {
    if (e.target && e.target.id === 'logout-btn') {
        // Reset user info and show login/registration again
        document.querySelector('.wrapper').classList.remove('logged-in');
        document.querySelector('.user-info').style.display = 'none';
        document.querySelector('.form-box.login').style.display = 'block';
        document.querySelector('.form-box.register').style.display = 'block';

        // Also make sure to hide the logged-in button and show the login button again
        const btnLogged = document.querySelector('.btnLogged');
        btnLogged.style.display = 'none'; // Hide the logged-in button
        document.querySelector('.btnLogin-popup').style.display = 'inline-block'; // Show login button
    }
});
