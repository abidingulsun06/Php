<script src="../js/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="../js/app.js"></script>
<script>
  var SITE_URL = "http://localhost/Php-Derslerim/JsonVeriTabani";

  $(function() {
    $(document).on('click', '.show-more', function() {
      var ID = $(this).attr("id");
      $(".show-more").prop("disabled", true);
      $(".show-more").html("Yükleniyor...");
      $(".myload").html('<span style="width:4rem; height:4rem;" class="mySpinner spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
      $.ajax({
        url: SITE_URL + "/ajax_islemler.php?page=showRecords",
        method: 'POST',
        data: {
          'ID': ID
        },
        success: function(data) {
          $(".myload").html('');
          $(".show-more").html('Daha fazla göster');
          $(".show-more").prop('disabled', false);
          $("#BtnImage_" + ID).remove();
          $(".gallery-image").append(data);
        }
      })
    })
  })


  function SendForm(FormID, Operation, SendURL = "") {

    $(".myload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $('#mysubmit').prop("disabled", true);

    var myData = $('form#' + FormID).serialize();
    //formda olmayan veriyi göndermek
    //var myData = $('form#' + FormID).serializeArray();
    //myData.push({name:"MemberID",value:4});

    $.ajax({
      type: "POST",
      url: SITE_URL + '/ajax_islemler.php?page=' + Operation,
      data: myData,
      success: function(data) {
        $(".myload").html("");
        $('#mysubmit').prop("disabled", false);
        data = data.split(":::", 2);
        var message = data[0];
        var mistake = data[1];
        if (mistake == 'warning') {
          $("#result").html('<div class="alert alert-warning">' + message + '</div>');
        } else if (mistake == 'danger') {
          $("#result").html('<div class="alert alert-danger">' + message + '</div>');
        } else if (mistake == 'success') {
          $("#result").html('<div class="alert alert-success">' + message + '</div>');

          /*Sayfayı yönlendirmek için
          setTimeout(function() {
            window.location.href = SITE_URL + "/" + SendURL;
          }, 800);*/
        }

        document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random();
        return false;
      }
    });
  }

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

  function myLive() {
    $(document).ready(function() {
      $('.toast').toast('show');
    });
  }

  function RemoveAll(Operation, myID) {
    if (confirm('Kaydı silmek istediğinize emin misiniz?')) {
      $.get(SITE_URL + '/ajax_islemler.php?page=' + Operation, {
        "ID": myID
      }, function(data) {
        data = data.split(":::", 2);
        var message = data[0];
        var mistake = data[1];
        if (mistake == 'success') {
          myLive();
          $("#" + myID).remove();
        }
      });
    }
  }

  $(function() {
    $("#MemberCountry").change(function() {
      var myValue = $(this).val();
      $.ajax({
        type: "post",
        url: SITE_URL + '/ajax_islemler.php?page=fill',
        data: {
          "myID": myValue
        },
        dataType: "text",
        success: function(data) {
          $("#MemberTown").html(data);
        }
      })
    });
    $("#FrmAddMember").on('submit', function(e) {
      e.preventDefault();
      $(".myload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
      $('#mysubmit').prop("disabled", true);
      $.ajax({
        type: "POST",
        url: SITE_URL + '/ajax_islemler.php?page=InsertMember',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          $(".myload").html("");
          $('#mysubmit').prop("disabled", false);
          data = data.split(":::", 2);
          var message = data[0];
          var mistake = data[1];

          if (mistake == 'warning') {
            $("#result").html('<div class="alert alert-warning">' + message + '</div>');
          } else if (mistake == 'danger') {
            $("#result").html('<div class="alert alert-danger">' + message + '</div>');
          } else if (mistake == 'success') {
            $("#result").html('<div class="alert alert-success">' + message + '</div>');
            setTimeout(function() {
              window.location.href = SITE_URL + "/admin.php";
            }, 800);
          }

        }
      });


    })
  });
</script>
</body>

</html>