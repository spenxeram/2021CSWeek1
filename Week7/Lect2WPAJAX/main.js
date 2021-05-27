console.log("script loaded");
// Get elements to be used
let searchinput = document.querySelector("input.search");
let ajaxoutputdiv = document.querySelector(".ajax-output");
// Event Listeners
searchinput.addEventListener("keyup", function() {
  let searchval = searchinput.value;
  if(searchval == '') {
    ajaxoutputdiv.style.display = "none";
  } else {
    ajaxoutputdiv.style.display = "initial";
    ajaxManager("query", searchval);
  }

})

// AJAX Function
function ajaxManager(type, value) {
  let xhr = new XMLHttpRequest();
  let request = "ajax-search.php?q=" + value;
  xhr.open(
    "GET",
    request,
    true
  );

  xhr.onload = function() {
    if(this.status == 200) {
      if(this.responseText >= 1) {
        outputNumArticles(this.responseText);
      } else if (this.responseText == 0) {
        outputWarning();
      }
    }
  }
  xhr.send();
}
// Helper/genderal function
function outputNumArticles(num) {
  let output = `<div class="alert alert-success mt-3" role="alert"> ${num} Article(s) were found!</div>`;
  ajaxoutputdiv.innerHTML = output;
}

function outputWarning() {
  let output = `<div class="alert alert-warning mt-3" role="alert"> No Articles were found!</div>`;
  ajaxoutputdiv.innerHTML = output;
}
