const mot = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");



mot.addEventListener("click", function () {
  if (window.innerWidth <= 768) {

    return; // Stop execution if viewport width is less than or equal to 768px
  }

  sidebar.classList.toggle("expand");
});

window.addEventListener("resize", function () {
    if (window.innerWidth <= 768) {
      sidebar.classList.remove("expand");
    }
  });

// add this code if the default class of sidebar is expand
window.addEventListener("load", function () {
   if (window.innerWidth <= 768) {
   sidebar.classList.remove("expand");
 }
});









