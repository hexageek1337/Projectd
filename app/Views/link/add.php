  <section id="safelink">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Add Safelink</h2>
          <hr class="hr">
          <p class="lead">
          <?=form_open('link/save', ['class' => 'form-tambah', 'id' => 'formtambah'])?>
            <div class="form-group">
              <label for="inputNama">Nama Safelink</label>
              <input type="text" id="inputNama" name="nama" class="form-control" placeholder="Nama Safelink Anda ..." maxlength="80" required>
            </div>
            <div class="form-group">
              <label for="inputSlug">Slug Safelink</label>
              <input type="text" id="inputSlug" name="slug" class="form-control" placeholder="Slug Safelink Anda ..." required>
            </div>
            <div class="form-group">
              <label for="inputURL">URL Safelink</label>
              <input type="text" id="inputURL" name="url" class="form-control" placeholder="URL Safelink Anda ..." required>
            </div>
            <div class="form-group">
              <?=$recaptchaWidget?>              
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          <?=form_close()?>
          </p>
        </div>
      </div>
    </div>
  </section>