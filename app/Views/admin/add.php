  <section id="project">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Add Project</h2>
          <hr class="hr">
          <p class="lead" loading="lazy">
          <?=form_open_multipart('projectd/save', ['class' => 'form-tambah', 'id' => 'formtambah'])?>
            <div class="form-group">
              <label for="inputKode">Kode Project</label>
              <input type="text" id="inputKode" name="kode" class="form-control" placeholder="Kode Project Anda ..." maxlength="6" placeholder="Kode Project Anda ..." required>
            </div>
            <div class="form-group">
              <label for="inputNama">Nama Project</label>
              <input type="text" id="inputNama" name="nama" class="form-control" placeholder="Nama Project Anda ..." maxlength="80" placeholder="Nama Project Anda ..." required>
            </div>
            <div class="form-group">
              <label for="inputMulai">Mulai Project</label>
              <input type="date" id="inputMulai" name="mulai" class="form-control" placeholder="Mulai Project Anda ..." placeholder="Mulai Project Anda ..." required>
            </div>
            <div class="form-group">
              <label for="inputSelesai">Selesai Project</label>
              <input type="date" id="inputSelesai" name="selesai" class="form-control" placeholder="Selesai Project Anda ..." placeholder="Selesai Project Anda ..." required>
            </div>
            <div class="form-group">
              <label for="inputFolder">Folder Project</label>
              <input type="text" id="inputFolder" name="folder" class="form-control" placeholder="Folder Project Anda ..." maxlength="30" placeholder="Folder Project Anda ..." required>
            </div>
            <div class="form-group">
              <label for="inputLevel">Level Project</label>
              <select id="inputLevel" name="level" class="form-control" required>
                <option>--- Pilih Level Project ---</option>
                <option value="Web">Web</option>
                <option value="Android">Android</option>
                <option value="Desain">Desain</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputGambar">Gambar Project</label>
              <input type="file" id="inputGambar" name="gambar" class="form-control" required>
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