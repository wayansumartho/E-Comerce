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
                          <form method="POST" action="<?php echo site_url('Jasa_Pengiriman/edit_ongkir'); ?>">
                              <input type="text" value="<?php echo $ongkir->idBiayaKirim ?>" name="idBiayaKirim" hidden>
                              <div class="card">
                                  <div class="card-header">
                                      <h4>Form Ongkir</h4>
                                  </div>
                                  <div class="card-body">

                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Pilih Kurir</label>
                                          <div class="col-sm-9">
                                              <select class="form-control form-control-sm" name="idKurir">
                                                  <?php foreach ($kurir as $val) { ?>
                                                      <option value="<?php echo $val->idKurir; ?>" <?php if ($val->idKurir == $ongkir->idKurir) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $val->namaKurir; ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Kota Asal</label>
                                          <div class="col-sm-9">
                                              <select class="form-control form-control-sm" name="idKotaAsal">
                                                  <?php foreach ($kota as $val) { ?>
                                                      <option value="<?php echo $val->idKota; ?>" <?php if ($val->idKota == $ongkir->idKotaAsal) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $val->namaKota; ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Kota Tujuan</label>
                                          <div class="col-sm-9">
                                              <select class="form-control form-control-sm" name="idKotaTujuan">
                                                  <?php foreach ($kota as $val) { ?>
                                                      <option value="<?php echo $val->idKota; ?>" <?php if ($val->idKota == $ongkir->idKotaTujuan) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $val->namaKota; ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Biaya Kirim</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3" name="biaya" placeholder="Biaya Ongkir" value="<?php echo $ongkir->biaya; ?>">
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