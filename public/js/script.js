const hasHero = document.querySelector(".hero-section") !== null;

function handleNavbarScroll() {
    const navbar = document.getElementById("mainNavbar");
    if (!navbar) return;

    // Halaman tanpa hero: navbar selalu solid (scrolled)
    if (!hasHero) {
        navbar.classList.add("scrolled");
        return;
    }

    // Halaman dengan hero: transparan di atas, solid saat scroll
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
}

// Cek saat halaman pertama dimuat
handleNavbarScroll();

// Cek setiap kali di-scroll
window.addEventListener("scroll", handleNavbarScroll, { passive: true });
