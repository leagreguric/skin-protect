function addStateBore() {
    let stateObj = { id: "100" };
    
    history.replaceState(stateObj, "Bore", "bore.html");

    fetch("bore.html")
        .then(response => response.text())
        .then(html => {
           
            document.documentElement.innerHTML = html;

            
        })
        .catch(error => console.error("Error fetching new page:", error));
}

function addStateSuha() {
    let stateObj = { id: "100" };
    
    history.replaceState(stateObj, "Suha koža", "suha-koza.html");

    fetch("suha-koza.html")
        .then(response => response.text())
        .then(html => {
           
            document.documentElement.innerHTML = html;

            
        })
        .catch(error => console.error("Error fetching new page:", error));
}

function addStateMasna() {
    let stateObj = { id: "100" };
    
    history.replaceState(stateObj, "Masna koža", "masna-koza.html");

    fetch("masna-koza.html")
        .then(response => response.text())
        .then(html => {
           
            document.documentElement.innerHTML = html;

            
        })
        .catch(error => console.error("Error fetching new page:", error));
}


