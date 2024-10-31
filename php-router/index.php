<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/output.css" rel="stylesheet">
</head>

<?php
$name = 'Korkoe';
$checkName = false;

?>


<body class="grid place-items-center h-screen gap-0 m-0">
  <h1 class="text-3xl font-bold  text-blue-400">
    Good day, <?php if($checkName === true){
        echo $name;
    } else{
        echo "Guest";
    } ?>!
</h1>
</body>
</html>