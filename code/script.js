function addStateHome() {
    let stateObj = { id: "100" };
    
    history.replaceState(stateObj, "Home", "../naslovna/naslovna.html");

    fetch("../naslovna/naslovna.html")
        .then(response => response.text())
        .then(html => {
            document.documentElement.innerHTML = html;
        })
        .catch(error => console.error("Error fetching new page:", error));
}


function addStateSavjeti() {
    let stateObj = { id: "100" };
    
    history.replaceState(stateObj, "Akne", "../explore/akne.html");

    fetch("../explore/akne.html")
        .then(response => response.text())
        .then(html => {
            document.documentElement.innerHTML = html;
        })
        .catch(error => console.error("Error fetching new page:", error));
}

function addStateProizvodi() {
    let stateObj = { id: "100" };
    
    history.replaceState(stateObj, "Akne", "../explore/akne.html");

    fetch("../explore/akne.html")
        .then(response => response.text())
        .then(html => {
            document.documentElement.innerHTML = html;
        })
        .catch(error => console.error("Error fetching new page:", error));
}

function addStateKontakt() {
    let stateObj = { id: "100" };
    
    history.replaceState(stateObj, "Akne", "../explore/akne.html");

    fetch("../explore/akne.html")
        .then(response => response.text())
        .then(html => {
            document.documentElement.innerHTML = html;
        })
        .catch(error => console.error("Error fetching new page:", error));
}
