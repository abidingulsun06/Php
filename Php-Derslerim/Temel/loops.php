<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Php (loops) Lessons</title>
</head>

<body style="font-size:22px ;">
    <div class="p-5">
        <div class="alert alert-success">
            <?php

            $x = 0;
            $languages = ["php", "Html", "css", "java", "react"];

            // while ($x <= 7) {
            //     echo $x . ".sayı" . "<br>";
            //     $x += 3;
            // }

            // do {
            //     echo $x . ".sayı" . "<br>";
            //     $x++;
            // } while ($x <= 10);

            // echo "<br><br>" . "For döngüsü" . "<BR>";
            // for ($i = 0; $i <= 10; $i++) {
            //     echo $i . ".sayı" . "<br>";
            // }

            foreach ($languages as  $langu) {
                echo $langu . "-";
            }

            //continue döngüyü belirtilen koşulda keser ama döngüye devam eder
            //break döngüyü belirtilen koşula göre keser devam etmez

            for ($i = 0; $i <= 10; $i++) {
                if ($i == 5) {
                    continue;
                }
                echo "sayi: $i <br>";
            }


            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>