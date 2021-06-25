let tasktable = document.querySelector("table");
tasktable.addEventListener("click", function(e) {
  e.preventDefault();
  console.log(e.target);
  if(e.target.classList.contains("delete")) {
    deleteTask(e.target);
  } else if (e.target.classList.contains("complete")) {
    completeTask(e.target)
  }
})

function completeTask(el) {
  let row = el.closest("tr");
  row.children[1].style = "text-decoration:line-through; color:grey";
}
