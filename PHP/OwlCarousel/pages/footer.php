</div>
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/vanilla-toast.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  var SITE_URL = '<?= URL ?>';

  $('.personel').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: false,
    autoplayTimeout: 3000,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    nav: false,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })

  $('.nextBtn').on('click', function() {
    $('.personel').trigger('next.owl.carousel', [1000]);
  })

  $('.prevBtn').on('click', function() {
    $('.personel').trigger('prev.owl.carousel', [1000]);
  })
</script>

</body>

</html>