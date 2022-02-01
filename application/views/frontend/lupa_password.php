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
        <div class="section-body">
            <h2 class="section-title"> Lupa Password </h2>
            <p class="section-lead">
                Form validation using default from Bootstrap 4
            </p>

            <div class="row">

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <?php if (!empty($this->session->flashdata('pesan'))) {; ?>
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <?php echo $this->session->flashdata('pesan'); ?>
                                </div>
                            </div>
                        <?php } ?>


                        <form method="POST" action="<?php echo site_url('member/ganti_password'); ?>">
                            <div class="card-header">
                                <h4>Default Validation</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="username" name="username" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label> Password Baru </label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label> Ulangi Password Baru </label>
                                    <input type="password" name="ulangiPassword" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>