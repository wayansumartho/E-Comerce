<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Menu Utama Dashboard Member</h1>

        </div>

        <div class="section-body">


            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Member</h4>
                        </div>
                        <div class="card-body">
                            <?php $this->load->view('frontend/menu_member') ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <?php if (count($toko) > 0) { ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?php echo site_url('Member/create_toko'); ?>">Silakan Membuat Toko</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Toko</h4>
                                        <div class="card-header-action">

                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive table-invoice">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Nama Toko</th>
                                                    <th>Deskripsi</th>
                                                    <th>Logo</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php foreach ($toko as $val) { ?>
                                                    <tr>
                                                        <td><a href="#"><?php echo $val['namaToko']; ?></a></td>
                                                        <td class="font-weight-600"><?php echo $val['deskripsi'] ?></td>
                                                        <td><?php echo $val['logo'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($val['statusAktif'] == 'Y') {
                                                            ?>
                                                                <div class="badge badge-success">Aktif</div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="badge badge-danger">Tidak Aktif</div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <a href="<?php echo site_url('Toko/main/' . $val['idToko'] . ''); ?>" class="btn btn-primary">Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="<?php echo site_url('Member/create_toko'); ?>">Silakan Membuat Toko</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                    <?php } ?>

                </div>
            </div>
    </section>
</div>