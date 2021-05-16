console.log('loaded');
let totalguesterr = 0;
let totalwrong = 0;
let trs = document.querySelectorAll("tr");
for (var i = 1; i < trs.length; i++) {
  let tds = trs[i].querySelectorAll("td");
  let mp3showdate = tds[4];
  let tssshowdate = tds[3];
  let winguest = tds[2];
  let guestneedle = tds[2].textContent.split(" ");
  let tssguest = tds[5];
  if(tssguest.textContent.search(guestneedle[0]) == -1 && tssguest.textContent.search(guestneedle[1]) == -1) {
    winguest.style.background = "orange";
    tssguest.style.background = "orange";
    totalguesterr++;
  }
  if(mp3showdate.textContent.substr(8,10) != tssshowdate.textContent) {
    mp3showdate.style.background = "yellow";
    tssshowdate.style.background = "yellow";
    totalwrong++;
  }
}
alert("Total wrong dates: " + totalwrong + " | Total wrong guests: " + totalguesterr);
