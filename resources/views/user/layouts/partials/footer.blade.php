
<footer data-aos="fade-up">
    {{-- <hr> --}}
    <div class="footer-content">
        {{-- <h2> DSI </h2>
        <ul>
            <li class="nav_links"><a href="#">Accueil</a></li>
            <li class="nav_links"><a href="#">Documents</a></li>
            <li class="nav_links"><a href="#">Dossiers</a></li>
            <li class="nav_links"><a href="#">Rechercher</a></li>
        </ul>

        <div class="socials">
            <ion-icon name="logo-facebook"></ion-icon>
            <ion-icon name="logo-google"></ion-icon>
            <ion-icon name="logo-twitter"></ion-icon>
            <ion-icon name="logo-linkedin"></ion-icon>
        </div>

        <div class="copyright">
            © 2023 DSI. All right reserved
        </div> --}}
        <div class="infoStructure" data-aos="zoom-out-down" data-aos-delay="500">
            <img src="storage/images/logo-Misp2.png" alt="">
        </div>
        <div class="navLinks">
            <ul>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="500"><a href="#">Accueil</a></li>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="600"><a href="#">Documenthèque</a></li>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="700"><a href="#">Se déconnecter</a></li>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="800"><a href="#">Paramètres</a></li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <p>© 2023-DSI. All rigth reserved</p>
        <p>Ministère de l'Intérieur et de la Sécurité Publique</p>
    </div>
</footer>

@livewireScripts()
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
<script>
    document.addEventListener("scroll", function() {
    var navbar = document.getElementById("navbar"); // Récupère l'élément de la navbar
    var scrollPosition = window.scrollY; // Récupère la position de défilement

    if (scrollPosition > 100) {
        navbar.classList.add("scrolled"); // Ajoute la classe "scrolled" pour changer la couleur
    } else {
        navbar.classList.remove("scrolled"); // Retire la classe "scrolled" pour revenir à la couleur initiale
    }
});
</script>
</body>
</html>
