<?php require_once 'pages/header.php'; ?>

<div class="row m-0 m-0">
  <div class="col-lg-2 col-md-3 p-0">
    <?php require_once 'pages/AdminNavbar.php'; ?>
  </div>

  <div class="col-lg-10 col-md-9">
    <div class="container mt-5">
      <h1>Members</h1>

      <div class="card my-3">
        <div class="card-body">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal">
            Add Member
          </button>
        </div>
      </div>


      <div class="card">
        <div class="card-body">
          <table class="table border table-hover" id="example">
            <thead>
              <tr>
                <th scope="col" class="thead-font">Member ID</th>
                <th scope="col" class="thead-font">Member Name</th>
                <th scope="col" class="thead-font">Member Lastname</th>
                <th scope="col" class="thead-font">Member Email</th>
                <th scope="col" class="thead-font">Member Addtime</th>
                <th scope="col" class="thead-font">Member Gender</th>
                <th scope="col" class="thead-font">Member Display</th>
                <th scope="col" class="thead-font">Actions</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $members = $db->getRows("SELECT * FROM members");
              foreach ($members as $values) {
              ?>
                <tr>
                  <td><?= $values->MemberID; ?></td>
                  <td><?= $values->MemberName; ?></td>
                  <td><?= $values->MemberLastname; ?></td>
                  <td><?= $values->MemberEmail; ?></td>
                  <td><?= $values->AddTime; ?></td>
                  <td><?= $values->MemberGender; ?></td>
                  <td><?= $values->MemberDisplay; ?></td>
                  <td>
                    <a href="members.php?ID=<?= $values->MemberID ?>" type="button" data-bs-toggle="modal" data-bs-target="#update-modal" class="btn btn-outline-primary rounded-circle py-2">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger rounded-circle py-2"><i class="bi bi-x-lg"></i></button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>

</div>

<?php require_once 'pages/footer.php'; ?>

<div class="modal fade" id="add-modal" data-bs-backdrop="static">
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
            <label class="col-md-3 col-form-label" for="MemberGender">Member Gender</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="MemberGender" id="MemberGender">
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
              <button class="btn btn-success w-25" type="button" onclick="fillForm('myForm','InsertMember')">Add<span class="myload"></span></button>
              <button class="btn btn-danger w-25" type="button" id="close" data-bs-dismiss="modal">İptal</button>
            </div>
          </div>

        </form>



      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="update-modal" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Güncelle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" id="updateForm">
          <?php
          $ID = $_GET['ID'];
          $updateMembers = $db->getRow("SELECT * FROM members where MemberID=?", array($ID));

          ?>
          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberName">Member Name</label>
            <div class="col-md-9">
              <input type="name" class="form-control" value="<?= $updateMembers->MemberName; ?>" placeholder="Enter Name" name="MemberName" id="MemberName">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberLastname">Member Lastname</label>
            <div class="col-md-9">
              <input type="text" class="form-control" value="<?= $updateMembers->MemberLastname; ?>" name="MemberLastname" id="MemberLastname">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberEmail">Member Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" value="<?= $updateMembers->MemberEmail; ?>" name="MemberEmail" id="MemberEmail">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberGender">Member Gender</label>
            <div class="col-md-9">
              <input type="text" class="form-control" value="<?= $updateMembers->MemberGender; ?>" name="MemberGender" id="MemberGender">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label" for="MemberDisplay">Member Display</label>
            <div class="col-md-9">
              <input type="text" class="form-control" value="<?= $updateMembers->MemberDisplay; ?>" name="MemberDisplay" id="MemberDisplay">
            </div>
          </div>

          <div class="my-3 row">
            <label class="col-md-3 col-form-label"></label>
            <div class="col-md-9">
              <button class="btn btn-success w-25" type="button" onclick="fillForm('myForm','InsertMember')">Add<span class="myload"></span></button>
              <button class="btn btn-danger w-25" type="button" id="close" data-bs-dismiss="modal">İptal</button>
            </div>
          </div>
        </form>



      </div>

    </div>
  </div>
</div>