    <?php
    $key = $keyword;
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->where('id_brg', $key);
    $this->db->join('users', 'barang.penyedia = users.username');


    $query = $this->db->get()->result_array();
    ?>

    <?php foreach ($query as $p) : ?>

        <div class="container-fluid pl-5 mt-0" style="display: inline-block">
            <div align="right" class="tombol">
                <a class="whatsapp mt-2 " href="<?= $p['wa_penyedia']; ?>">
                    <button type="button" class="btn btn-success btn-md">
                        <i class="fab fa-whatsapp"></i> Whatsapp
                    </button>
                </a>
                <a class="whatsapp mt-2 " href="<?= base_url('barang/keranjang/' . $p['id_brg']); ?>">
                    <button type="button" class="btn btn-dark btn-md">
                        <!-- <i class="fas fa-shopping-cart"></i>  -->
                        + Tambah ke keranjang
                    </button>
                </a>
            </div>
            <!-- <div class="row"> -->
            <div class="card-deck">
                <!-- <a href="" class="produkk mx-3" style="display:inline-block"> -->
                <div class="card my-1 border-dark col-4 pt-2" style="height:440px;width: 18rem;">
                    <img class="card-img-top" src="<?= base_url('assets/img/product/') . $p['foto']; ?>" style="width: 100%;height: 25vw; object-fit: cover;">
                    <div class="card-body" style="font-weight:bold;color: black">
                        <small style="color: grey;"><?= $p['tipe'] ?></small>
                        <h5 class="card-text"><?= $p['nama_barang']; ?></h5>
                    </div>
                </div>

                <div class="card my-1 border-dark col-8 mx-6 pb-0" style="height: 440px; width:36rem">
                    <div class="card-body">
                        <small style="color: grey;">Info Produk</small>
                        <hr class="mt-0 mb-1">
                        <p style="color: black"><?= $p['deskripsi']; ?></p>

                        <small style="color: grey;">Harga</small>
                        <hr class="mt-0 mb-1">
                        <h3 style="color: black">Rp. <?= number_format($p['harga'], 0, ",", "."); ?>,00 / hari.</h3>

                        <div class="mb-3">
                            <small style="color: grey;">Info Kontak</small>
                            <hr class="mt-0 mb-1">
                            <h4 class="mb-0" style="color: black"><?= $p['firstname'] . " " . $p['lastname']; ?></h4>
                            <p class="mt-0 mb-2" style="color: black"><?= $p['phone']; ?></p>


                        </div>

                        <small class="mt-2" style="color: grey;">Alamat</small>
                        <hr class="mt-0 mb-1">
                        <p style="color: black"><?= $p['address']; ?></p>



                    </div>
                </div>
                <!-- </a> -->
            </div>
        </div>
    <?php endforeach; ?>