<section>
    <h1><?= $data['title'] ?></h1>

    <table style="width: 50%; text-align:left; margin:auto;">
        <tr>
            <td>
                <label>Username</label>
            </td>
            <td>
                <p><?= $data['petugas']['username'] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nama Petugas</label>
            </td>
            <td>
                <p><?= $data['petugas']['nama_petugas'] ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <label>Level</label>
            </td>
            <td>
                <p><?= $data['petugas']['level'] ?></p>
            </td>
        </tr>
    </table>
</section>
<div class="container mt-3" style="display: none;">


    <div class="row justify-content-center">
        <div class="card mb-3 col-lg-6">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= BASEURL ?>image/Designer _Outline.svg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['petugas']['nama_petugas'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $data['petugas']['level'] ?></h6>
                        <p class="card-text d-none">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>