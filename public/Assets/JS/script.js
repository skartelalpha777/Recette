
function getData() {
    const url = "http://localhost:888/api/recettes/";
    return fetch(url)
        .then(response => response.json())
        .then(data => {
            return data;
        });
}

let toutesLesRecettes = [];
var filtrer = [];
document.addEventListener("DOMContentLoaded", async () => {
    const reponse = await fetch("http://localhost:888/api/recettes/");
    toutesLesRecettes = await reponse.json();
    filtrer = toutesLesRecettes.member;
    afficherRecettes(toutesLesRecettes.member);
    appliquerFiltres(toutesLesRecettes.member);
  //  liker();

});

function liker() {
    for (let btn of document.querySelectorAll(".likebtn")) {
        btn.addEventListener('click', async (e) => {
            let card = document.getElementById(btn.dataset.id);
            card.classList.toggle("text-danger");
            let recetteId = btn.dataset.id;
            console.log(recetteId)

            let recette = filtrer.find(element => element.id == recetteId);

            try {
                const response = await fetch('http://localhost:888/api/recettes/' + recetteId, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/merge-patch+json'
                    },
                    body: JSON.stringify({ "favori": !recette.favori })
                });

                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status}`);
                }

                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Erreur lors de la requête PATCH :', error);
            }
        })
    };
}

function afficherRecettes(recettes) {
    document.getElementById("cardRow").innerHTML = "";
    for (let recette of recettes) {
        let cartCol = document.createElement("div");
        cartCol.classList.add("col-lg-4", "col-md-4", "col-12", "px-0");
        let card = createCard(recette);
        cartCol.appendChild(card)
        document.getElementById('cardRow').appendChild(cartCol);

    }
    liker();
}

function appliquerFiltres(recettes) {

    rechercher(recettes);
    filtreParCategorie(recettes);
    trier();

}
function trier() {
    let trie = document.getElementById("trie");
    trie.addEventListener("change", (e) => {
        if (trie.value == "temps") {
            filtrer.sort(function (a, b) { return a.tempsMinutes - b.tempsMinutes });
        }
        else if (trie.value == "titre") {

            filtrer.sort(function (a, b) { return a.titre.localeCompare(b.titre) });
        }
        else {
            filtrer.sort(function (a, b) { return a.id - b.id });
        }
        afficherRecettes(filtrer);

    })
}

function filtreParCategorie(recettes) {
    cat = document.getElementById("categorie");
    cat.addEventListener('change', (e) => {
        if (cat.value == "toutes") {
            filtrer = recettes
        }
        else {
            filtrer = recettes.filter((recette) => {
                return recette.categorieName.toUpperCase() == cat.value.toUpperCase();
            })
        }
        afficherRecettes(filtrer);
    })
}

function rechercher(recettes) {
    search = document.getElementById("searchInput");
    search.addEventListener('input', (e) => {
        let saisi = search.value.toLowerCase();
        filtrer = recettes.filter((recette) => {
            return recette.titre.toLowerCase().includes(saisi);
        })
        afficherRecettes(filtrer);

    })
}

function createCard(item) {
    let ItemUrl = document.getElementById("url").dataset.showUrl;
    let path = ItemUrl.replace("replace_id", item.id);
    let card = document.createElement("section");
    card.classList.add("card");
    // card.style.width = "500px";
    let html = `<a href="${path}"> <img src="${item.image}"   class="card-img-top" style="height: 350px; object-fit: cover;" alt="image de la recette">
       </a> <div class="card-body">
            <h4 class="card-title">${item.titre}</h4>
            <p class="card-text">${item.description}</p>
            <i class="bi-alarm-fill mb-0"> ${item.tempsMinutes} <span> min</span> </i>           
            <button id="${item.id}"  class="btn-solid mt-0 likebtn ${item.favori ? "text-danger" : ""}" data-id=${item.id}><i class="bi-heart-fill" ></i></button>
        </div>`;
    card.insertAdjacentHTML('beforeend', html);
    return card;
}
