            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="<?php echo base_url('assets/image_assets/banner1.jpg'); ?>" alt="First slide">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Heading</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="<?php echo base_url('assets/image_assets/banner2.jpg'); ?>" alt="Second slide">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Heading</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="<?php echo base_url('assets/image_assets/banner3.jpg'); ?>" alt="Third slide">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Heading</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Produk Terbaru</h2>
                        <p class="section-lead">This article component is based on card and flexbox.</p>

                        <div class="row">
                            <?php foreach ($produk as $val) { ?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <article class="article">
                                        <div class="article-header">
                                            <div class="article-image" data-background="<?php echo base_url('upload_produk/' . $val->foto); ?>">
                                            </div>
                                            <div class="article-title">
                                                <h2><a href="#">
                                                        <?php echo $val->namaProduk; ?>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <p><?php echo $val->deskripsi; ?></p>
                                            <?php
                                            $diskon = ($val->hargaDiskon / 100) * $val->harga;
                                            if (empty($val->hargaDiskon)) { ?>
                                                <p> Rp. <?php echo number_format($val->harga); ?> </h4>
                                                <?php } else { ?>

                                                <p><del> Rp. <?php echo number_format($val->harga); ?> </del></h4>
                                                <h4> Rp. <?php echo number_format($val->harga - $diskon); ?> </h4>
                                                <p style="float: right; "> Diskon <?= $val->hargaDiskon  ?> % </h5>
                                                <?php  } ?>
                                                <div class="article-cta">
                                                    <a href="<?php echo site_url('Member/cart_tambah/' . $val->idProduk); ?>" class="btn btn-primary">Add on Cart</a>
                                                </div>
                                                <div class="article-cta">
                                                    <a href="<?php echo site_url('member/detail_produk/?id=' .  $val->idProduk); ?>" class="btn btn-warning mt-2"> Detail Produk </a>
                                                </div>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>

                        </div>

                        <h2 class="section-title">Produk Terlaris</h2>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image" data-background="../assets/img/news/img13.jpg">
                                        </div>
                                        <div class="article-badge">
                                            <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                        </div>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="article-cta">
                                            <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image" data-background="../assets/img/news/img15.jpg">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                        </div>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="article-cta">
                                            <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image" data-background="../assets/img/news/img07.jpg">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                        </div>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="article-cta">
                                            <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image" data-background="../assets/img/news/img02.jpg">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                        </div>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="article-cta">
                                            <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <h2 class="section-title">Article Style C</h2>
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                                <article class="article article-style-c">
                                    <div class="article-header">
                                        <div class="article-image" data-background="../assets/img/news/img13.jpg">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-category"><a href="#">News</a>
                                            <div class="bullet"></div> <a href="#">5 Days</a>
                                        </div>
                                        <div class="article-title">
                                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                        </div>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="article-user">
                                            <img alt="image" src="../assets/img/avatar/avatar-1.png">
                                            <div class="article-user-details">
                                                <div class="user-detail-name">
                                                    <a href="#">Hasan Basri</a>
                                                </div>
                                                <div class="text-job">Web Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <article class="article article-style-c">
                                    <div class="article-header">
                                        <div class="article-image" data-background="../assets/img/news/img14.jpg">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-category"><a href="#">News</a>
                                            <div class="bullet"></div> <a href="#">5 Days</a>
                                        </div>
                                        <div class="article-title">
                                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                        </div>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="article-user">
                                            <img alt="image" src="../assets/img/avatar/avatar-3.png">
                                            <div class="article-user-details">
                                                <div class="user-detail-name">
                                                    <a href="#">Rizal Fakhri</a>
                                                </div>
                                                <div class="text-job">UX Designer</div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <article class="article article-style-c">
                                    <div class="article-header">
                                        <div class="article-image" data-background="../assets/img/news/img01.jpg">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-category"><a href="#">News</a>
                                            <div class="bullet"></div> <a href="#">5 Days</a>
                                        </div>
                                        <div class="article-title">
                                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                        </div>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="article-user">
                                            <img alt="image" src="../assets/img/avatar/avatar-2.png">
                                            <div class="article-user-details">
                                                <div class="user-detail-name">
                                                    <a href="#">Irwansyah Saputra</a>
                                                </div>
                                                <div class="text-job">Mobile Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
            </div>