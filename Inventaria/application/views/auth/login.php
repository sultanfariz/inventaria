<div class="container my-auto">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6 ">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-10 offset-md-1">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2  mb-2" style="color: black; font-weight:bold">Login</h1>
                                    <p class="mb-5" style="color: black"><small>Welcome back.</small></p>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            </div>
                                            <input type="text" class="form-control form-control-md" id="username" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                                        </div>
                                        <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class=" form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                            </div>
                                            <input type="password" class="form-control form-control-md" id="password" placeholder="Password" name="password">
                                        </div>
                                        <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary  btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password ?</a>
                                </div>
                                <div class="text-center">
                                    <p class="small" style="color: black">Belum memiliki akun ? <a href="<?= base_url('auth/registration'); ?>">Daftar Sekarang!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>