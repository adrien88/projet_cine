
/*
    CALCUL des positionnements minimum
    -> permet de faire en sorte que le header ne soit pas caché par la navbar
    -> remplit l'écran à la vertical en recalculant une hauter minimum pour le main
*/
let heightNavbar = document.getElementById('navbar').offsetHeight;
let heightHeader = document.getElementById('header').offsetHeight;
let heightFooter = document.getElementById('footer').offsetHeight;
document.getElementById('body').style.paddingTop = heightNavbar + 'px';
let heightScreen = window.innerHeight;
document.getElementById('main').style.minHeight = (heightScreen-(heightNavbar+heightHeader+heightFooter)) + 'px';
