<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Php (Numbers) Dersleri</title>
</head>

<body style="font-size:22px ;">
    <div class="p-5">
        <div class="alert alert-success">
            <?php
            /* 
                $x = 7; //string
                $y = 7; //int

                if ($x <> $y) {
                    echo "Koşul sağlandı...";
                } else {
                    echo "Koşul sağlanamadı...";
                }

                echo "<br><br>";

                if ($x <= $y) {
                    echo "Koşul sağlandı...";
                } else {
                    echo "Koşul sağlanamadı...";
                }

                echo "<br><br>";

                switch ($x <=> $y) {
                    case -1:
                        echo $x . " sayısı " . $y . " sayısından kücük";
                        break;
                    case 0:
                        echo   $x . " sayısı " . $y . " sayısına eşittir";
                        break;
                    case 1:
                        echo   $x . " sayısı " . $y . " sayısından büyüktür";
                        break;
                }
            */
            //xor operatörü bir koşul verirken biri doğru diğeri yanlış
            //olduğu zaman koşulu gerçekleştirir
            $kullanıcıAdi = "abidin";
            $password = "12345";
            $d = "Hello";
            $t = " Php";
            $userName = "abidin";
            $userPass = "1";
            $arr = ["a" => "Kırmızı", "b" => "siyah"];
            $arr2 = ["c" => "beyaz", "d" => "mavi"];

            if ($kullanıcıAdi == $userName xor $password == $userPass) {
                echo "Giriş gerçekleşti hoş geldiniz";
            } else {
                echo "Kullanıcı adı yada sifre hatalıdır";
            }
            echo "<br><br>";


            //.= operatörü bir stringe başka bir string veriyi aktarır
            $d .= $t;
            echo $d;


            print_r($arr + $arr2);
            echo  "<br><br>";

            define('user', 'abidinglsn');
            $user = "abidinglsn";

            //empty boşmu dolumu olduğunu gösterir eğer user boş !empty değilse 
            //$userı yazdır boşsa Kayıt bulunamadı yazdır
            if (!empty(user)) {
                echo user;
            } else {
                echo "Kayıt bulunamadı";
            }

            echo  "<br><br>";
            //ternary operators
            echo (!empty(user) ? user : "Kayıt bulunamadı") . "<br><br>";

            //?? eğer varsa koşulu gerçekleştir yoksa ?? sonrasını yaz
            echo (user ?? "Kayıt bulunamadı") . "<br><br>";

            echo $_GET["user"] ?? "Kayıt bulunamadı" . "<br><br>";



            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>