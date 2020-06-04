// Run this function once the DOM is loaded
$(() => {
    $('#loginForm').submit((e) => {
        e.preventDefault();

        const loginData = {
            username: $('#usernameInput').val(),
            password: sha256($('#passwordInput').val())
        };

        $.ajax({
            url: '/api/login.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(loginData),
            success: () => {
                // Forward user to the contacts page
                window.location = '/contacts.html';
            }
        })
    })
});