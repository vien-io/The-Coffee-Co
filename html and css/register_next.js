
document.querySelector('.register form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const username = document.querySelector('.register input[type="text"]').value;
    const email = document.querySelector('.register input[type="email"]').value;
    const password = document.querySelector('.register input[type="password"]').value;

    const formData = new FormData();
    formData.append("username", username);
    formData.append("email", email);
    formData.append("password", password);
    
    const response = await fetch('http://localhost/dashboard/projects/The%20Coffee%20Co/html%20and%20css/register_next.php', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();
    if (response.ok) {
        alert(result.message); // para manotify tayo kung success
    } else {
        alert(result.error);
    }

});