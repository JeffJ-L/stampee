const accordion = document.querySelector(".accordion");
const userRoles = document.querySelectorAll(".roles");
let currentUrl = new URL(document.URL);
let path = currentUrl.pathname;
// console.log(path);

// console.log(currentUrl);

if(path.includes('/stampee/mvc/enchere/show')){
  accordion.addEventListener("click", (e) => {
    const activePanel = e.target.closest(".accordion-panel");
    if (!activePanel) return;
    toggleAccordion(activePanel);
  });
  
}


userRoles.forEach(role => {
  role.addEventListener('click', (evenement) => {
    evenement.preventDefault();
    toggleUserRole(evenement);
  })
})

function toggleAccordion(panelToActivate) {
  const activeButton = panelToActivate.querySelector("button");
  const activePanel = panelToActivate.querySelector(".accordion-content");
  const activePanelIsOpened = activeButton.getAttribute("aria-expanded");

  if (activePanelIsOpened === "true") {
    panelToActivate
      .querySelector("button")
      .setAttribute("aria-expanded", false);

    panelToActivate
      .querySelector(".accordion-content")
      .setAttribute("aria-hidden", true);
  } else {
    panelToActivate.querySelector("button").setAttribute("aria-expanded", true);

    panelToActivate
      .querySelector(".accordion-content")
      .setAttribute("aria-hidden", false);
  }
}

function toggleUserRole(evenement) {
  const declencheur = evenement.target;
  const membre = document.querySelector("[data-role='Membre']");
  const admin = document.querySelector("[data-role='Admin']");

  membre.classList.remove("active");
  admin.classList.remove("active-admin");

  if(declencheur.dataset.role === "Admin") {
    // membre.classList.remove("active");
    declencheur.classList.add("active-admin");
    // console.log('admin selected');
  }else if(declencheur.dataset.role === "Membre"){
    membre.classList.add("active");
    // declencheur.classList.remove("active-admin");
    // console.log('membre selected');
  }

}
