<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/assets/css/components.css'); ?>">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?php echo site_url('Home'); ?>" class="navbar-brand sidebar-gone-hide">Tokokita</a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                </div>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a href="#" class="nav-link">Tentang Tokokita</a></li>
                        <li class="nav-item"><a href="<?php echo site_url('saran/interface') ?>" class="nav-link">Feedback</a></li>

                    </ul>
                </div>
                <form class="form-inline ml-auto" method="POST" action="<?php echo site_url('home/search'); ?>">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <select data-width="150" class="form-control">
                            <?php foreach ($kategori as $val) { ?>
                                <option class="form-control"><?php echo $val->namakat ?></option>
                            <?php } ?>

                        </select>
                        <form method="POST" action="<?php echo site_url('home/search'); ?>">
                            <input class="form-control" type="text" name="keyword" placeholder="Search" data-width="300">
                            <button type="submit" class="btn"><i class="fas fa-search"></i></button>

                        </form>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Menu Top Up
                                <div class="float-right">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">

                                <a href="<?php echo site_url('TopUp/pulsa'); ?>" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Top Pulsa

                                    </div>
                                </a>

                                <a href="<?php echo site_url('TopUp/listrik'); ?>" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fa fa-bolt"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Top Up Token Lisrik

                                    </div>
                                </a>
                                <a href="<?php echo site_url('TopUp/air'); ?>" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-water"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Air PDAM

                                    </div>
                                </a>
                                <a href="<?php echo site_url('TopUp/wifi_tv'); ?>" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-signal"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Internet dan TV Kabel

                                    </div>
                                </a>

                            </div>

                        </div>
                    </li>

                    <li><a href="<?php echo site_url('Member/keranjang'); ?>" class="nav-link  nav-link-lg beep"><i class="fas fa-shopping-cart"></i></a>

                    </li>

                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fa fa-filter" aria-hidden="true"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Menu Filter
                                <div class="float-right">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <input type="hidden" name="baju" value="baju">
                                <a href="<?php echo site_url('Filter/baju'); ?>" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Baju

                                    </div>
                                </a>

                                <input type="hidden" name="Celana">
                                <a href="<?php echo site_url('Filter/celana'); ?>" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fa fa-bolt"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Celana

                                    </div>
                                </a>
                                <input type="hidden" name="Cowok">
                                <a href="<?php echo site_url('Filter/cowok'); ?>" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-water"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Cowok

                                    </div>
                                </a>
                                <input type="hidden" name="Cewek">
                                <a href="<?php echo site_url('Filter/cewek'); ?>" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-signal"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Cewek
                                    </div>
                                </a>

                            </div>

                        </div>
                    </li>


                </ul>
                <?php if (!empty($this->session->userdata('id'))) { ?>

                    <a href="<?php echo site_url('Member/dashboard'); ?>" class="btn btn-outline-light">Menu Member</a>
                    &nbsp; &nbsp; &nbsp;
                    <a href="<?php echo site_url('Member/logout'); ?>" class="btn btn-outline-light">Logout</a>

                <?php } else { ?>

                    <a href="<?php echo site_url('Home/Login'); ?>" class="btn btn-outline-light">Masuk</a>
                    &nbsp; &nbsp; &nbsp;
                    <a href="<?php echo site_url('Home/register'); ?>" class="btn btn-outline-light">Daftar</a>

                <?php } ?>

            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <?php foreach ($kategori as $val) { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><span><?php echo $val->namakat; ?></span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>

            <?= $contents ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?php echo base_url('assets/admin/assets/js/stisla.js'); ?>"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url('assets/admin/assets/js/scripts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/assets/js/custom.js'); ?>"></script>
</body>

</html>