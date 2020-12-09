  <!-- Footer -->
  <footer class="py-5 bg-primary">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; <?=date('Y')?> <?=$config->title?> by <strong><a class="text-white" href="https://github.com/hexageek1337" target="_blank"><?=$config->author?></a></strong> with <i class="fas fa-heart"></i></p>
    </div>
  </footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script defer src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script defer src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script defer type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<?=$recaptchaScript?>
<script defer type="text/javascript" src="<?=base_url('assets/js/custom.min.js')?>"></script>
<script defer type="text/javascript">
$(document).ready(function() {
  $('table.table').DataTable({
    responsive: true,
    "lengthChange": true,
    "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]]
  });
});
</script>
</body>
</html>