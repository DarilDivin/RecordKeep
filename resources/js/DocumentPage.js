const listIcon = document.querySelector('.list-icon');
const gridIcon = document.querySelector('.grid-icon');
const documentListContainer = document.querySelector('.documentList');

const consultBtn = document.querySelectorAll('.consult');
const documentView = document.querySelector('.documentView');
const closeDoc= document.querySelector('.closeDoc');
const overlay = document.querySelector('.overlay');

const menuHamburgerbtn = document.querySelector('.menuHamburger')
const menuHamburger = document.querySelector('.nav_menu')
const searchZone = document.querySelector('.search-zone')


menuHamburgerbtn.addEventListener('click', () => {
menuHamburger.classList.toggle('displayMenu');
documentListContainer.classList.toggle('marge')
})


listIcon.addEventListener('click', () => {
    if(documentListContainer.classList.contains('grid')) {
        documentListContainer.classList.remove('grid'),
        documentListContainer.classList.add('list');
    } else {
        documentListContainer.classList.add('list');
    }
})

gridIcon.addEventListener('click', () => {
    if(documentListContainer.classList.contains('list')) {
        documentListContainer.classList.remove('list'),
        documentListContainer.classList.add('grid');
    } else {
        documentListContainer.classList.add('grid');
    }
})


consultBtn.forEach(element => 
    element.addEventListener('click', () => {
    documentView.classList.add('show')
}));

// consultBtn.addEventListener('click', () => {
//     documentView.classList.add('show')
// })

const closeDocument = () => {
    documentView.classList.remove('show');
}

closeDoc.addEventListener('click', closeDocument);
overlay.addEventListener('click', closeDocument);