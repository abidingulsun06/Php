</div>
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/vanilla-toast.js"> </script>
<script src="./js/baguetteBox.min.js"></script>
<script src="./js/printThis.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

<script>
  var SITE_URL = '<?= URL ?>';
  Dropzone.autoDiscover = false;
  $(document).ready(function() {
    $("#loadfile").dropzone({
      url: SITE_URL + '/MyAjax.php?mypage=filesUpMulti',
      method: 'post',
      //çoklu dosya yükleme 
      uploadMultiple: true,
      parallelUploads: 100,
      //maxFiles: 1,
      paramName: 'myFile',
      addRemoveLinks: true,
      autoProcessQueue: true,
      dictDefaultMessage: 'Dosyalarınızı yüklemek için buraya sürükleyin',
      dictRemoveFile: 'Dosyayı kaldır',
      dictCancelUpload: 'Yüklemeyi İptal Et',
      init: function() {
        this.on("sending", function(file, xhr, formData) {
          formData.append("name", $("#test").val());
        });
      },
      success: function(file, response) {
        let message = jQuery.parseJSON(response);
        if (message.warning) {
          vt.warn(message.warning, {
            position: 'top-center',
            duration: 4000,
          });
        } else if (message.danger) {
          vt.error(message.danger, {
            position: 'top-center',
            duration: 4000,
          });
        } else if (message.success) {
          vt.success(message.success, {
            position: 'top-center',
            duration: 14000,
          });
          setTimeout(() => {
            window.location.href = SITE_URL;
          }, 2500);
        }
      }
    });
  });
</script>
</body>

</html>