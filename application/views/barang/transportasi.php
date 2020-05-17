        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <?php
            // $tipe = $this->session->userdata('role_id');
            $queryProduk = "SELECT * FROM `barang`
                            WHERE `tipe` = 'Transportasi'
                            ORDER BY `id_brg` ASC";
            $produk = $this->db->query($queryProduk)->result_array();
            ?>

            <?php foreach ($produk as $p) : ?>
                <a href="<?= base_url('barang/detail/' . $p['id_brg']); ?>" class="produkk mx-3" style="display:inline-block">
                    <div class="card my-3 border-dark" style="width: 18rem; text-decoration:none;">
                        <img class="card-img-top" src="<?= base_url('assets/img/product/') . $p['foto']; ?>" style="width: 100%;height: 20vw; object-fit: cover;">
                        <div class="card-img-overlay" style="font-weight:bold;color: black">
                            <h3 class="card-text"><?= $p['nama_barang']; ?></h3>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->