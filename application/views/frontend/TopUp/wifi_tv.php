      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Form Top Up</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Forms</a></div>
                      <div class="breadcrumb-item">Top Up</div>
                  </div>
              </div>

              <div class="section-body">

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Isi Data</h4>
                              </div>
                              <div class="card-body">

                                  <div class="form-group">
                                      <label>No. Pelanggan Tv</label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                  <i class="fas fa-water"></i>
                                              </div>
                                          </div>
                                          <input type="text" class="form-control phone-number">
                                      </div>
                                  </div>

                              </div>
                              <div class="card-footer text-right">
                                  <button class="btn btn-primary">Submit</button>
                              </div>
                          </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">

                              <div class="card-body">


                                  <div class="section-title mt-0">Layanan</div>
                                  <div class="form-group">
                                      <label>Agen Layanan</label>
                                      <select class="form-control">
                                          <?php foreach ($perusahaan as $val) { ?>
                                              <option value="<?php echo $val->idPerusahaan; ?>"><?php echo $val->namaPerusahaan; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>


                  </div>
              </div>
      </div>
      </section>
      </div>