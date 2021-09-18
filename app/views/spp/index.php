<section>
    <h1><?= $data['title'] ?></h1>

    <table style="margin-left:auto; margin-right:auto; margin-bottom:3rem;">
        <form action="<?= ($data['uri_segment'] == 'getUbah') ? BASEURL . 'SppController/ubahData' : BASEURL . 'SppController/tambah' ?>" method="POST">
            <tr>
                <th colspan="4">
                    <p><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah SPP' : 'Tambah SPP' ?></p>
                    <input type="hidden" name="id_spp" value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getspp']['id_spp'] ?>">
                </th>
            </tr>
            <tr>
                <td>
                    <label>Tahun</label>
                </td>
                <td>
                    <input type="number" name="inputTahun" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getspp']['tahun'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nominal</label>
                </td>
                <td>
                    <input type="number" name="inputNominal" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getspp']['nominal'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit"><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Spp' : 'Tambah Spp' ?></button></td>
            </tr>
        </form>
    </table>

    <table style="margin: auto; text-align:left;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th style="width: 15%;">action</th>
            </tr>
        </thead>
        <?php foreach ($data['spp'] as $spp) { ?>
            <tr>
                <td><?= $spp['id_spp'] ?></td>
                <td><?= $spp['tahun'] ?></td>
                <td><?= number_format($spp['nominal']) ?></td>
                <td>
                    <a href="<?= BASEURL . 'SppController/getUbah/' . base64_encode($spp['id_spp']) ?>">ubah</a>
                    <a href="<?= BASEURL . 'SppController/hapus/' . base64_encode($spp['id_spp']) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ini?')">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>