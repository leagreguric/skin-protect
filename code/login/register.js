function provjeri() {
    let password = document.getElementById("password").value;
    let confpassowrd = document.getElementById("confirmPassword").value;

    if (password != confpassowrd) {
        alert("Lozinke se ne podudaraju");
    } else {
        let email = document.getElementById("email").value;

        if (isValidEmail(email)) {
            window.location.href = '../login/login.html';
        } else {
            alert("Netočan email");
        }
    }
}

function isValidEmail(email) {
    if (email.indexOf("@") > -1) {
        let mo = email.indexOf("@")
        if (mo > 2) {
            const subs = email.split('@').pop();
            if (subs.length >= 2) {
                const dot = subs.indexOf('.');

                if (dot > -1) {
                    const subs2 = subs.split('.').pop();
                    if (subs2.length >= 2) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}