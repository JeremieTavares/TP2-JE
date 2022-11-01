window.onload = () => {

};

// Pour afficher les commentaires d'un camping via une requête "fetch()" ou AJAX
async function showComments(buttonElement){

    let id = buttonElement.id;
    let idNum = /\w+-(\d+)/g.exec(id)[1];
    console.log(idNum);
    let fetchBody = {
        action: "getComments",
        id: idNum
    }

    fetchFunct(fetchBody, buttonElement);

}

async function fetchFunct(fetchBody, buttonElement) {
    let response = await fetch(
        "./index.php",
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(fetchBody)
        }

        

    );

    allo(response, buttonElement);

}

async function allo(response, buttonElement) {
    containerComments = buttonElement.parentElement.querySelector(".commentaireCamping");
    containerComments.innerHTML = await response.text();
}


// Pour valider à l'aide de RegEx le formulaire d'ajout d'un commentaire avant de l'envoyer
function verifyComments(event) {

}