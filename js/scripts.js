// Déclaration des variables
const openModalButtons = document.getElementsByClassName('openmodal')
const addToCartButtons = document.getElementsByClassName('addtocart')
const popup = document.getElementById('myPopup')
const close = document.getElementById('closePopup')

// Fonction qui ouvre la popup
const showPopup = e => {
  popup.style = 'display: flex'
  e.preventDefault()
}

// Fonction qui ajoute un produit au panier
const addToCart = (id, e) => {
  console.log(id)
  e.preventDefault()
}

// Fermeture de la popup
close.addEventListener('click', () => {
  // On masque la popup
  popup.removeAttribute('style')
})

// On parcourt les boutons "openmodal"
for (let i = 0; i < openModalButtons.length; i++) {
  const element = openModalButtons[i]
  element.addEventListener('click', () => showPopup(event))
}

// On parcourt les boutons "addtocart"
for (let i = 0; i < addToCartButtons.length; i++) {
  const element = addToCartButtons[i]
  const productId = element.dataset.productid
  element.addEventListener('click', () => addToCart(productId, event))
}
