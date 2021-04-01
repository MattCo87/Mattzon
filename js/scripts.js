// Déclaration des variables
const openModalButtons = document.getElementsByClassName('openmodal')
const addToCartButtons = document.getElementsByClassName('addtocart')
const popup = document.getElementById('myPopup')
const close = document.getElementById('closePopup')
const emptyCart = document.getElementById('emptyCart')

// Fonction qui ouvre la popup
const showPopup = e => {
  popup.style = 'display: flex'
  e.preventDefault()
}

// Fonction qui ajoute un produit au panier
const addToCart = (id, e) => {
  if (window.XMLHttpRequest) {
    const xhr = new window.XMLHttpRequest()
    xhr.open('GET', 'php/helpers/cart.php?id=' + id + '&action=add')
    xhr.send()

    xhr.onload = () => {
      if (xhr.status !== 200) {
        console.log('Erreur : ' + xhr.status + ' - ' + xhr.statusText)
      } else {
        const qty = xhr.responseText
        const spanCart = document.getElementById('cartNb')
        spanCart.innerHTML = qty
        window.alert('Le produit a été ajouté à votre panier')
      }
    }

    xhr.onerror = function () {
      console.log('La requête a échoué')
    }
  } else {
    console.log('No XmlHttpRequest in your browser')
  }

  e.preventDefault()
}

// Fermeture de la popup
if (close !== null) {
  close.addEventListener('click', () => {
    // On masque la popup
    popup.removeAttribute('style')
  })
}

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

// Vidage du panier
if (emptyCart !== null) {
  emptyCart.addEventListener('click', () => {
    if (window.confirm('Voulez-vous vider entièrement votre panier ?')) {
      // On vide le panier
      if (window.XMLHttpRequest) {
        const xhr = new window.XMLHttpRequest()
        xhr.open('GET', 'php/helpers/cart.php?action=empty')
        xhr.send()

        xhr.onload = () => {
          if (xhr.status !== 200) {
            console.log('Erreur : ' + xhr.status + ' - ' + xhr.statusText)
          } else {
            window.location.href = 'panier.php'
          }
        }

        xhr.onerror = function () {
          console.log('La requête a échoué')
        }
      } else {
        console.log('No XmlHttpRequest in your browser')
      }
    }
  })
}
