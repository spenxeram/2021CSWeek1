<?php
include 'includes/header.php';
 ?>

 <iframe class="mt-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18915.885736270462!2d106.68389179781069!3d10.76806716139139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1c06f4e1dd%3A0x43900f1d4539a3d!2sVietnam%20National%20University%20Ho%20Chi%20Minh%20City%20-%20University%20of%20Science!5e0!3m2!1sen!2s!4v1619142153545!5m2!1sen!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

 <div class="container">
   <h2>Contact Us</h2>
   <hr>
   <div class="row col-2">
     <div class="">
       <img src="https://www.imt-soft.com/Cms_Data/Contents/IMT_Data/Folders/Partners/~contents/DKU2CQF62TKMBK4K/Logo-H-KHTN-002-.png" alt="" style="border-radius:25px;" width="300px">
     </div>
     <div class="">

       <?php
        if(empty($_POST)) {
          include 'includes/form.php';
        } else {
          ##process the form input
          if($_POST['name'] == '') {
            echo "<h2> You forgot to submit your name, please try again!</h2>";
          } else {
            echo "<h2> Thank you for submitting the form {$_POST['name']}!</h2>";
            echo "<p>We will contact you at your email, {$_POST['email']}, as soon as possible!</p>";
            if(isset($_POST['subscribe'])) {
              echo "<h5>Thanks for joing our newsletter as well!</h5>";
            }
          }
        }
        ?>
     </div>
   </div>
 </div>
<?php
include 'includes/footer.php';
 ?>
