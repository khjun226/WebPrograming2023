<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2번 문제</title>
</head>
<body>
<?php
function revsort(&$arr) {
  sort($arr);
  $arr = array_reverse($arr);
}

$numbers = array(5, 2, 8, 3, 1);
revsort($numbers);

print_r($numbers);
?>

</body>
</html>