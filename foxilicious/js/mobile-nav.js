function toggleNav() {
  var mobileNav = document.querySelector("#main-nav");

  if (mobileNav.clientWidth == "0" || mobileNav.style.width == "0px") {
    mobileNav.style.width = "100%";
    document.body.classList.add('mobile-nav-open');
  } else {
    mobileNav.style.width = "0";
    document.body.classList.remove('mobile-nav-open');
  }
}

window.onload = function(){
	var popup = document.getElementById('searchPopover');
  var overlay = document.getElementById('searchPopoverBackground');

  document.onclick = function(e) {
    if (e.target.id == 'searchPopoverBackground'){
      popup.style.display = 'none';
      overlay.style.display = 'none';
      e.preventDefault();
    }

    if (e.target.classList.contains('toggleSearch')) {
      popup.style.display = 'flex';
      overlay.style.display = 'block';
      e.preventDefault();
    }
  };
}