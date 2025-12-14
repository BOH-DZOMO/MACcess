console.log("Hello Admin");
const toggleButton = document.getElementById("toggle-btn");
const sidebar = document.getElementById("sidebar");


function toggleSidebar() {
    sidebar.classList.toggle("close");
    toggleButton.classList.toggle("rotate");
    console.log(sidebar);
  closeAllSubMenus()
}

function closeAllSubMenus(){
     let open_menu = sidebar.getElementsByClassName("show");
    Array.from(open_menu).forEach((ul) => {
        ul.classList.toggle("show");
        ul.previousElementSibling.classList.toggle("rotate");
    });
}

function toggleSubMenu(button) {
    if (!button.nextElementSibling.classList.contains("show")) {
        closeAllSubMenus()
    }
    if (sidebar.classList.contains("close")) {
        toggleSidebar();
    }
   
    button.nextElementSibling.classList.toggle("show");
    button.classList.toggle("rotate");
   
}


