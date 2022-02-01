<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Saran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kategori</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Saran</h2>
            <?php $this->view('pesan') ?>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Saran</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Penilaian</th>
                                        <th>Pelayanan</th>
                                        <th>Keterangan</th>
                                        <th>Rekomendasi</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($saran as $item) { ?>
                                        <tr>
                                            <td><?php echo $item->idsaran; ?></td>
                                            <td><?php echo $item->penilaian ?></td>
                                            <td><?php echo $item->pelayanan; ?></td>
                                            <td><?php echo $item->keterangan ?> </td>
                                            <td><?php echo $item->rw; ?></td>

                                            <td><a href="<?php echo site_url('saran/getid1/' . $item->idsaran); ?>" class="btn btn-danger">Hapus</a></td>
                                        </tr>
                                    <?php } ?>
                                </table>

                                <div class="card-footer text-right">
                                    <nav class="d-inline-block">
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
    </section>
</div>