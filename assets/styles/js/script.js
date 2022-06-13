/////////////////////////////////////////////
//  Make mobile navigation work
console.log("ok js");

const btnNavEl = document.querySelector(".btn-mobile-nav");
const headerEl = document.querySelector("#header");

btnNavEl.addEventListener("click", function () {
    headerEl.classList.toggle("nav-open");
});

/////////////////////////////////////////////
// Set current year
const yearEl = document.querySelector(".year");
const currentYear = new Date().getFullYear();
yearEl.textContent = currentYear;

///////////////////////////////////////////////////////
// ne pas télécharger l'image de la demande de devis quand on clic dessus

// const imgUploadLink = document.querySelector(".vich-image a");

// imgUploadLink.addEventListener("click", function (e) {
//     e.preventDefault();
// });
