/*!
 * Start Bootstrap - SB Admin v7.0.2 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

// function colorchange() {
//   var element1 = document.getElementById("sidenavAccordion");
//   if (element1.classList.contains("sb-sidenav-dark")) {
//     element1.classList.replace("sb-sidenav-dark", "sb-sidenav-light");
//   } else if (element1.classList.contains("sb-sidenav-light")) {
//     element1.classList.replace("sb-sidenav-light", "sb-sidenav-dark");
//   }

//   var element2 = document.getElementById("log");
//   if (element1.classList.contains("bg-dark")) {
//     element1.classList.replace("bg-dark", "bg-light");
//   } else if (element1.classList.contains("nav-light")) {
//     element1.classList.replace("bg-light", "bg-dark");
//   }

//   var element3 = document.getElementById("topbar");
//   if (element3.classList.contains("bg-dark")) {
//     element3.classList.replace("bg-dark", "bg-light");
//   } else if (element3.classList.contains("bg-light")) {
//     element3.classList.replace("bg-light", "bg-dark");
//   }
//   if (element3.classList.contains("navbar-dark")) {
//     element3.classList.replace("navbar-dark", "navbar-light");
//   } else if (element3.classList.contains("navbar-light")) {
//     element3.classList.replace("navbar-light", "navbar-dark");
//   }
// }
