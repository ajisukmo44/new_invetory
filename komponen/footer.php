
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- <script src="libraries/jquery/jquery-3.4.1.min.js"></script>
<script src="libraries/bootstrap/js/bootstrap.js"></script>  -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script> 


<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->

  <script>
$(document).ready(function () {
if ($(window).width() > 991){
$('.navbar-light .d-menu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).delay(190).slideUp(100);
    });
    }
});
  </script>

<script type="text/javascript">
 window.onload = function() { jam(); }
 function jam() {
  var e = document.getElementById('jam'),
  d = new Date(), h, m, s;
  h = d.getHours();
  m = set(d.getMinutes());
  s = set(d.getSeconds());
  e.innerHTML = h +':'+ m +':'+ s;
  setTimeout('jam()', 1000);
 }
 function set(e) {
  e = e < 10 ? '0'+ e : e;
  return e;
 }
</script>
</body>
</html>
