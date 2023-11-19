<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>5번 문제</title>
</head>
<body>
<?php
    $file = fopen("client.txt", "r");
  
    if($file) {
        while (($line = fgets($file)) !== false) {
            $client_info = explode("\t", $line);
            if ($client_info[1] >= 30) {
                echo "이름: $client_info[0], 나이: $client_info[1], 성별: $client_info[2], 이메일: $client_info[3]";
            }
        }
        fclose($file);
    } else 
        echo "파일을 열 수 없습니다.";

?>

</body>
</html>
