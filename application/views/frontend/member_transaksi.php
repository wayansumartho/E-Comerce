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

                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Belum Bayar <span class="badge badge-white"><?php echo count($jml_trans_bb); ?></span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Diproses <span class="badge badge-primary">1</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Dikirim <span class="badge badge-primary">1</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Sampai Tujuan <span class="badge badge-primary">0</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Invoices</h4>
                                    <div class="card-header-action">
                                        <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach ($transaksi as $val) { ?>
                                                <tr>
                                                    <td><a href="#"><?php echo $val->idOrder; ?></a></td>
                                                    <td class="font-weight-600"><?php echo $val->namaKonsumen; ?></td>
                                                    <td>
                                                        <div class="badge badge-warning"><?php echo $val->statusOrder; ?></div>
                                                    </td>
                                                    <td><?php echo $val->tglOrder; ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>
</div>