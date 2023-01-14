<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><strong>Daftar Akun</strong></h1>
                        </div>

                        <form class="user" action="<?= site_url('Auth/register') ?>" method="POST">
                            <div class="form-group row">
                                <div class="col-sm mb-3 mb-sm-0">
                                    <input type="text" name="nm_user" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm mb-3 mb-sm-0">
                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan Username" value="<?= set_value('username')  ?>">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <div class="col-sm mb-3 mb-sm-0">
                                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block" type="submit">Register</button>
                            <hr>
                            <a class="btn btn-warning btn-user btn-block" href="<?= site_url('SuperAdmin/DataUser') ?>" style="text-decoration:none">Back</a>
                        </form>
                        <!-- <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>