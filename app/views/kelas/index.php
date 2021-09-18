<section>
    <h1><?= $data['title'] ?></h1>

    <table style="margin-left:auto; margin-right:auto; margin-bottom:3rem;">
        <form action="<?= ($data['uri_segment'] == 'getUbah') ? BASEURL . 'KelasController/ubahData' : BASEURL . 'KelasController/tambah' ?>" method="POST">
            <tr>
                <th colspan="4">
                    <p><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Kelas' : 'Tambah Kelas' ?></p>
                    <input type="hidden" name="id_kelas" value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getkelas']['id_kelas'] ?>">
                </th>
            </tr>
            <tr>
                <td>
                    <label>Kelas</label>
                </td>
                <td>
                    <input type="number" name="nama_kelas" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getkelas']['nama_kelas'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Kompetensi Keahlian</label>
                </td>
                <td>
                    <input type="text" name="kompetensi_keahlian" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getkelas']['kompetensi_keahlian'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit"><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Kelas' : 'Tambah Kelas' ?></button></td>
            </tr>
        </form>
    </table>

    <table style="margin: auto; text-align:center;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kelas</th>
                <th>Kompetensi Keahlian</th>
                <th style="width: 15%;">action</th>
            </tr>
        </thead>
        <?php foreach ($data['kelas'] as $kelas) { ?>
            <tr>
                <td><?= $kelas['id_kelas'] ?></td>
                <td><?= $kelas['nama_kelas'] ?></td>
                <td><?= $kelas['kompetensi_keahlian'] ?></td>
                <td>
                    <a href="<?= BASEURL . 'KelasController/getUbah/' . base64_encode($kelas['id_kelas']) ?>" class="btn btn-success btn-ubah-keals$kelas" data-bs-toggle="modal" data-bs-target="#keals$kelasModal" data-idkeals$kelas="<?= $kelas['id_kelas'] ?>">ubah</a>
                    <a href="<?= BASEURL . 'KelasController/hapus/' . base64_encode($kelas['id_kelas']) ?>" onclick="return confirm('Anda yakin menghapus data ini?')">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>