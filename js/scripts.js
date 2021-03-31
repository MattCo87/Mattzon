// Déclaration des variables
const addToCart = document.getElementById('atc')
const popup = document.getElementById('myPopup')
const close = document.getElementById('closePopup')

// Ouverture de la popup
addToCart.addEventListener('click', () => {
  // On affiche la popup
  popup.style = 'display: flex'
})

// Fermeture de la popup
close.addEventListener('click', () => {
  // On masque la popup
  popup.removeAttribute('style')
})