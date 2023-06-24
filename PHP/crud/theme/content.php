<?php //echo !defined("Sifirdanphp1.?") ? die("Buraya ulaşma yetkiniz yoktur") : ''; 
require_once "../core/init.php";
$page = empty(strip_tags($_GET['page'])) ? 1 : strip_tags($_GET['page']);
$limit = 4;;
$startLimit = ($page * $limit) - $limit;
$totalRecord = $db->getColumn("SELECT COUNT(*) FROM members WHERE MemberDisplay=?", array(1));
$pageNumber = ceil($totalRecord / $limit);
?>

<div class="modal fade" id="exampleModal" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Ekle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" id="myForm">
          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberName">Member Name</label>
            <div class="col-md-9">
              <input type="name" class="form-control" placeholder="Enter Name" name="MemberName" id="MemberName">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberLastname">Member Lastname</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="MemberLastname" id="MemberLastname">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberEmail">Member Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" name="MemberEmail" id="MemberEmail">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberPassword">MemberPassword</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="MemberPassword" id="MemberPassword">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberGender">Member Gender</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="MemberGender" id="MemberGender">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberPicture">Member Picture</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="MemberPicture" id="MemberPicture">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberDisplay">Member Display</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="MemberDisplay" id="MemberDisplay">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label"></label>
            <div class="col-md-9">
              <button class="btn btn-success w-25" type="button" onclick="FillForm('myForm','InsertMember')">Add<span class="myload"></span></button>
              <button class="btn btn-danger w-25" type="button" id="close" data-bs-dismiss="modal">İptal</button>
            </div>
          </div>

        </form>



      </div>

    </div>
  </div>
</div>

<div class="card">
  <div class="card-body p-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ekle</button>
  </div>
</div>


<div class="row mt-4">
  <table class="table table-responsive" id="table-container">
    <!-- datatable atif için id="example" -->
    <thead class="bg-dark text-white">
      <tr>
        <th>Member Picture</th>
        <th>Member Name</th>
        <th>Member Lastname</th>
        <th>Member Email</th>
        <th>Member Display</th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>

      <?php
      //ligthboxu aktif için resimleri link tagı içine alıp yolunu belirtmemiz yeterli birde photoGallery ekleyerek çalıştırırız
      $members = $db->getRows("SELECT * FROM members where MemberDisplay=? order by MemberID asc LIMIT ?,?", array(1, $startLimit, $limit));
      foreach ($members as $values) {
        //'<td class="photoGallery">
        // <a href="' . URL . '\/images/' . $values->MemberPicture . '">
        //   <img src="' . URL . '\/images/' . $values->MemberPicture . '" style="width:60px;">
        // </a>
        //</td>';
        echo '<tr id="Member_' . $values->MemberID . '" class="py" >';
        echo $values->MemberGender == 'M' ?
          '<td class="photoGallery"> 
            <a href="' . URL . '\/images/' . $values->MemberPicture . '">
              <img src="' . URL . '\/images/' . $values->MemberPicture . '" style="width:60px;">
            </a>
          </td>'
          :
          '<td class="photoGallery">
            <a href="./images/women.png">
             <img src="./images/women.png" style="width:60px;"> 
            </a>
           </td>';
        echo  '<td>' . $values->MemberName . '</td>';
        echo  '<td>' . $values->MemberLastname . '</td>';
        echo  '<td>' . $values->MemberEmail . '</td>';
        echo  '<td>' . $values->MemberDisplay . '</td>';
        echo '<td>
                <a href="crud/update.php?ID=' . $values->MemberID . '" 
                class="btn update btn-outline-primary rounded-circle py-2">
                <i class="bi bi-pencil-square"></i>
                </a>
              </td>';
        echo  '<td>
               <a href="javascript:void(0)" 
                 class="del btn rounded-circle py-2 btn-outline-danger" 
                 data-id="' . $values->MemberID . '" 
                 data-operation="MemberDel">
                 <i class="bi bi-x-lg"></i>
               </a>
              </td>';
        echo '</tr>';
      }
      ?>
    </tbody>

  </table>
</div>

<div class="d-flex justify-content-center">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="http://localhost/PHP/crud/sayfa/1">En Başa Dön</a></li>
      <?php
      $lastPage = $pageNumber;
      if ($page > 1) {
        $newPage = $page - 1;
        echo '<li class="page-item"><a class="page-link" href="http://localhost/PHP/crud/sayfa/' . $newPage . '">Geri</a></li>';
      } else {
        echo '<li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Geri</a></li>';
      }

      $record = 2;
      for ($i = $page - $record; $i <= $page + $record; $i++) {
        if ($i > 0 and $i <= $pageNumber) {
          if ($i == $page) {
            echo  '<li class="page-item active"><a class="page-link" href="http://localhost/PHP/crud/sayfa/' . $i . '">' . $i . '</a></li>';
          } else {
            echo  '<li class="page-item"><a class="page-link" href="http://localhost/PHP/crud/sayfa/' . $i . '">' . $i . '</a></li>';
          }
        }
      }

      if ($page != $pageNumber) {
        $newPage = $page + 1;
        echo '<li class="page-item"><a class="page-link" href="http://localhost/PHP/crud/sayfa/' . $newPage . '">ileri</a></li>';
      } else {
        echo '<li class="page-item disabled"><a class="page-link" href="javascript:void(0)">ileri</a></li>';
      }

      ?>
      <li class="page-item"><a class="page-link" href="http://localhost/PHP/crud/sayfa/<?= $lastPage; ?>">En Sona Git</a></li>


    </ul>
  </nav>
</div>

<div class="d-flex">
  <button class="btn btn-dark" id="myprint"><i class="bi bi-printer-fill"></i></button>
  <form action="<?= URL ?>/core/excel.php" method="POST">
    <button name="submit" class="btn btn-success btn-sm p-2 mx-2">Exele Aktar <i class="bi bi-file-earmark-excel"></i></button>
  </form>
</div>

<div class="modal fade" id="MemberModal" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Uyarı!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bu Üyeyi Silmek İstediğinize Eminmisiniz <i class="bi bi-question-circle-fill"></i>
        <input type="hidden" name="IDDel" id="IDDel">
        <input type="hidden" name="myOperation" id="myOperation">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Hayır</button>
        <button type="button" class="btn btn-danger" id="SPDel">Sil</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalUpdate" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Güncelle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">


        <button class="btn btn-danger w-25" type="button" data-bs-dismiss="modal">İptal</button>

      </div>

    </div>
  </div>
</div>