import Panier from "./modules/panier/panier";

document.addEventListener('DOMContentLoaded', () => {

    const cartJson = localStorage.getItem('cart');

    if (cartJson) {
        const cart = JSON.parse(cartJson);
        // Iterate over the cart items and add them to the Panier
        cart.forEach(element => {
            Panier.load_cart(element);
        });
    }

});