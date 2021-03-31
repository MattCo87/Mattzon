// Déclaration des variables
const openModalButtons = document.getElementsByClassName('openmodal')
const addToCartButtons = document.getElementsByClassName('addtocart')
const popup = document.getElementById('myPopup')
const close = document.getElementById('closePopup')

// Fonction qui ouvre la popup
const showPopup = event => {
  event.preventDefault()
  popup.style = 'display: flex'
}

// Fonction qui ajoute un produit au panier
const addToCart = (event, id) => {
  event.preventDefault()
  console.log(id)
}

// Fermeture de la popup
close.addEventListener('click', () => {
  // On masque la popup
  popup.removeAttribute('style')
})

// On parcourt les boutons "openmodal"
for (let i = 0; i < openModalButtons.length; i++) {
  const element = openModalButtons[i]
  element.addEventListener('click', showPopup)
}

// On parcourt les boutons "addtocart"
for (let i = 0; i < addToCartButtons.length; i++) {
  const element = addToCartButtons[i]
  const productId = element.dataset.productid
  element.addEventListener('click', () => addToCart(productId))
}
