<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Menu Utama Dashboard "<?php echo $namaToko->namaToko; ?>"</h1>

        </div>

        <div class="section-body">


            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Toko</h4>
                        </div>
                        <div class="card-body">
                            <?php $this->load->view('frontend/menu_toko'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">

                    <form id="setting-form" method="POST" action="<?php echo site_url('Toko/save_edit_produk'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="idProduk" value="<?php echo $idProduk; ?>">
                        <input type="hidden" name="idToko" value="<?php echo $idToko; ?>">
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Form Memasukan Produk Baru</h4>
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
                                <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kategori</label>
                                    <div class="col-sm-6 col-md-9">

                                        <select class="form-control form-control-sm" name="kategori">
                                            <?php foreach ($kategori as $val) { ?>
                                                <option value="<?php echo $val->idkat; ?>" <?php if ($val->idkat == $produk->idKat) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $val->namakat; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nama_produk" value="<?php echo $produk->namaProduk; ?>" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="foto_produk" value="<?php echo $produk->foto; ?>" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Harga Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="harga" value="<?php echo $produk->harga; ?>" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Stok Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="stok" value="<?php echo $produk->stok; ?>" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Berat Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="berat" value="<?php echo $produk->berat; ?>" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Deskripsi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input class="form-control" name="deskripsi" value="<?php echo $produk->deskripsi; ?>" id="site-description"></input>
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div