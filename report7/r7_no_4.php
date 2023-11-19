<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4번 문제</title>
</head>
<body>
<?php
$people = array(
  'Kim' => 'Seoul',
  'Lee' => 'Pusan, Daegu',
  'Choi' => 'Inchon',
  'Park' => 'Suwon, Daejon',
  'Jung' => 'Kwangju, Chunchon, Wonju'
);

unset($people['Choi']);

foreach ($people as $name => $city) {
  echo $name . ": " . $city . "\n";
}
?>

</body>
</html>