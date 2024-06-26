const menuHamburgerbtn = document.querySelector('.menuHamburger')
const menuHamburger = document.querySelector('.nav_menu')

menuHamburgerbtn.addEventListener('click', () => {
    menuHamburger.classList.toggle('displayMenu')
})

menuHamburgerbtn.addEventListener('click', () => {
    menuHamburger.classList.toggle('displayMenu')
})

const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");

const swiperEl = document.querySelector("swiper-container");
swiperEl.addEventListener("autoplaytimeleft", (e) => {
    const [swiper, time, progress] = e.detail;
    progressCircle.style.setProperty("--progress", 1 - progress);
    progressContent.textContent = `${Math.ceil(time / 1000)}s`;
});

const consultBtn = document.querySelector('.consult');
const documentView = document.querySelector('.documentView');
const embed = document.getElementById("documentEmbed");
const closeDoc= document.querySelector('.closeDoc');
const overlay = document.querySelector('.overlay');


consultBtn.addEventListener('click', (event) => {
    const documentLink = element.getAttribute("data-document-link");
    embed.setAttribute("src", documentLink);
    documentView.classList.add('show');
});


const closeDocument = () => {
    documentView.classList.remove('show');
}

closeDoc.addEventListener('click', closeDocument);
overlay.addEventListener('click', closeDocument);
