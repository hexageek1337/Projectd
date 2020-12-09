  <section id="project">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Detail Project</h2>
          <hr class="hr">
          <p class="lead" loading="lazy">
          <?=form_open_multipart('projectd/update', ['class' => 'form-detail', 'id' => 'formdetail'])?>
            <div class="form-group">
              <label for="inputKode">Kode Project</label>
              <input type="text" id="inputKode" name="kode" class="form-control" placeholder="Kode Project Anda ..." maxlength="6" value="<?=esc($data->kode_project)?>" required readonly>
            </div>
            <div class="form-group">
              <label for="inputNama">Nama Project</label>
              <input type="text" id="inputNama" name="nama" class="form-control" placeholder="Nama Project Anda ..." maxlength="80" value="<?=esc($data->nama_project)?>" required>
            </div>
            <div class="form-group">
              <label for="inputMulai">Mulai Project</label>
              <input type="date" id="inputMulai" name="mulai" class="form-control" placeholder="Mulai Project Anda ..." value="<?=esc($data->mulai_project)?>" required>
            </div>
            <div class="form-group">
              <label for="inputSelesai">Selesai Project</label>
              <input type="date" id="inputSelesai" name="selesai" class="form-control" placeholder="Selesai Project Anda ..." value="<?=esc($data->selesai_project)?>" required>
            </div>
            <div class="form-group">
              <label for="inputFolder">Folder Project</label>
              <input type="text" id="inputFolder" name="folder" class="form-control" placeholder="Folder Project Anda ..." maxlength="30" value="<?=esc($data->folder_project)?>" required>
            </div>
            <div class="form-group">
              <label for="inputLevel">Level Project</label>
              <select id="inputLevel" name="level" class="form-control" required>
                <option>--- Pilih Level Project ---</option>
                <option value="Web" <?php if (esc($data->level_project) === 'Web') { echo "selected"; } ?>>Web</option>
                <option value="Android" <?php if (esc($data->level_project) === 'Android') { echo "selected"; } ?>>Android</option>
                <option value="Desain" <?php if (esc($data->level_project) === 'Desain') { echo "selected"; } ?>>Desain</option>
              </select>
            </div>
            <div class="form-group">
              <img loading="lazy" src="<?=base_url('uploads/'.esc($data->gambar_project))?>" alt="<?=esc($data->gambar_project)?>" title="<?=esc($data->gambar_project)?>" width="150" height="150">
              <hr class="hr">
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