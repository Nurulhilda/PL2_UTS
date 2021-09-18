<section>
    <h1><?= $data['title'] ?></h1>

    <table style="margin-left:auto; margin-right:auto; margin-bottom:3rem;">
        <form action="<?= ($data['uri_segment'] == 'getUbah') ? BASEURL . 'SiswaController/ubah' : BASEURL . 'SiswaController/tambah' ?>" method="POST">
            <tr>
                <th colspan="4">
                    <p><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Siswa' : 'Tambah Siswa' ?></p>
                </th>
            </tr>
            <tr>
                <td>
                    <label>NISN</label>
                </td>
                <td>
                    <input type="number" name="nisn" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getsiswa']['nisn'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>NIS</label>
                </td>
                <td>
                    <input type="number" name="nis" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getsiswa']['nis'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nama</label>
                </td>
                <td>
                    <input type="text" name="nama" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getsiswa']['nama'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Kelas</label>
                </td>
                <td>
                    <input type="number" name="id_kelas" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getsiswa']['id_kelas'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Alamat</label>
                </td>
                <td>
                    <textarea name="alamat" required cols="30" rows="5"><?php if ($data['uri_segment'] == 'getUbah') echo $data['getsiswa']['alamat'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Telp</label>
                </td>
                <td>
                    <input type="number" name="no_telp" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getsiswa']['no_telp'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>SPP</label>
                </td>
                <td>
                    <input type="number" name="id_spp" required value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getsiswa']['id_spp'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit"><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Siswa' : 'Tambah Siswa' ?></button></td>
            </tr>
        </form>
    </table>

    <table style="margin: auto;">
        <thead>
            <tr>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No Telephone</th>
                <th>SPP</th>
                <th style="width: 15%;">action</th>
            </tr>
        </thead>
        <?php foreach ($data['siswa'] as $siswa) { ?>
            <tr>
                <td><?= $siswa['nisn'] ?></td>
                <td><?= $siswa['nis'] ?></td>
                <td><?= $siswa['nama'] ?></td>
                <td><?= $siswa['id_kelas'] ?></td>
                <td><?= $siswa['alamat'] ?></td>
                <td><?= $siswa['no_telp'] ?></td>
                <td><?= $siswa['id_spp'] ?></td>
                <td>
                    <a href="<?= BASEURL . 'SiswaController/getUbah/' . base64_encode($siswa['nisn']) ?>">ubah</a>
                    <a href="<?= BASEURL . 'SiswaController/hapus/' . base64_encode($siswa['nisn']) ?>" onclick="return confirm('Anda yakin menghapus data ini?')">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>