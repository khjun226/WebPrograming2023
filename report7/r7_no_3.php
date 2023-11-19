<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3번 문제</title>
</head>
<body>
<?php
$file = fopen("exam.txt", "r");

if ($file) {
  $lineCount = 0;
  $wordCount = 0;
  $charCount = 0;

  while (($line = fgets($file)) !== false) {
    $lineCount++;
    $wordCount += str_word_count($line);
    $charCount += strlen($line);
  }

  fclose($file);

  echo "줄 수: " . $lineCount . "\n";
  echo "단어 수: " . $wordCount . "\n";
  echo "글자 수: " . $charCount . "\n";
} else {
  echo "파일을 열 수 없습니다.";
}
?>

</body>
</html>