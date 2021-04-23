
<?php
include 'includes/header.php';
 ?>
 <h2>Contact</h2>
 <hr>
 <h4>Send us a message</h4>
 <hr>
 <?php
  if(!isset($_POST["submit"])) {
    include 'includes/form.php';
  } else {
    echo "<h1>Thank you for your feedback, " . htmlspecialchars($_POST['name']) . "!</h1>";
    var_dump($_POST);
    if(!isset($_POST['email'])) {
      echo "<h2>You forgot your email!</h2>";
    }
  }
  ?>

 <hr>
<p>Lorem ipsum dolor นั่ง amet, consectetur adipiscing elit, sed tempor และ vitality เพื่อให้แรงงานและความเศร้าโศกบางสิ่งที่สำคัญในการทำ eiusmod ในช่วงหลายปีที่ผ่านมาเธอจะได้เปรียบจากผลใด ๆ การออกกำลังกายของ Duis aliquip nostrud</p>
<p> ดังนั้นความพยายามในการกระตุ้นหากเขตการศึกษาได้รับการวิพากษ์วิจารณ์ด้วยความพึงพอใจของความปรารถนาที่จะเป็นหนึ่งในความเจ็บปวด cillum ความเจ็บปวดในฟุตบอลกามเทพก่อให้เกิด ไม่มีผลลัพธ์หนีไป กามเทพผิวดำยกเว้นกามเทพเป็นสิ่งที่ผ่อนคลายสำหรับจิตวิญญาณนั่นคือพวกเขาละทิ้งหน้าที่ทั่วไปของผู้ที่ต้องตำหนิสำหรับปัญหาของคุณ</p>
<?php
include 'includes/footer.php';
 ?>
