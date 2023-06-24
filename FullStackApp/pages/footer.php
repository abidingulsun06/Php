<script src="./js/jquery-3.6.1.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/vanilla-toast.js"> </script>
<script src="./js/baguetteBox.min.js"></script>
<script src="./js/printThis.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script>
  var SITE_URL = '<?= URL ?>';


  function sendForm(FormID, Operation) {

    $(".myload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(':button').prop("disabled", true);
    var myData = $('form#' + FormID).serialize();
    $.ajax({
      type: "POST",
      url: SITE_URL + '/MyAjax.php?mypage=' + Operation,
      data: myData,
      dataType: 'json',
      success: function(data) {
        $(".myload").html("");
        $(':button').prop("disabled", false);
        console.log(myData);
        if (data.warning) {
          vt.warn(data.warning, {
            position: "top-center",
            duration: 6000
          });

        } else if (data.danger) {
          vt.error(data.danger, {
            position: "top-center",
            duration: 6000
          });

        } else if (data.success) {
          vt.success(data.success, {
            position: "top-center",
            duration: 3000
          });

          setTimeout(function() {
            window.location.href = SITE_URL + '/admin.php';
          }, 100);
        }
      }
    });
  }


  function fillForm(FormID, Operation) {
    console.log(getCookie("access_toke"))
    $(".myload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(':button').prop("disabled", true);
    var myData = $('form#' + FormID).serialize();
    $.ajax({
      type: "POST",
      url: SITE_URL + '/MyAjax.php?mypage=' + Operation,
      data: myData,
      dataType: 'json',
      success: function(data) {
        $(".myload").html("");
        $(':button').prop("disabled", false);
        console.log(myData);
        if (data.warning) {
          vt.warn(data.warning, {
            position: "top-center",
            duration: 6000
          });

        } else if (data.danger) {
          vt.error(data.danger, {
            position: "top-center",
            duration: 6000
          });

        } else if (data.success) {
          vt.success(data.success, {
            position: "top-center",
            duration: 3000
          });

          setTimeout(function() {
            window.location.href = SITE_URL + '/members.php';
          }, 0);

          $('#add-modal').modal('hide');
          $('#myForm').trigger('reset');
        }
      }
    });
  }

  $('#example').DataTable({
    autoFill: true
  });
</script>
</body>

</html>