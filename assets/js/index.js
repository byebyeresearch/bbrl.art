// Lightbox
Array.from(document.querySelectorAll("[data-lightbox]")).forEach(element => {
  element.onclick = (e) => {
    e.preventDefault();
    basicLightbox.create(`<img src="${element.href}">`).show();
  };
});

// Hamburger Menu
var menuToggle = document.querySelector("#menu-toggle");
var menu = document.querySelector("#menu");

menuToggle.addEventListener("click", function(event) {
  var menuOpen = menu.classList.contains("active");
  var newMenuOpenStatus = !menuOpen;

  menuToggle.setAttribute("aria-expanded", newMenuOpenStatus);
  menu.classList.toggle("active");
  if (menuToggle.textContent === "☰") {
    menuToggle.textContent = "✕";
    document.querySelector("html").classList.toggle("scrollable");
  } else {
    menuToggle.textContent = "☰";
    document.querySelector("html").classList.toggle("scrollable");
  }
});


// Header On Scroll
var heroHeight = 0;

if (document.querySelector("#hero")) {
  heroHeight = $(document.querySelector("#hero")).height();
}

var mainHeader = document.querySelector("#main-header");
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  var mainHeaderHidden = mainHeader.classList.contains("is-hidden");

  if (prevScrollpos < currentScrollPos) { //SCROLL DOWN

    $(mainHeader).addClass("is-hidden");

  } else if (prevScrollpos > currentScrollPos) { //SCROLL UP

    if (currentScrollPos < heroHeight) { //INSIDE HERO

      $(mainHeader).addClass("static");
      $(mainHeader).removeClass("is-hidden");

    } else if (currentScrollPos > heroHeight){ //OUTSIDE HERO

      $(mainHeader).removeClass("static");
      $(mainHeader).removeClass("is-hidden");
      
    }

  }

  prevScrollpos = currentScrollPos;
};