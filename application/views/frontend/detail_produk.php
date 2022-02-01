<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="main-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Detail Produk
                </div>
                <div class="card-body">
                    <?php foreach ($produk as $brg) : ?>
                        <div class="row">

                            <div class="col-md-4"> <img src="<?php echo base_url() . 'upload_produk/' . $brg['foto'] ?>" class="card-img-top"></div>

                            <div class="col-md-8">
                                <table class="table">
                                    <tr>
                                        <td> Nama Produk </td>
                                        <td><b><?php echo $brg['namaProduk'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td> Keterangan </td>
                                        <td><b><?php echo $brg['deskripsi'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td> Stok </td>
                                        <td><b><?php echo $brg['stok'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td> Harga </td>
                                        <td> <b>
                                                <div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg['harga'], 0, ',', '.') ?></div>
                                            </b></td>
                                    </tr>
                                </table>

                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>