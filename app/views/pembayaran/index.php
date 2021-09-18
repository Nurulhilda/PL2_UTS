<section>
    <h1><?= $data['title'] ?></h1>

    <table style="margin-left:auto; margin-right:auto; margin-bottom:3rem;">
        <form action="<?= ($data['uri_segment'] == 'getUbah') ? BASEURL . 'PembayaranController/ubah' : BASEURL . 'PembayaranController/tambah' ?>" method="POST">
            <tr>
                <th colspan="4">
                    <p><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Pembayaran' : 'Tambah Pembayaran' ?></p>
                    <input type="hidden" name="id_pembayaran" value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpembayaran']['id_pembayaran'] ?>">
                </th>
            </tr>
            <tr>
                <td>
                    <label>NISN</label>
                </td>
                <td>
                    <input type="number" name="nisn" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpembayaran']['nisn'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tanggal Bayar</label>
                </td>
                <td>
                    <input style="width: 25%;" type="number" name="tgl_bayar" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpembayaran']['tgl_bayar'] ?>"> /
                    <input style="width: 25%;" type="number" name="bulan_bayar" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpembayaran']['bulan_bayar'] ?>"> /
                    <input style="width: 25%;" type="number" name="tahun_bayar" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpembayaran']['tahun_bayar'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>SPP</label>
                </td>
                <td>
                    <input type="number" name="id_spp" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpembayaran']['id_spp'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Jumlah Bayar</label>
                </td>
                <td>
                    <input type="number" name="jumlah_bayar" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpembayaran']['jumlah_bayar'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit"><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Pembayaran' : 'Tambah Pembayaran' ?></button></td>
            </tr>
        </form>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Petugas</th>
                <th>NISN</th>
                <th>Tanggal Bayar</th>
                <th>Bulan Bayar</th>
                <th>Tahun Bayar</th>
                <th>SPP</th>
                <th>Jumlah Bayar</th>
                <th style="width: 15%;">action</th>
            </tr>
        </thead>
        <?php foreach ($data['pembayaran'] as $pembayaran) { ?>
            <tr>
                <td><?= $pembayaran['id_pembayaran'] ?></td>
                <td><?= $pembayaran['id_petugas'] ?></td>
                <td><?= $pembayaran['nisn'] ?></td>
                <td><?= $pembayaran['tgl_bayar'] ?></td>
                <td><?= $pembayaran['bulan_bayar'] ?></td>
                <td><?= $pembayaran['tahun_bayar'] ?></td>
                <td><?= $pembayaran['id_spp'] ?></td>
                <td><?= number_format($pembayaran['jumlah_bayar']) ?></td>
                <td>
                    <a href="<?= BASEURL . 'PembayaranController/getUbah/' . base64_encode($pembayaran['id_pembayaran']) ?>">ubah</a>
                    <a href="<?= BASEURL . 'PembayaranController/hapus/' . base64_encode($pembayaran['id_pembayaran']) ?>" onclick="return confirm('Anda yakin menghapus data ini?')">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>