 <?php require_once 'init.php';


  $output = "";

  $output .= '
      <table class="table">
        <tr>
          <th>Üye No</th>
          <th>Üye Adı</th>
          <th>Üye Soyadı</th>
          <th>Üye Email</th>
          <th>Üye Eklenme Tarihi</th>
        </tr>
  ';

  if (isset($_POST['submit'])) {
    $members = $db->getRows("SELECT * FROM members");
    foreach ($members as $values) {
      $output .= '
      <tr>
         <td>' . $values->MemberID . '</td>
         <td>' . $values->MemberName . '</td>
         <td>' . $values->MemberLastname . '</td>
         <td>' . $values->MemberEmail . '</td>
         <td>' . $values->AddTime . '</td>
      </tr>';
    }

    $output .= '</table>';

    header('Content-Encoding: UTF-8');
    header('Content-type: text/xls');
    header('Content-Disposition: attachment; filename="rapor.xls"');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: public');
    echo "\xEF\xBB\xBF";

    echo $output;
  } else {
    echo "<div class='container h-100 d-flex justify-content-center mt-5'>";
    echo "<div class='w-100 text-center alert alert-danger'>Gelen veri boş.</div>";
    echo '</div>';
  }

  ?>
