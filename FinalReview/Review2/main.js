let tasktable = document.querySelector("table");

tasktable.addEventListener("click", function(e) {
  console.log(e.target);
  if(e.target.classList.contains("completed")) {
    console.log("compted");
    completeTask(e.target);
  }
})

function completeTask(el) {
  let task_id = el.getAttribute("data-task-id");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "func/ajaxmanager.php", true)
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if(this.status == 200) {
      console.log(this.responseText);
      let task = el.closest("tr").firstChild.classList.add("finished");
    }
  }
  xhr.send("task_id="+task_id);
}
