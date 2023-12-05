function login() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (username === "lea" && password === "123") {
       
        window.location.href = '../naslovna/naslovna.html';
    } else {
        alert("Neuspješna prijava. Provjerite korisničko ime i lozinku.");
    }
}