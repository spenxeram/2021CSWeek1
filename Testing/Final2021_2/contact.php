<?php
include 'header.php';
//var_dump($GLOBALS);
var_dump(basename($_SERVER['PHP_SELF']));
 ?>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3111.018374187795!2d106.68236427156977!3d10.762359707450416!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1c06f4e1dd%3A0x43900f1d4539a3d!2sVietnam%20National%20University%20Ho%20Chi%20Minh%20City%20-%20University%20of%20Science!5e0!3m2!1sen!2s!4v1618476713436!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<div class="container">
  <hr>
  <h2>Our Staff</h2>
  <div class="row">


    <?php
    $staff =[
      "Manager" => "Mike Jenkins",
      "Assistant Manager" => "Emily Martin",
      "CEO" => "Thomas Dinger",
      "Secretary" => "Jill Halsworth"
    ];

    foreach ($staff as $key => $value) {
      echo '<div class="col-md-6 mt-3 mb-3"><div class="card">
        <div class="card-body">
          <h5 class="card-title">'. $value . '</h5>
          <h6 class="card-subtitle mb-2 text-muted">' . $key . '</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div></div>';
    }
     ?>
    <hr>
  </div>

</div>
<?php
include 'footer.php';
 ?>
