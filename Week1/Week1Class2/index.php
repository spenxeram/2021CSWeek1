<?php
$lang = "PHP";

function outputLang() {
  global $lang;
  echo "The language is " . $lang;
}

function passLangOutput($lang) {
  echo "The passed variable language is " . $lang;
}

$classmates = [
  "Huyen", "Sam", "Yasuko", "Ran", "Lynn"
];
var_dump($classmates);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <hr>
    <h1>Scope for the language: <span class="lang"> <?php echo $lang ?></span> </h1>
    <h1>Function Scope for the language: <span class="lang"><?php outputLang(); ?></span> </h1>
    <hr>
    <h1>Function Scope for the language: <span class="lang"><?php passLangOutput("Jacascript"); ?></span> </h1>
    <hr>
    <h2>My classmates:</h2>
    <ul>
      <?php
        foreach ($classmates as $classmate) {
          echo "<li>".$classmate."</li>";
        }
       ?>
    </ul>
    <?php
echo "I have this many classmates: " . count($classmates);

     ?>
  </body>
  <script charset="utf-8">
  let lang = "javascript";
  console.log("This is the lang gloabl scope:" + lang);
  outputLang();
  outputLangPass(lang)
  function outputLang() {
    console.log(`This is the language inside a function: ${lang}`);
  }

function outputLangPass(lang) {
    console.log(`This is the language passed to a function: ${lang}`);
  }

  </script>
</html>

<?php
$hello = "Hello World";
echo "I just want to say {$hello}";

 ?>
