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
                          <form method="POST" action="<?php echo site_url('Jasa_Pengiriman/save_kota'); ?>">
                              <div class="card">
                                  <div class="card-header">
                                      <h4>Form Tambah Kota</h4>
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
                                          <label for="inputEmail3" class="col-sm-3 col-form-label">ID Kota</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3" name="idKota" placeholder="Masukan ID Kota">
                                          </div>

                                          <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kota</label>
                                          <div class="col-sm-9">
                                              <input type="text" class="form-control" id="inputEmail3" name="namaKota" placeholder="Masukan Nama Kota">
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