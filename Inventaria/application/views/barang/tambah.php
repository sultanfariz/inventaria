<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-header">
            <div class="text-center">
                <h1 class="h2" style="color: black">Tambah Produk</h1>
            </div>
        </div>
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">

                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">

                            <div class=" form-group">
                                <input type="text" class="form-control " id="nama_barang" placeholder="Nama Barang" name="nama_barang" value="<?= set_value('nama_barang') ?>">
                                <?= form_error('nama_barang', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <select name="tipe" id="tipe" class="form-control">
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Transportasi">Transportasi</option>
                                    <option value="Aksesoris">Aksesoris</option>
                                </select>
                                <!-- <input type="text" class="form-control " id="tipe" placeholder="Tipe Barang" name="tipe" value="<?= set_value('tipe') ?>"> -->
                                <?= form_error('tipe', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control " id="harga" placeholder="Harga Barang" name="harga" value="<?= set_value('harga') ?>">
                                <?= form_error('harga', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="text" class="form-control " id="nomor_penyedia" placeholder="Kontak Penyedia" name="nomor_penyedia" value="<?= set_value('nomor_penyedia') ?>">
                                <?= form_error('nomor_penyedia', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group mb-3">
                                <input type="text" class="form-control " id="wa_penyedia" placeholder="Link Whatsapp" name="wa_penyedia" value="<?= set_value('wa_penyedia') ?>">
                                <?= form_error('wa_penyedia', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit mt-5" class="btn btn-primary  btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>