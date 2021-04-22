<?php
$incform = true;
if(empty($_POST)) {
  echo "There is no form data";
} else {
  var_dump($_POST);
  $incform = false;
}
include 'header.php';

 ?>
<h2>Contact</h2>
<?php
if($incform == true) {
  include 'form.php';
} else {
  echo "<h2>Thank you for submitting the form {$_POST['name']} !!!</h2>";
}

 ?>

<p>Lorem ipsum dolor นั่ง amet, consectetur adipiscing elit, sed tempor และ vitality เพื่อให้แรงงานและความเศร้าโศกบางสิ่งที่สำคัญในการทำ eiusmod ในช่วงหลายปีที่ผ่านมาเธอจะได้เปรียบจากผลใด ๆ การออกกำลังกายของ </p>
  <p>Duis aliquip nostrud ดังนั้นความพยายามในการกระตุ้นหากเขตการศึกษาได้รับการวิพากษ์วิจารณ์ด้วยความพึงพอใจของความปรารถนาที่จะเป็นหนึ่งในความเจ็บปวด cillum ความเจ็บปวดในฟุตบอลกามเทพก่อให้เกิด ไม่มีผลลัพธ์หนีไป กามเทพผิวดำยกเว้นกามเทพเป็นสิ่งที่ผ่อนคลายสำหรับจิตวิญญาณนั่นคือพวกเขาละทิ้งหน้าที่ทั่วไปของผู้ที่ต้องตำหนิสำหรับปัญหาของคุณ</p>

  <?php
  include 'footer.php';
   ?>
