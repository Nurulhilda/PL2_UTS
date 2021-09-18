<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <title>UTS PL2 Ismi</title>
</head>

<body>
    <table style="margin:auto; width:50%;">
        <tr>
            <th colspan="<?= ($_SESSION['level'] == 'Administrator') ? 5 : 3 ?>">
                <h3 style="text-align: center;">UTS PL</h3>
                <a href="<?= BASEURL ?>LoginController/logout" style="color: red;">Logout</a>
            </th>
        </tr>
        <tr style="text-align: center;">
            <td><a href="<?= BASEURL ?>PembayaranController">Pembayaran</a></td>
            <td><a href="<?= BASEURL ?>SiswaController">Siswa</a></td>
            <td><a href="<?= BASEURL ?>KelasController">Kelas</a></td>
            <?php if ($_SESSION['level'] == 'Administrator') { ?>
                <td><a href="<?= BASEURL ?>SppController">SPP</a></td>
                <td><a href="<?= BASEURL ?>PetugasController">Petugas</a></td>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="<?= ($_SESSION['level'] == 'Administrator') ? 5 : 3 ?>" style="text-align: center; padding-bottom:20px; padding-left:10px; padding-right:10px;">
                <?= $this->view($data['content'], $data) ?>
            </td>
        </tr>
    </table>
</body>

</html>