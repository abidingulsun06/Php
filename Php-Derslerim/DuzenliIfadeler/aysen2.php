<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .screen {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      width: 900px;
      height: 900px;
      position: relative;
      margin: 0 auto;
    }

    .screen .bg {
      background: url('ddd.jpeg');
      width: 100%;
      height: 100%;
      background-repeat: no-repeat;
    }

    .logo {
      position: absolute;
      width: 100px;
      height: 100px;
      top: 10px;
      left: 20px;
      z-index: 100;

    }
  </style>
</head>

<body>

  <div class="screen">
    <div class="bg"></div>
    <img class="logo" src="ordu-universitesi-logo.png" alt="">
  </div>



</body>

</html>