<?php
include 'includes/header.php';
 ?>

 <iframe class="mt-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18915.885736270462!2d106.68389179781069!3d10.76806716139139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1c06f4e1dd%3A0x43900f1d4539a3d!2sVietnam%20National%20University%20Ho%20Chi%20Minh%20City%20-%20University%20of%20Science!5e0!3m2!1sen!2s!4v1619142153545!5m2!1sen!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

 <div class="container">
   <h2>Contact Us</h2>
   <hr>
   <div class="row col-2">
     <div class="">
       <img src="https://www.imt-soft.com/Cms_Data/Contents/IMT_Data/Folders/Partners/~contents/DKU2CQF62TKMBK4K/Logo-H-KHTN-002-.png" alt="" width="300px">
     </div>
     <div class="">
       <h3>Contact Form</h3>
       <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <label for="name">Your Name</label>
         <input type="text" name="name" value="">
         <label for="email">Email</label>
         <input type="text" name="email" value="">
         <label for="msg">Your Message</label>
         <input type="text" name="msg" value="">
         <label for="subscribe">Join our newsletter</label>
         <input type="checkbox" name="subscribe" value="">
         <button type="submit" name="button">Submit Form</button>
       </form>
     </div>
   </div>
 </div>
<?php
include 'includes/footer.php';
 ?>
