
const addBtn = document.querySelectorAll('.viewInfo');
const userFormContainer = document.querySelector('.addUserFormContainer');
const closeUserForm = document.querySelector('.closeUserForm');
const overlay = document.querySelector('.overlayInfos');
const documentFormContainer = document.querySelector('.addDocumentFormContainer');
const closeDocumentForm = document.querySelector('.closeDocumentForm');

const infoTitle = document.getElementById('infoTitle');
const signature = document.getElementById('signature');
const nom = document.getElementById('nom');
const objet = document.getElementById('objet');
// const source = document.getElementById('source');
const emetteur = document.getElementById('emetteur');
const recepteur = document.getElementById('recepteur');
const dua = document.getElementById('dua');
const date = document.getElementById('date');
const nature = document.getElementById('nature');
const categorie = document.getElementById('categorie');
const consult = document.getElementById('consult');
const download = document.getElementById('download');
const pret = document.getElementById('pret');
const archived = document.getElementById('archived');
const disponible = document.getElementById('disponible');
const direction = document.getElementById('direction');
const service = document.getElementById('service');
const division = document.getElementById('division');
const chemise = document.getElementById('chemise');
const boite = document.getElementById('boite');
const rayon = document.getElementById('rayon');


addBtn.forEach((element) =>
element.addEventListener('click', () => {
    const document = JSON.parse(element.getAttribute('data-document'));
    console.log(document);
    infoTitle.innerText = document.nom
    signature.innerText = document.signature ? document.signature : 'Pas de signature';
    nom.innerText = document.nom;
    nom.setAttribute('title', document.nom)
    objet.innerText = document.objet;
    objet.setAttribute('title', document.objet)
    // source.innerText = document.source ? document.source : 'Pas de source';
    emetteur.innerText = document.expediteur;
    recepteur.innerText = document.destinataire;
    // dua.innerText = document.dua + ' ans';
    date.innerText = JSON.parse(element.getAttribute('data-document-date'));
    nature.innerText = JSON.parse(element.getAttribute('data-document-nature'));
    dua.innerText = JSON.parse(element.getAttribute('data-document-dua')) + ' ans';
    categorie.innerText = JSON.parse(element.getAttribute('data-document-categorie'));
    consult.innerText = document.nbrconsult;
    download.innerText = document.nbrdownload;
    pret.innerText = document.prete ? 'Oui' : 'Non';
    archived.innerText = document.archive ? 'Oui' : 'Non';
    disponible.innerText = document.disponibilite ? 'Disponible' : 'Indisponible';
    direction.innerText = JSON.parse(element.getAttribute('data-document-direction'));
    service.innerText = JSON.parse(element.getAttribute('data-document-service'));
    division.innerText = JSON.parse(element.getAttribute('data-document-division'));
    // chemise.innerText = JSON.parse(element.getAttribute('data-document-chemise')) === null ? 'Non classé' : JSON.parse(element.getAttribute('data-document-chemise'));
    // boite.innerText = JSON.parse(element.getAttribute('data-document-boite')) === null ? 'Non classé' : JSON.parse(element.getAttribute('data-document-boite'));
    // rayon.innerText = JSON.parse(element.getAttribute('data-document-rayon')) === null ? 'Non classé' : JSON.parse(element.getAttribute('data-document-rayon'));

    documentFormContainer.classList.add('showForm')

}))

const closeFormDoc = () => {
    documentFormContainer.classList.remove('showForm');
}

closeDocumentForm.addEventListener('click', closeFormDoc);
overlay.addEventListener('click', closeFormDoc);
