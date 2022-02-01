      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manejemen Ongkir</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Ongkir</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Manejemen Ongkir</h2>
                  <p class="section-lead">
                      Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.
                  </p>

                  <div class="row">

                      <div class="col-12 col-md-6 col-lg-6">
                          <form method="POST" action="<?php echo site_url('Jasa_Pengiriman/save_ongkir'); ?>">
                              <div class="card">
                                  <div class="card-header">
                                      <h4>Form Ongkir</h4>
                                  </div>
                                  <div class="card-body">
                                      <?php if (!empty($this->session->flashdata('pesan'))) {; ?>
                                          <div class="alert alert-warning alert-dismissible show fade">
                                              <div class="alert-body">
                                                  <button class="close" data-dismiss="alert">
                                                      <span>&times;</span>
                                                  </button>
                                                  <?php echo $this->session->flashdata('pesan'); ?>
                                              </div>
                                          </div>
                                      <?php } ?>

                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Pilih Kurir</label>
                                          <div class="col-sm-9">
                                              <select class="form-control form-control-sm" name="idKurir">
                                                  <option value="0">-Pilih Kurir-</option>
                                                  <?php foreach ($kurir as $val) { ?>
                                                      <option value="<?php echo $val->idKurir ?><?= set_value('idKurir'); ?>"><?= form_error('idKurir', '<div class="text-danger small">', '</div>'); ?><?php echo $val->namaKurir; ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Kota Asal</label>
                                          <div class="col-sm-9">
                                              <select class="form-control form-control-sm" name="idKotaAsal">
                                                  <option value="0">-Pilih Kota Asal-</option>
                                                  <?php foreach ($kota as $val) { ?>
                                                      <option value="<?php echo $val->idKota ?><?= set_value('idKotaAsal'); ?>"><?= form_error('idKotaAsal', '<div class="text-danger small">', '</div>'); ?><?php echo $val->namaKota; ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Kota Tujuan</label>
                                          <div class="col-sm-9">
                                              <select class="form-control form-control-sm" name="idKotaTujuan">
                                                  <option value="0">-Pilih Kota Tujuan-</option>
                                                  <?php foreach ($kota as $val) { ?>
                                                      <option value="<?php echo $val->idKota ?><?= set_value('idKotaTujuan'); ?>"><?= form_error('idKotaTujuan', '<div class="text-danger small">', '</div>'); ?><?php echo $val->namaKota; ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Biaya Kirim</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3" name="ongkir" value="<?= set_value('ongkir'); ?>" placeholder="Masukan Ongkir">
                                              <?= form_error('ongkir', '<div class="text-danger small">', '</div>'); ?>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                              </div>


                          </form>
                      </div>
                  </div>
              </div>
          </section>
      </div>