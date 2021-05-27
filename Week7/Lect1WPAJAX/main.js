console.log("script loaded");
let searchinput = document.querySelector("input.search");
console.log(searchinput);

searchinput.addEventListener("keyup", function() {
 let searchText = searchinput.value;
 let xhr = new XMLHttpRequest();
 let request = "ajax_search.php?query=" + searchText;

 xhr.open(
   "GET",
   request,
   true
 );
 xhr.onload = function(){
   if(this.status == 200) {
     console.log(this.responseText);
    if(this.responseText >= 1) {
      outputsuccess(this.responseText);
    } else if(this.responseText == 0) {
      outputwarning();
    }
   }
 }

 xhr.send();
let outputdiv = document.querySelector(".ajax-output");

function outputwarning() {
  let output = `<div class="alert alert-warning mt-3" role="alert">No Articles were found!</div>`;
  outputdiv.innerHTML = output;
}

function outputsuccess(num) {

  let output = `<div class="alert alert-success mt-3" role="alert">${num} Articles were found!</div>`;
  outputdiv.innerHTML = output;
}

})
