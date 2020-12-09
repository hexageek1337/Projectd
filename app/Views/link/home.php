  <section id="safelink">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2 class="h2">Safelink</h2>
          <hr class="hr">
          <a href="/link/add" class="float-right"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button></a>
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
          <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered" id="tabeldata">
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
              foreach($data as $row):?>
                <tr>
                    <td><?=esc($row['kode_safelink'])?></td>
                    <td><?=esc($row['nama_safelink'])?></td>
                    <td><span class="badge badge-danger"><?=esc($row['slug_safelink'])?></span></td>
                    <td><?=esc($row['url_safelink'])?></td>
                    <td><span class="badge badge-success"><?=esc($row['hits_safelink'])?></span></td>
                    <td><span class="badge badge-info"><?=esc($row['created_safelink'])?></span></td>
                    <td><a href="<?=base_url('link/detail/'.esc($row['kode_safelink']))?>" title="Search"><i class="fas fa-search"></i></a></td>
                    <td><a href="<?=base_url('link/delete/'.esc($row['kode_safelink']))?>" title="Delete"><i class="far fa-trash-alt"></i></a></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>