<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Feedback</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kategori</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>



        <?php $this->view('pesan') ?>

        <div class="row">
            <div class="col-30 col-md-10 col-lg-10">
                <form method="POST" action="<?php echo site_url('saran/add'); ?>">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Saran</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>Tampilan Web</th>
                                        <td>
                                            <select class="form-control" name="penilaian" required>
                                                <option value="0">-Pilih-</option>

                                                <option value="Sangat Baik Sekali">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Biasa">Biasa</option>
                                                <option value="Kurang">Kurang</option>
                                                <option value="Kurang sekali">Kurang Sekali</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pelayanan</th>
                                        <td>
                                            <select class="form-control" name="pelayanan" required>
                                                <option value="0">-Pilih-</option>

                                                <option value="Sangat Baik Sekali">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Biasa">Biasa</option>
                                                <option value="Kurang">Kurang</option>
                                                <option value="Kurang sekali">Kurang Sekali</option>

                                            </select>
                                        </td>

                                    <tr>
                                        <th>Saran Dan Masukan</th>
                                        <td>
                                            <div>
                                                <input type="text" class="form-control" id="inputEmail3" name="keterangan" placeholder="Saran dan Keterangan" required>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th>
                                            <label class="d-block">Rekomendasikan Web</label>
                                        <td>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="rw" id="inlinecheckox1" value="Yes">
                                                <label class="form-check-label" for="inlinecheckbox">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="rw" id="inlinecheckox2" value="No">
                                                <label class="form-check-label" for="inlinecheckbox">No</label>
                                            </div>
                                        </td>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </div>
            </div>

        </div>

</div>
</section>
</div>