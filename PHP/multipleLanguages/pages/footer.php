</div>
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

  function ChangeLang(myLang) {
    $.ajax({
      url: SITE_URL + '/MyAjax.php?mypage=language',
      type: 'POST',
      data: {
        'dil': myLang
      },
      success: function(data) {
        window.location.href = SITE_URL + '/multipleLanguages/';
      }
    })
  }
</script>
</body>

</html>