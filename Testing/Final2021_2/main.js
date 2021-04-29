document.addEventListener("DOMContentLoaded", function() {
  let productsDiv = document.querySelector(".products");
  console.log("Page loaded");
  getProducts();
  function getProducts() {
    let url = "https://fakestoreapi.com/products";
    let xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      url,
      true
    );
    xhr.onload = function() {
      console.log("onload called" + this.status);
      if(this.status === 200) {
        let results = JSON.parse(this.responseText);
        console.log("status 200");
        outputProducts(results);
      }
    }
    xhr.send();
  }

  function outputProducts(products) {
    console.log(products);
    let output = "";
    products.forEach((item, i) => {
      output+= `
      <div class="col-lg-4 col-md-6 mt-4">
      <div class="card text-center">
        <img src="${item.image}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">${item.title}</h5>
          <p class="card-text">$ ${item.price}</p>
        </div>
      </div>
      </div>
      `;
      productsDiv.innerHTML = output;
    });

  }



})
