const body = document.querySelector('body'),
    burger = document.querySelector('.burgerBouton'),
    shopBouton = document.querySelector('.cartBouton'),
    nav = document.querySelector('nav'),
    shop = document.querySelector('#shop'),
    croixNav = document.querySelector('#croixNav'),
    croixShop = document.querySelector('#croixShop');


// OUVERTURE PANIER / NAV
burger.addEventListener('click', () => {
    if (shop.style.transform == 'translateX(60vw)') {
        nav.style.transform = 'translateX(0)';
        body.style.overflowY = 'hidden';
    }
    else {
        shop.style.transform = 'translateX(60vw)';
        nav.style.transform = 'translateX(0)';
        body.style.overflowY = 'hidden';
    }
});
shopBouton.addEventListener('click', () => {
    if (nav.style.transform == 'translateX(-60vw)') {
        shop.style.transform = 'translateX(0)';
        body.style.overflowY = 'hidden';
    }
    else {
        nav.style.transform = 'translateX(-60vw)';
        shop.style.transform = 'translateX(0)';
        body.style.overflowY = 'hidden';
    }
});

// FERMETURE PANIER / NAV
croixNav.addEventListener('click', () => {
    nav.style.transform = 'translateX(-60vw)';
    body.style.overflowY = 'scroll';
});
croixShop.addEventListener('click', () => {
        shop.style.transform = 'translateX(60vw)';
        body.style.overflowY = 'scroll';
});