<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h2 " style="color: black">Join Inventaria</h1>
                            <p class="mb-4" style="color: black">Bergabunglah bersama lebih dari 1 juta pengguna.</p>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">



                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="firstname" placeholder="First Name" name="firstname" value="<?= set_value('firstname') ?>">
                                    <?= form_error('firstname', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="lastname" placeholder="Last Name" name="lastname" value="<?= set_value('lastname') ?>">
                                    <?= form_error('lastname', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email') ?>">
                                <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control form-control-user" id="phone" placeholder="Phone Numbers" name="phone" value="<?= set_value('phone') ?>">
                                <?= form_error('phone', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control form-control-user" id="address" placeholder="Address" name="address" value="<?= set_value('address') ?>">
                                <?= form_error('address', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1" value="<?= set_value('password1') ?>">
                                    <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class=" col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Confirm Password" name="password2" value="<?= set_value('password2') ?>">
                                    <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <p class="small" style="color: black">Sudah memiliki akun? <a class="" href="<?= base_url('auth'); ?>">Login.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>