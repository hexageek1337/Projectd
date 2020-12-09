  <section id="project" loading="lazy">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2 class="h2">Project</h2>
          <hr class="hr">
          <a href="/projectd/add" class="float-right"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button></a>
            <?php if(isset($error_gagal)){ ?>
            <div class="alert alert-danger" role="alert">
              <p class="lead"><strong>Gagal Kirim!</strong></p>
              Kesalahan :
              <ul>
                <?php if (is_array($error_gagal)) {
                  foreach ($error_gagal as $key => $value): ?>
                <li class="text-black"><?=$key?> : <?=$value?></li>
                <?php endforeach;
                } else {
                  echo $error_gagal;
                } ?>
              </ul>
            </div>
            <?php } elseif (isset($pesan_berhasil)) { ?>
            <div class="alert alert-success" role="alert"><?=$pesan_berhasil?></div>
            <?php } ?>
          <div class="table-responsive" loading="lazy">
            <table width="100%" class="table table-striped table-bordered" id="tabeldata">
              <thead>
                <tr>
                  <th width="30px">No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Mulai</th>
                  <th>Selesai</th>
                  <th>Folder</th>
                  <th>Level</th>
                  <th>Gambar</th>
                  <th colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no=1;

              foreach($data as $row):?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=esc($row['kode_project'])?></td>
                    <td><?=esc($row['nama_project'])?></td>
                    <td><span class="badge badge-danger"><?=esc($row['mulai_project'])?></span></td>
                    <td><span class="badge badge-success"><?=esc($row['selesai_project'])?></span></td>
                    <td><?=esc($row['folder_project'])?></td>
                    <td><span class="badge badge-info"><?=esc($row['level_project'])?></span></td>
                    <td><img src="<?=base_url('uploads/'.esc($row['gambar_project']))?>" alt="<?=esc($row['gambar_project'])?>" title="<?=esc($row['gambar_project'])?>" width="75" height="75"></td>
                    <td><a href="<?=base_url('projectd/detail/'.esc($row['kode_project']))?>" title="Search"><i class="fas fa-search"></i></a></td>
                    <td><a href="<?=base_url('projectd/delete/'.esc($row['kode_project']))?>" title="Delete"><i class="far fa-trash-alt"></i></a></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="safelink" class="bg-primary text-white" loading="lazy">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2 class="h2">Safelink</h2>
          <hr class="hr">
          <a href="/link/add" class="float-right"><button type="button" class="btn btn-light"><i class="fas fa-plus"></i> Add</button></a>
            <?php if(isset($error_gagal)){ ?>
            <div class="alert alert-danger text-white" role="alert">
              <p class="lead"><strong>Gagal Kirim!</strong></p>
              Kesalahan :
              <ul>
                <?php if (is_array($error_gagal)) {
                  foreach ($error_gagal as $key => $value): ?>
                <li class="text-white"><?=$key?> : <?=$value?></li>
                <?php endforeach;
                } else {
                  echo $error_gagal;
                } ?>
              </ul>
            </div>
            <?php } elseif (isset($pesan_berhasil)) { ?>
            <div class="alert alert-success" role="alert"><?=$pesan_berhasil?></div>
            <?php } ?>
          <div class="table-responsive" loading="lazy">
            <table width="100%" class="table table-striped table-bordered text-white" id="tabeldata">
              <thead>
                <tr>
                  <th width="30px">Kode</th>
                  <th>Nama</th>
                  <th>Slug</th>
                  <th>URL</th>
                  <th>Hits</th>
                  <th>Created</th>
                  <th colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach($datasafelink as $rowsafelink):?>
                <tr>
                    <td><?=esc($rowsafelink['kode_safelink'])?></td>
                    <td><?=esc($rowsafelink['nama_safelink'])?></td>
                    <td><span class="badge badge-danger"><?=esc($rowsafelink['slug_safelink'])?></span></td>
                    <td><?=esc($rowsafelink['url_safelink'])?></td>
                    <td><span class="badge badge-success"><?=esc($rowsafelink['hits_safelink'])?></span></td>
                    <td><span class="badge badge-info"><?=esc($rowsafelink['created_safelink'])?></span></td>
                    <td><a class="text-white" href="<?=base_url('link/detail/'.esc($rowsafelink['kode_safelink']))?>" title="Search"><i class="fas fa-search"></i></a></td>
                    <td><a class="text-white" href="<?=base_url('link/delete/'.esc($rowsafelink['kode_safelink']))?>" title="Delete"><i class="far fa-trash-alt"></i></a></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>