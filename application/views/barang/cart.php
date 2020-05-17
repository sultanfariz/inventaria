<div class="container-fluid">
    <h4 class="mb-5">Keranjang</h4>

    <div align="right">
        <a href="<?= base_url('barang/clearcart'); ?>" class="mb-2">
            <div class="btn btn-md btn-danger mb-2">Bersihkan Keranjang</div>
        </a></div>

    <table class="table table-bordered table-striped table-hover">

        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <td align="center" style="font-weight:bold;">Subtotal</td>
        </tr>

        <?php
        $no = 1;
        foreach ($this->cart->contents() as $i) :
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><a href="<?= base_url('barang/detail/' . $i['id']); ?>"><?= $i['name']; ?></a></td>
                <td><?= $i['qty']; ?></td>
                <td>Rp. <?= number_format($i['price'], 0, ",", "."); ?></td>
                <td align="right">Rp.<?= number_format($i['subtotal'], 0, ",", "."); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td align="right">Rp.<?= number_format($this->cart->total(), 0, ",", "."); ?></td>
        </tr>


    </table>

</div>