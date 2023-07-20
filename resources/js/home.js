const menuHamburgerbtn = document.querySelector('.menuHamburger')
const menuHamburger = document.querySelector('.nav_menu')
const searchZone = document.querySelector('.search-zone')
const connexionMessage = document.querySelector('.connexion-message')

menuHamburgerbtn.addEventListener('click', () => {
menuHamburger.classList.toggle('displayMenu');
connexionMessage.classList.toggle('marge')
})
