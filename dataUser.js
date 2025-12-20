//for storage user
const UserAcc = {
    name: "admin",
    name: "user"
}
document.getElementById('usernameShow').innerHTML = UserAcc.name + "'s";

// form login
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent page refresh

    // Hardcoded credentials for demonstration
    const validCredentials = {
        "admin": "admin",
        "user2": "admin"
    };

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Validate credentials
    if (validCredentials[username] === password) {
        alert("Login successful!");
        window.location.href = "index.html"; // Redirect to home
    } else {
        alert("Invalid username or password.");
    }

});