<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    table,
    tr,
    th,
    td {
      padding: 20px !important;
      font-size: 14px !important;
      text-align: left;
    }

    ::-webkit-scrollbar {
      width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
  <title>Php (Http durum kodları) </title>
</head>

<body style="font-size:22px ;" class="alert alert-dark border-0">
  <div class="alert alert-secondary border-0">
    <div class="p-5">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Http durum kodları</th>
            <th scope="col">Durum</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>200</td>
            <td>Başarılı istek</td>
          </tr>
          <tr>
            <td>301</td>
            <td>Url yönlendirme başarılı</td>
          </tr>
          <tr>
            <td>302</td>
            <td>Url yönlendirme başarılı geçici olarak bir başlığa taşır</td>
          </tr>
          <tr>
            <td>304</td>
            <td>Yeniden istenilen veriyi zaten sende olduğunu söyler</td>
          </tr>
          <tr>
            <td>400</td>
            <td>Alınan isteğin yanlış olduğunu söyler</td>
          </tr>
          <tr>
            <td>401</td>
            <td>Yetkiniz yok...</td>
          </tr>
          <tr>
            <td>403</td>
            <td>Yetkiniz yok...</td>
          </tr>
          <tr>
            <td>404</td>
            <td>Hatalı bir yönlendirme sonucunda bize dönen hata kodu</td>
          </tr>
          <tr>
            <td>500</td>
            <td>İsteğin beklenmedik bir hatadan ötürü dönen kod</td>
          </tr>
          <tr>
            <td>501</td>
            <td>Gerken gereksinimleri desteklemez (server ile alakalı)</td>
          </tr>
          <tr>
            <td>503</td>
            <td>geçici olarak siteye ulaşılmadığından çıkar yada sunucuya çok yüklenilirse çıkan sorundur</td>
          </tr>
        </tbody>
      </table>


      <?php




      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>