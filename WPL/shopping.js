(function () {
    const cartInfo = document.getElementById("cart-info");
    const cart = document.getElementById("cart");
    cartInfo.addEventListener("click", function () {
      cart.classList.toggle("show-cart");
    });
  })();
  
  if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
  } else {
    ready();
  }
  
  function ready() {
    var addToCartButtons = document.getElementsByClassName("ADD-TO-CART");
    for (var i = 0; i < addToCartButtons.length; i++) {
      var button = addToCartButtons[i];
      button.addEventListener("click", addToCartClicked);
    }
  
    document
      .getElementsByClassName("btn-purchase")[0]
      .addEventListener("click", purchaseClicked);
  }
  
  function addToCartClicked(event) {
    event.preventDefault();
    var button = event.target;
    var product = button.parentElement.parentElement;
    var title = product.getElementsByClassName("product-title")[0].innerText;
    var price = product.getElementsByClassName("product_price")[0].innerText;
    var ImageSrc = product.getElementsByClassName("product_image")[0].src;
    addItemToCart(title, price, ImageSrc);
  }
  
  function addItemToCart(title, price, ImageSrc) {
    var cartItems = document.getElementsByClassName("cart-items")[0];
    var cartItemsTitles = document.getElementsByClassName("cart-item-title");
    for (var i = 0; i < cartItemsTitles.length; i++)
      if (cartItemsTitles[i].innerText == title) {
        alert("This system is already added to cart");
        return;
      }
  
    var cartRow = document.createElement("div");
    cartRow.classList.add("cart-row");
    var cartRowContents = `
      <div class="cart-item cart-column">
          <img class="cart-item-image" src="${ImageSrc}">
          <span class="cart-item-title">${title}</span>
      </div> 
      <span class="cart-price cart-column">${price}</span>
      <div class="cart-quantity cart-column">
          <input class="cart-quantity-input" type="number" value="1">
          <button class="btn btn-danger" type="button">REMOVE</button>
      </div>`;
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow
      .getElementsByClassName("btn-danger")[0]
      .addEventListener("click", removeCartItem);
    cartRow
      .getElementsByClassName("cart-quantity-input")[0]
      .addEventListener("change", quantityChanged);
  }
  function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    updateCartTotal();
  }
  function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
      input.value = 1;
    }
    updateCartTotal();
  }
  function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName("cart-items")[0];
    var cartRows = cartItemContainer.getElementsByClassName("cart-row");
    var total = 0;
    for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i];
      var priceElement = cartRow.getElementsByClassName("cart-price")[0];
      var quantityElement = cartRow.getElementsByClassName(
        "cart-quantity-input"
      )[0];
      var price = parseFloat(priceElement.innerText.replace("Rs", ""));
      var quantity = quantityElement.value;
      total = total + price * quantity;
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName("cart-total-price")[0].innerText =
     total + "Rs" ;
  }