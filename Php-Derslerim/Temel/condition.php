<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Php (conditions) Lessons</title>
</head>

<body style="font-size:22px ;">
    <div class="p-5">
        <div class="alert alert-success">
            <?php

            if (date("h") == 4) {
                echo "namaz vaktine 40 dakika var";
            } elseif (date("h") == 3) {
                echo "namaz vaktine 1 saat var";
            }


            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        console.log("merhaba");
    </script>
</body>

</html>