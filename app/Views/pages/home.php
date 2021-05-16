  <section id="about" loading="lazy">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="h2">Tentang saya</h2>
          <hr class="hr">
          <p class="lead" loading="lazy">Perkenalkan nama saya <strong>Denny Septian Panggabean</strong>, yang lahir di <strong>Tangerang</strong> pada tanggal <i>30-September-1999</i>. Saya mempunyai kesukaan mengenai teknologi modern seperti desain, pemrograman, jaringan, linux, video editing, dan lain-lain termasuk musik.</p>
          <p class="lead" loading="lazy"><strong>Pendidikan :</strong>
            <ul>
              <li><span class="badge badge-primary">2005 - 2011</span> SDN Cipari 1</li>
              <li><span class="badge badge-primary">2011 - 2014</span> SMPN 1 Panongan</li>
              <li><span class="badge badge-primary">2014 - 2017</span> SMKN 1 Kabupaten Tangerang</li>
              <li><span class="badge badge-primary">2017 - saat ini</span> STMIK Insan Pembangunan</li>
            </ul>
          </p>
          <p class="lead" loading="lazy"><strong>Pekerjaan :</strong>
            <ul>
              <li><span class="badge badge-primary">Magang sebagai IT Helpdesk</span> PT. Ciputra Residence pada <strong>18 Agustus 2015 - 17 Oktober 2015</strong></li>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-primary text-white" loading="lazy">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Apa yang saya tawarkan</h2>
          <hr class="hr">
          <p class="lead" loading="lazy">Saat ini saya siap mengerjakan project pemrograman berbasis web menggunakan PHP baik itu Codeigniter ataupun PHP Native untuk sekolah, perusahaan, dan program skripsi. Selain itu saya juga siap membuat desain bisnis Anda seperti Logo & Kaos.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="project" loading="lazy">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Project</h2>
          <hr class="hr">
          <ul class="nav nav-tabs" id="myTab" role="tablist" loading="lazy">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="web-tab" data-toggle="tab" href="#web" role="tab" aria-controls="web" aria-selected="true">Web</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="desain-tab" data-toggle="tab" href="#desain" role="tab" aria-controls="desain" aria-selected="false">Desain</a>
            </li>
          </ul>
          <br>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="web" role="tabpanel" aria-labelledby="web-tab">
              <div class="table-responsive" loading="lazy">
                <table width="100%" class="table table-striped table-bordered" id="tabelweb">
                  <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;

                  foreach($dataweb as $row):?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=esc($row['kode_project'])?></td>
                        <td><?=esc($row['nama_project'])?></td>
                        <td><span class="badge badge-danger"><?=esc($row['mulai_project'])?></span></td>
                        <td><span class="badge badge-success"><?=esc($row['selesai_project'])?></span></td>
                        <td><a href="<?=base_url('go/'.esc($row['folder_project']))?>" target="_blank"><button type="button" class="btn btn-info" id="btn-demo" title="<?=esc($row['nama_project'])?>" alt="<?=esc($row['nama_project'])?>">Demo</button></a></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="desain" role="tabpanel" aria-labelledby="desain-tab">
              <div class="table-responsive" loading="lazy">
                <table width="100%" class="table table-striped table-bordered" id="tabeldesain">
                  <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;

                  foreach($datadesain as $row):?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=esc($row['kode_project'])?></td>
                        <td><?=esc($row['nama_project'])?></td>
                        <td><span class="badge badge-danger"><?=esc($row['mulai_project'])?></span></td>
                        <td><span class="badge badge-success"><?=esc($row['selesai_project'])?></span></td>
                        <td><a href="<?=base_url('go/'.esc($row['folder_project']))?>" target="_blank"><button type="button" class="btn btn-info" id="btn-demo" title="<?=esc($row['nama_project'])?>" alt="<?=esc($row['nama_project'])?>">Demo</button></a></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <hr>
          <center><a href="https://denny.my.id/go/idcloudhost"><img loading="lazy" src="https://idcloudhost.com/wp-content/uploads/2017/01/IDCloudHost-SSD-Cloud-Hosting-Indonesia-468x60.jpg" height="60" width="468" border="0" alt="IDCloudHost | SSD Cloud Hosting Indonesia" /></a></center>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="bg-primary text-white" loading="lazy">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Kontak saya</h2>
          <hr class="hr">
          <p class="lead" loading="lazy">
            <ul>
              <li><a class="text-white" href="<?=$config->facebook?>"><i class="fab fa-facebook"></i> Facebook</a></li>
              <li><a class="text-white" href="<?=$config->twitter?>"><i class="fab fa-twitter"></i> Twitter</a></li>
              <li><a class="text-white" href="<?=$config->instagram?>"><i class="fab fa-instagram"></i> Instagram</a></li>
              <li><a class="text-white" href="<?=$config->linkedin?>"><i class="fab fa-linkedin"></i> Linkedin</a></li>
              <li><a class="text-white" href="mailto:<?=$config->email?>"><i class="far fa-envelope"></i> Email</a></li>
            </ul>
          </p>
          <hr class="hr">
          <p class="lead" loading="lazy"><span class="h6">atau melalui form dibawah :</span>
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
            <div class="alert alert-success" role="alert">Kirim Pesan berhasil!</div>
            <?php } ?>
          <?=form_open('kontak', ['class' => 'form-contact', 'id' => 'formkontak'])?>
            <div class="form-group">
              <label for="inputNama">Nama</label>
              <input type="text" id="inputNama" name="nama" class="form-control" placeholder="Nama Anda ..." value="<?=$pesan_gagal['nama']?>" required>
            </div>
            <div class="form-group">
              <label for="inputSubject">Subject</label>
              <input type="text" id="inputSubject" name="subject" class="form-control" placeholder="Subject Anda ..." maxlength="30" value="<?=$pesan_gagal['subject']?>" required>
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email Anda ..." value="<?=$pesan_gagal['email']?>" required>
            </div>
            <div class="form-group">
              <label for="inputPesan">Pesan</label>
              <textarea id="inputPesan" name="pesan" class="form-control" required><?=$pesan_gagal['pesan']?></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-light">Kirim</button>
            </div>
          <?=form_close()?>
          </p>
        </div>
      </div>
    </div>
  </section>