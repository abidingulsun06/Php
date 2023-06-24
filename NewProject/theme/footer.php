</div>

<div class="myFooter">My Products Application</div>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>
  SITE_URL = "http://localhost/NewProject"

  function FillForm(FormID, Operation) {

    $(".myload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(':button').prop("disabled", true);

    var myData = $('form#' + FormID).serialize();

    $.ajax({
      type: "POST",
      url: SITE_URL + '/ajax_islemler.php?page=' + Operation,
      data: myData,
      success: function(data) {
        $(".myload").html("");
        $('#mysubmit').prop("disabled", false);

        data = data.split(":::", 3);
        var result = data[0];
        var message = data[1];
        var mistake = data[2];

        if (mistake == 'warning') {
          $("#result").html('<div class="alert alert-warning">' + message + '</div>');
        } else if (mistake == 'danger') {
          $("#result").html('<div class="alert alert-danger">' + message + '</div>');
        } else if (mistake == 'success') {
          $("form").trigger("reset");
          $("#result").html('<div class="alert alert-success">' + message + '</div>');
          $("#tableResult").html(result);
        }
      }
    });
  }
</script>
</body>

</html>