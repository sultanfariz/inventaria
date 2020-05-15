<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        body {
            background-color: #ad9e9e !important;
            align-items: center !important;
            height: inherit !important;
        }

        h2 {
            font-weight: bold !important;
            margin-top: 20px !important;
        }

        h3 {
            font-weight: bold !important;
        }

        button {
            width: 100% !important;
            margin-top: 25px !important;
            height: 80% !important;
        }

        form {
            margin-top: 40px !important;
        }

        .cardd {
            width: 62% !important;
            background-color: inherit !important;
            margin: 30px 19% !important;
        }

        .container {
            width: 40% !important;
            height: 80% !important;
            background-color: #f1f1f1 !important;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px 1px black;
            padding: 20px;
            align-items: center;
        }

        #signup {
            margin-top: 40px;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Login</title>
</head>

<body>
    <section class="login" id="login">
        <div class="container">
            <div class="cardd">
                <h2 class="text-center">Login</h2>
                <p class="text-center">Welcome back.</p>
                <?= $this->session->flashdata('message'); ?>
                <form>
                    <div class="form-group" method="post" action="<?= base_url('auth'); ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" id="username" class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                        </div>
                        <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group" method="POST" action="<?= base_url('auth'); ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                            </div>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-xs btn-success">LOGIN</button>
                </form>
                <p class="text-center" id="signup">Belum memiliki akun ? <a href="<?= base_url('auth/registration'); ?>">Signup</a>.</p>
            </div>
        </div>
    </section>









    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
</body>

</html>