        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <!-- Page Heading -->
                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto py-2" style="max-width:400px">
                    <div class="card-header">
                        <div class="text-center">
                            <h1 class="h3" style="color: black"><?= $title; ?></h1>
                        </div>
                    </div>
                    <div class="card-body p-0 my-3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">

                                <h5 class="card-text">
                                    <label> Nama : </label>
                                    <?= $users['firstname'] . " " . $users['lastname']; ?>
                                </h5>
                                <h5 class="card-text">
                                    <label> Username : </label>
                                    <?= $users['username']; ?>
                                </h5>
                                <h5 class="card-text">
                                    <label> Email : </label>
                                    <?= $users['email']; ?>
                                </h5>
                                <h5 class="card-text">
                                    <label> No. HP : </label>
                                    <?= $users['phone']; ?>
                                </h5>
                                <h5 class="card-text">
                                    <label> Alamat : </label>
                                    <?= $users['address']; ?>
                                </h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
