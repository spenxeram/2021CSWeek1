<?php
$greeting = "Gutentag World";
function greet($greeting) {
  echo "<h1>Today's Greeting is: " . $greeting . "<h1>";
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
<?php
greet("Hello World");
 ?>

   </body>
 </html>
