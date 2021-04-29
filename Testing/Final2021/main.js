let products = document.querySelector(".products");

document.addEventListener("DOMContentLoaded", function() {
  console.log("loaded");
  getProducts();
  function getProducts() {
    let xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      "https://fakestoreapi.com/products",
      true
    );
    xhr.onload = function() {
      if(this.status === 200) {
        let results = JSON.parse(this.responseText);
        console.log(results);
        let output = "";
        results.forEach(function(item) {
          output+= `
          <div class="col-lg-4 col-md-6 mt-2">
            <div class="card">
              <img src="${item.image}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">${item.title}</h5>
                <p class="card-text">${item.price}</p>
            </div>
          </div>
          </div>
          `;
        });
        products.innerHTML = output;
      }
    }
    xhr.send();
  }
})
