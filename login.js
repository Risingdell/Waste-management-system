// Basic client-side validation can go here (optional)
document.querySelector('form').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!email || !password) {
        alert('Please fill in both fields.');
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
