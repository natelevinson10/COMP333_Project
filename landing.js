function showNavItems() {
    var x = document.getElementById("navbar_list");
    if (x.style.display === "none") {
      x.style.display = "flex";
    } else {
      x.style.display = "none";
    }
  }