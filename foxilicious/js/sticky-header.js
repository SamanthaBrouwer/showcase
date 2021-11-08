var navbar = document.getElementById("siteHeader"),
    sticky = navbar.offsetTop;

window.onscroll = function() {
  makeNavbarSticky();
};

function makeNavbarSticky() {
  if (window.pageYOffset > sticky) {
    navbar.classList.add("is-sticky")
  } else {
    navbar.classList.remove("is-sticky");
  }
}