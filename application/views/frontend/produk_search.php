<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Cari</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kategori</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>




        <div class="section-body">
            <div class="row">
                <?php foreach ($produk as $item) { ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image" data-background="<?php echo base_url('upload_produk/' . $item->foto); ?>">
                                </div>
                                <div class="article-title">
                                    <h2><a href="#"><?php echo $item->namaProduk; ?></a></h2>
                                </div>
                            </div>
                            <div class="article-details">
                                <p><?php echo $item->deskripsi; ?></p>
                                <div class="article-cta">
                                    <a href="<?php echo site_url('home/cart_tambah/' . $item->idProduk); ?>" class="btn btn-primary">Add to Cart</a>
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="d-flex mb-4">
                                    <i class="fas fa-star text-warning"> 4,5 </i>


                                </div>
                                <div>Nilai Produk</div>
                            </div>


                        </article>
                    </div>

                <?php } ?>



            </div>
    </section>
</div>