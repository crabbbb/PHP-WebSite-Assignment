//navabar action
const navMenu_icon = document.querySelector("#navMenu-icon");
let menuOpen = false;

navMenu_icon.addEventListener('click', () => {
    if(!menuOpen){
        navMenu_icon.classList.add('open');
        menuOpen = true;
    }else{
        navMenu_icon.classList.remove('open');
        menuOpen = false;
    }
});


const header = document.querySelector("header");
/*action for the menu list*/
navMenu_icon.onclick = function(){
    navBar = document.querySelector("#menu-list");
    navBar.classList.toggle("active");
    header.classList.toggle("show");
}

/**/ 
window.addEventListener("scroll", function(){
    header.classList.toggle("trans", window.scrollY>0);
})




