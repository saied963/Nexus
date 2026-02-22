function showDamesKleding() {
    document.getElementById('home').classList.add('hidden');
    document.getElementById('dames-kleding').classList.remove('hidden');
}

function showHome() {
    document.getElementById('dames-kleding').classList.add('hidden');
    document.getElementById('home').classList.remove('hidden');
}

function addToCart(itemName) {
    alert(itemName + " is toegevoegd aan je winkelwagen!");
}