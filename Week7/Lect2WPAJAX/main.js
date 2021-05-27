console.log("script loaded");
// Get elements to be used
let searchinput = document.querySelector("input.search");

// Event Listeners
searchinput.addEventListener("keyup", function() {
  let searchval = searchinput.value;
  ajaxManager("query", searchval);
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
      console.log(this.responseText);
    }
  }

  xhr.send();
}
// Helper/genderal function
