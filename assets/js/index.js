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



var heroHeight = $(window).height();
var mainHeader = document.querySelector("#main-header");
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
var mainHeaderHidden = mainHeader.classList.contains("is-hidden");

  if (prevScrollpos < currentScrollPos) {
    $(mainHeader).removeClass("is-visible").addClass("is-hidden");
    
  } else if (mainHeaderHidden & prevScrollpos > currentScrollPos & document.documentElement.scrollTop > heroHeight || document.documentElement.scrollTop <= 0) {
    $(mainHeader).removeClass("is-hidden").addClass("is-visible");
  }
  prevScrollpos = currentScrollPos;
  console.log(mainHeaderHidden)
};

