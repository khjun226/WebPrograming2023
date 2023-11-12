<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="post" action="">
            <label for="number">숫자를 입력하세요:</label>
            <input type="text" name="number" id="number">
            <button type="submit">계산</button>
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = intval($_POST["number"]);
        $result = 1;

        while ($input > 1) {
            $result *= $input;
            $input--;
        }

        echo "결과: $result";
    }
    ?>
    </body>
</html>