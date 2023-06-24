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
  var SITE_URL = '<?= URL ?>';
  <?php
  $myTime = $db->getColumn("SELECT MyTime FROM timer where TimerID =?", array(1));


  ?>

    (function() {
      const second = 1000;
      minute = second * 60;
      hour = minute * 60;
      day = hour * 24;
      let myTime = '<?= $myTime ?>',
        countDown = new Date(myTime).getTime(),
        x = setInterval(function() {
          let now = new Date().getTime(),
            fark = countDown - now;
          document.getElementById('days').innerText = Math.floor(fark / (day));
          document.getElementById('hours').innerText = Math.floor((fark % day) / (hour));
          document.getElementById('minutes').innerText = Math.floor((fark % hour) / (minute));
          document.getElementById('seconds').innerText = Math.floor((fark % minute) / (second));

          if (0 >= fark) {
            clearInterval(x);
            document.getElementById('countdown').innerHTML = '<span style="font-weigth:bold; font-size:22px;">Süre Doldu </span>';
          }
        }, 0)

    }());
</script>
</body>

</html>