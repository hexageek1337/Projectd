  <!-- Footer -->
  <footer class="py-5 bg-primary" loading="lazy">
    <div class="container">
      <p class="m-0 text-center text-white" loading="lazy">Copyright &copy; <?=date('Y')?> <?=$config->title?> by <strong><a class="text-white" href="https://github.com/hexageek1337" target="_blank"><?=$config->author?></a></strong> with <i class="fas fa-heart"></i></p>
    </div>
  </footer>
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <?=form_open('login', ['class' => 'form-login', 'id' => 'formlogin'])?>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="inputUsername">Username</label>
        <input type="text" id="inputUsername" name="username" minlength="5" maxlength="20" class="form-control" placeholder="Username" required>
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" minlength="8" maxlength="30" class="form-control" placeholder="Password" required>
        <hr class="hr">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" value="rememberme" id="rememberCheck">
          <label class="form-check-label" for="rememberCheck">Remember Me</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Batal</button>
        <button type="submit" class="btn btn-primary">Masuk</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script><script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script><script defer src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script defer src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script defer src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script defer type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script><script defer type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script><script defer type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script><script defer type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script><script defer type="text/javascript" src="<?=base_url('assets/js/custom.min.js')?>"></script><script defer type="text/javascript">$(document).ready(function() {$('table.table').DataTable({responsive: true,"lengthChange": true,"lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]]});});</script><script defer src="https://www.googletagmanager.com/gtag/js?id=G-D9EVEM9R82"></script><script>window.dataLayer=window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'G-D9EVEM9R82');</script></body></html>