</div>
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/vanilla-toast.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  var SITE_URL = '<?= URL ?>';

  $(function() {
    $(".sortable").sortable({
      cursor: "move",
      opacity: 0.7,
      axis: "y",
      update: function(event, ui) {
        var myData = $(this).sortable('serialize');
        $.ajax({
          type: 'POST',
          url: SITE_URL + '/MyAjax.php?mypage=sort',
          data: {
            'list': myData
          },
          dataType: 'text',
          success: function(data) {
            $('#result').html(data);
            vt.success('Sıralama Güncellendi', {
              position: 'top-center',
              duration: 1750
            });
          }
        })
      }
    });

    $(".sortable").disableSelection();

  });
</script>

</body>

</html>