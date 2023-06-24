<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Php (Sessiz harf uygulaması) Lessons</title>
  <style>
    ul {
      list-style-type: none !important;
    }
  </style>
  <link href="../css/main.css" rel="stylesheet">
</head>

<?php require "../functions/safe.php"; ?>
<div class="row p-2">

  <div class="col-lg-6">
    <div class="mt-3 card">
      <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="form-group">
            <label for="">Bir cümle girin</label>
            <input type="text" class="form-control" name="myText">
          </div>
          <button class="btn btn-danger mt-3" type="submit">Gönder</button>
        </form>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="mt-3 card">
      <div class="card-body" style="display: inline;">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $text = $_POST['myText'];
          if (empty($text)) {
            echo '<div class="alert alert-danger mt-3" role="alert">Herhangi bir cümle girmediniz!</div>';
          } else {
            /*
              //$pattern = "/[a-zA-Z0-9.ıİğĞşŞüÜuUçÇÖö ]/ui"; burada ^ olmadıkça tüm harflerı ve karakterleri al anlamına gelir

              //Alabildiğin herşeyi . ile alabilirsin       $pattern = "/./ui";

              //Harf Rakam ve sayıları _ alır               $pattern = "/\w/ui"; Eğer Harf Rakam _ ve sayıları istemiyorsak W kullanırız yani bu sayılanlar dışında herşeyi getirir                                     $pattern = "/\W/ui";

              // \d sadece rakamları alır $pattern = "/\d/ui";
              // \D rakam hariç herşeyi alır $pattern = "/\D/ui";

              //Sadece boşlukları alır $pattern = "/\s/ui";  
              //Boşluklar hariç hepsini alır $pattern = "/\S/ui";

              // $pattern = "/./ui";
              // preg_match_all($pattern, $text, $result);
              // echo "<p>";
              // foreach ($result[0] as $key => $value) {
              //   echo  $value;
              // }
              // echo "</p>";
              // for ($i = 0; $i < count($result); $i++) {
              //   echo "<strong>Satır numarası: $i</strong>";
              //   echo "<ul>";
              //   for ($x = 0; $x < count($result[0]); $x++) {
              //     echo  "<li  style='display: inline;'>" . $result[0][$x] . "</li>";
              //   }
              //   echo "</ul>";
              // }
            */
            //Html etiketlerini silme
            echo $text;
            //? hangi ifadeden sonra geçiyorsa onu 1 kez yada 0 kez kullan anlamındadır
            $pattern = "/<\/?[^>]+>/";
            $replace = "";
            $result = preg_filter($pattern, $replace, $text);
            echo $result;
          }
        }
        ?>
      </div>
    </div>
  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
<script src="../js/app.js"></script>
</body>

</html>