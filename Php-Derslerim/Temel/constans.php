<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Php (sabitler) Dersleri</title>
</head>

<body style="font-size:22px ;">
    <div class="p-5">
        <div class="alert alert-success">
            <?php

            //Constans böyle çalışır
            define('php', "I love php");
            define('languages', ["HTML", "JAVA", "CSS", "NODE JS", "JAVASCRİPT"]);

            echo php . "<br><br>";
            echo languages[4] . "<br><br>";

            define('test', "Merhaba");
            function myFunc()
            {
                echo test . "<br>";
            }
            myFunc() . "<br>";


            $text = "Hello php";
            $text2 = "7";
            $text3 = 7.5;

            echo "veri: " . ($text) . ": ";
            echo "veri türü " . gettype($text) . "<br>";
            echo "veri: " . ($text2) . ": ";
            echo "veri türü " . gettype($text2) . "<br>";
            echo "veri: " . ($text3) . ": ";
            echo "veri türü " . gettype($text3) . "<br>";

            //$result = (int)$text2;
            settype($text2, "int");
            echo "text2 değişkeni string den int veriye dönüştü veri: " . $text2 . ": ";
            echo "veritürü: " . gettype($text2) . " <br>";


            class c
            {
                public $name = "Abidin Gülsün";
            }
            $message = new c;
            $ad = $message->name;
            echo $ad . "<br>";
            echo "veri türü: " . gettype($message) . "<br>";
            echo "<br>";



            $textType = gettype($text3);
            echo "veri: " . $text3 . "<br>";
            echo "veri türü: " . $textType . "<br>";

            //intval methodu veriyi değiştirir ama türünü değiştirmez boolval ise veriyi booleana çevirir ama türü hala aynı kalır
            echo "veri: " . intval($text3) . "<br>";
            echo "veri: " . boolval($text3) . "<br>";
            echo "veri türü: " . gettype($text3) . "<br>";

            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>