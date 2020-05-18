<div class="container">


    <h1 class="h3 mb-4 text-gray-800">Produk Anda</h1>

    <?= $this->session->flashdata('message'); ?>

    <table class="table table-bordered table-striped table-hover">


        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Action</th>
        </tr>

        <?php
        $key = $users['username'];
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('penyedia', $key);
        // $this->db->join('users', 'barang.penyedia' = $key);
        $query = $this->db->get()->result_array();
        ?>


        <?php $no = 1;
        foreach ($query as $p) : ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><a href="<?= base_url('barang/detail/' . $p['id_brg']); ?>"><?= $p['nama_barang']; ?></a></td>
                <td><a href="<?= base_url('barang/update/' . $p['id_brg']); ?>" class="mb-2">
                        <div class="btn btn-md btn-success mb-2">Edit</div>
                    </a>
                    <a href="<?= base_url('barang/deletebrg/' . $p['id_brg']); ?>" class="mb-2">
                        <div class="btn btn-md btn-danger mb-2">Hapus</div>
                    </a></td>

            </tr>
            <!-- <a href="<?= base_url('barang/detail/' . $p['id_brg']); ?>" class="produkk mx-3" style="display:inline-block">
            <div class="card my-3 border-dark" style="width: 18rem; text-decoration:none;">
                <img class="card-img-top" src="<?= base_url('assets/img/product/') . $p['foto']; ?>" style="width: 100%;height: 20vw; object-fit: cover;">
                <div class="card-img-overlay" style="font-weight:bold;color: black">
                    <h3 class="card-text"><?= $p['nama_barang']; ?></h3>
                </div>
            </div>
        </a> -->
        <?php endforeach; ?>
    </table>