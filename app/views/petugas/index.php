<section>
    <h1 style="text-transform: uppercase;"><?= $data['title'] ?></h1>

    <table style="margin-left:auto; margin-right:auto; margin-bottom:3rem;">
        <form action="<?= ($data['uri_segment'] == 'getUbah') ? BASEURL . 'PetugasController/ubahData' : BASEURL . 'PetugasController/tambah' ?>" method="POST">
            <tr>
                <th colspan="4">
                    <p><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Petugas' : 'Tambah Petugas' ?></p>
                    <input type="hidden" name="id_petugas" value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpetugas']['id_petugas'] ?>">
                </th>
            </tr>
            <tr>
                <td>
                    <label>Username</label>
                </td>
                <td>
                    <input type="text" name="inputUsername" value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpetugas']['username'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Password</label>
                </td>
                <td>
                    <input type="password" name="inputPassword" value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpetugas']['password'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nama Petugas</label>
                </td>
                <td>
                    <input type="text" name="inputNamaPetugas" value="<?php if ($data['uri_segment'] == 'getUbah') echo $data['getpetugas']['nama_petugas'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Level</label>
                </td>
                <td>
                    <select name="selectLevel">
                        <option>Pilih Level</option>
                        <option value="Administrator" <?php if ($data['uri_segment'] == 'getUbah' && $data['getpetugas']['level'] == 'Administrator') echo 'selected="selected"'; ?>>Administrator</option>
                        <option value="Petugas" <?php if ($data['uri_segment'] == 'getUbah' && $data['getpetugas']['level'] == 'Petugas') echo 'selected="selected"'; ?>>Petugas</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit"><?= ($data['uri_segment'] == 'getUbah') ? 'Ubah Petugas' : 'Tambah Petugas' ?></button></td>
            </tr>
        </form>
    </table>

    <table style="width: 100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>username</th>
                <th>Nama</th>
                <th>level</th>
                <th style="width: 20%;">action</th>
            </tr>
        </thead>
        <?php foreach ($data['petugas'] as $petugas) { ?>
            <tr>
                <td><?= $petugas['id_petugas'] ?></td>
                <td><?= $petugas['username'] ?></td>
                <td><?= $petugas['nama_petugas'] ?></td>
                <td><?= $petugas['level'] ?></td>
                <td>
                    <a href="<?= BASEURL . 'PetugasController/detail/' . base64_encode($petugas['id_petugas']) ?>" class="btn btn-primary">detail</a>
                    <a href="<?= BASEURL . 'PetugasController/getUbah/' . base64_encode($petugas['id_petugas']) ?>">ubah</a>
                    <a href="<?= BASEURL . 'PetugasController/hapus/' . base64_encode($petugas['id_petugas']) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ini?')">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>


</div>