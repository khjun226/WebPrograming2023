<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1번 문제</title>
</head>
<body>
<?php
for ($i = 1; $i <= 5; $i++) {
  for ($j = 1; $j <= $i; $j++) {
    echo chr(64 + $j) . " ";
  }
  echo "<br>";
}

for ($i = 4; $i >= 1; $i--) {
  for ($j = 1; $j <= $i; $j++) {
    echo chr(64 + $j) . " ";
  }
  echo "<br>";
}
?>



</body>
</html>