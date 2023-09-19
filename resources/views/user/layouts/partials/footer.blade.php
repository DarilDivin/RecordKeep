
<footer >
    <div class="footer-content">
        <div class="infoStructure" data-aos="zoom-out-down" data-aos-delay="500">
            <img src="storage/images/logo-Misp2.png" alt="Logo-MISP">
        </div>
        <div class="navLinks">
            <ul>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="500"><a href="{{ route('home') }}">Accueil</a></li>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="600"><a href="{{ route('document.index') }}">Documenthèque</a></li>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="700"><a href="{{ route('contactUs') }}">Nous Contacter</a></li>
                <li class="nav_links" data-aos="fade-left" data-aos-delay="800"><a href="{{ route('settings') }}">Paramètres</a></li>
            </ul>
            <div class="socials" >
                <a href="" data-aos="fade-left" data-aos-delay="900">
                    <ion-icon name="logo-facebook" ></ion-icon>
                </a>
                <a href="" data-aos="fade-left" data-aos-delay="1000">
                    <ion-icon name="logo-google" ></ion-icon>
                </a>
                <a href="" data-aos="fade-left" data-aos-delay="1100">
                    <ion-icon name="logo-twitter" ></ion-icon>
                </a>
                <a href="" data-aos="fade-left" data-aos-delay="1200">
                    <ion-icon name="logo-linkedin" ></ion-icon>
                </a>
            </div>
        </div>

    </div>
    <div class="copyright">
        <p>© 2023-DSI. All rigth reserved</p>
        <p>Ministère de l'Intérieur et de la Sécurité Publique</p>
    </div>

    <div class="flagsborderbottom">
        <span></span>
        <span></span>
        <span></span>
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
    var navbar = document.getElementById("navbar");
    var scrollPosition = window.scrollY;

    if (scrollPosition > 100) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});
</script>
</body>
</html>
