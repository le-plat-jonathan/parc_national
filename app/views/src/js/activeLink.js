/*==================== ACTIVE LINK ON CLICK ====================*/
const navLinks = document.querySelectorAll(".nav__menu a");

navLinks.forEach((link) => {
  link.addEventListener("click", function () {
    // Retirer la classe 'active-link' de tous les liens
    navLinks.forEach((l) => l.classList.remove("active-link"));

    // Ajouter la classe 'active-link' au lien cliqué
    this.classList.add("active-link");
  });
});