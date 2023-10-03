function showNavItems() {
    var x = document.getElementById("navbar_list");
    if (x.style.display === "flex") {
      x.style.display = "none";
    } else {
      x.style.display = "flex";
    }
  }