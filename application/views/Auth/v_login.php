<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row align-items-center">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="<?= img('/background/map.jpg') ?>" alt="Map Image" class="img-fluid my-auto h-100">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h1 text-primary mb-2">
                                        <i class="fa fa-location-arrow" aria-hidden="true"> SIPETU</i>
                                    </h1>
                                    <h5 class="h5 text-primary mb-4">Sistem Pemetaan Usaha</h5>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" action="<?= site_url('Auth') ?>" method="POST">
                                    <div class="form-group">
                                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        <input type="text" name="username" class="form-control form-control-user" id="exampleInputUsername" placeholder="Masukan username..." value="<?= set_value('username')  ?>">
                                    </div>
                                    <div class="form-group">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    <!-- <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> -->
                                </form>
                                <!-- <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <!-- <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>