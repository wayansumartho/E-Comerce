      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manejemen Kota</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Manejemen Kota</h2>
                  <p class="section-lead">
                      Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.
                  </p>

                  <div class="row">

                      <div class="col-12 col-md-6 col-lg-6">
                          <form method="POST" action="<?php echo site_url('Jasa_Pengiriman/edit_kota'); ?>">
                              <input type="hidden" name="id" value="<?php echo $kota->idKota; ?>">
                              <div class="card">
                                  <div class="card-header">
                                      <h4>Form Edit Kota</h4>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kota</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3" name="namaKota" placeholder="Nama Kota" value="<?php echo $kota->namaKota; ?>">
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