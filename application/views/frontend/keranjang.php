<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Keranjang Belanja</h1>

        </div>

        <div class="section-body">


            <div id="output-status"></div>
            <div class="row">


                <div class="col-md-12">
                    <?php if (count($this->cart->contents()) > 0) { ?>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Keranjang</h4>
                                        <div class="card-header-action">

                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive table-invoice">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Produk</th>
                                                    <th>Gambar</th>
                                                    <th>Harga</th>
                                                    <th>qty</th>
                                                    <th>Sub Total</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php
                                                $total = 0;
                                                $i = 1;
                                                $cart = $this->cart->contents();
                                                foreach ($cart as $val) {
                                                    $total = $total + $val['subtotal'] ?>
                                                    <tr>

                                                        <td><a href="#"><?php echo $i++; ?></a></td>
                                                        <td><a href="#"><?php echo $val['name']; ?></a></td>
                                                        <td><?php echo number_format($val['price']); ?></td>
                                                        <td><?php echo $val['gambar'] ?></td>
                                                        <td><input type="number" min="1" value="<?php echo $val['qty'] ?>"></td>
                                                        <td><?php echo number_format($val['price'] * $val['qty']); ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('Member/delete_cart/' . $val['rowid']); ?>" class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <th>Total</th>
                                                    <th><?php echo $total ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><a href="<?php echo site_url('Member/selesai_belanja'); ?>" class="btn btn-success">Checkout</a> </th>
                                                </tr>

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
                                                <a class="nav-link active" href="<?php echo site_url('Home'); ?>">Tidak Ada Produk Yang Di Beli</a>
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