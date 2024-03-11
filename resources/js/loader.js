// Importer Anime.js
import anime from 'animejs/lib/anime.es.js';


// JavaScript pour simuler le chargement de la page
window.addEventListener("load", function () {
    // Sélectionnez la barre de chargement
    var loaderBar = document.getElementById("loader-bar");
    var fill = document.querySelector(".lines");
    // Animez la barre de chargement en augmentant sa largeur à 100%
    loaderBar.style.width = "90%";
    loaderBar.style.transition = "3s";
    // Une fois le chargement terminé, masquez la barre de chargement
    setTimeout(function () {
        loaderBar.style.width = "100%";
        fill.style.fill = "var(--color-primary)"
    }, 5000); // Réglez cette durée sur la durée prévue de chargement de votre page
    setTimeout(function () {
        loaderBar.parentElement.style.display = "none";
    }, 8000); // Réglez cette durée sur la durée prévue de chargement de votre page
});


var lineDrawing = anime({
targets: '#lineDrawing .lines path',
strokeDashoffset: [anime.setDashoffset, 0],
easing: 'easeInOutSine',
duration: 1500,
delay: function(el, i) { return i * 250 },
direction: 'alternate',
loop: false
});


document.addEventListener("DOMContentLoaded", function() {
    // Masquer la surcouche de chargement lorsque le chargement de la page est terminé
    document.getElementById("loader-wrapper").style.display = "none";
});

// Retarder l'affichage d'un élément après 2 secondes
setTimeout(function() {
    document.getElementById('monElement').style.display = 'block';
}, 2000);
