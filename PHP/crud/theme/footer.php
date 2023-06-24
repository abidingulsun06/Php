</div>
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/vanilla-toast.js"> </script>
<script src="./js/baguetteBox.min.js"></script>
<script src="./js/printThis.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

<script>
  var site_url = '<?= URL ?>';

  function FillForm(FormID, Operation) {

    $(".myload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(':button').prop("disabled", true);

    var myData = $('form#' + FormID).serialize();
    $.ajax({
      type: "POST",
      url: site_url + '/MyAjax.php?mypage=' + Operation,
      data: myData,
      dataType: 'json',
      success: function(data) {
        $(".myload").html("");
        $(':button').prop("disabled", false);

        if (data.danger) {
          vt.error(data.danger, {
            position: "bottom-center",
            duration: 5000
          });
        } else if (data.warning) {
          vt.warn(data.warning, {
            position: "bottom-center",
            duration: 5000
          });
        } else if (data.success) {
          vt.success(data.success, {
            position: "bottom-center",
            duration: 5000
          });
          $('form').trigger("reset");
          $('#exampleModal').modal('hide')
        }
      }
    });
  }


  $(function() {
    $(".del").click(function(e) {
      e.preventDefault();
      let ID = $(this).attr('data-id');
      let Operation = $(this).attr('data-operation');
      $("#MemberModal").modal('show');
      $("#IDDel").val(ID);
      $("#myOperation").val(Operation);
    });

    $("#SPDel").click(function() {
      $('#MemberModal').modal('hide');
      var ID = $("#IDDel").val();
      var Operation = $("#myOperation").val()
      $.ajax({
        type: 'POST',
        url: site_url + '/MyAjax.php?mypage=' + Operation,
        data: {
          "ID": ID
        },
        dataType: 'json',
        success: function(data) {
          if (data.danger) {
            vt.error(data.danger, {
              position: "bottom-center",
              duration: 5000
            });
          } else if (data.success) {
            vt.success(data.success, {
              position: "bottom-center",
              duration: 5000
            });
            $("#Member_" + ID).remove()
          }

        }
      }); //ajax sonu

    });

    $('#example').DataTable();

    $('#myprint').on('click', function() {
      $("#example").printThis();
    });

    //butonları disable etme buttons: false
    baguetteBox.run('.photoGallery', {
      animation: 'fadeIn',
      noScrollbars: true
    });

  });
</script>

</body>

</html>