<?php
require "module-hp.php";
require "koneksi.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
//jalankan fungsi hapus barang
if ($msg == 'deleted') {
    $id = $_GET['id'];
    if (delete($id)) {
        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> Handphone berhasil dihapus
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> Handphone tidak berhasil dihapus
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}


if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> Data handphone berhasi diedit
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Handphone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col sm-6">
                        <h1 class="m-0">Inventory</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <?php if ($alert != '') {
                        echo $alert;
                    } ?>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-list fa-sm mr-1"></i>Data Handphone</h3>
                        <a href="form-hp.php" class="mr-2 btn btn-sm btn-primary float-end"><i class="fas fa-plus fa-sm mr-1"></i>Tambah Handphone</a>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <table class="table table-hover text-nowrap" id="tblData">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Handphone</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Merk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Warna</th>
                                    <th class="text-center">Storage</th>
                                    <th class="text-center">Ram</th>
                                    <th style="width:10%;" class="text-center">Operasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $handphone = getData("SELECT * FROM handphone ORDER BY LOWER(nama_handphone) ASC");
                                foreach ($handphone as $hp) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $hp['id_handphone'] ?></td>
                                        <td class="text-center"><?= $hp['nama_handphone'] ?></td>
                                        <td class="text-center"><?= $hp['merk_handphone'] ?></td>
                                        <td class="text-center"><?= number_format($hp['harga'], 0, ',', '.') ?></td>
                                        <td class="text-center"><?= $hp['stock'] ?></td>
                                        <td class="text-center"><?= $hp['warna'] ?></td>
                                        <td class="text-center"><?= $hp['storage'] ?></td>
                                        <td class="text-center"><?= $hp['ram'] ?></td>
                                        <td class="text-center">
                                            <a href="form-hp.php?id=<?= $hp['id_handphone'] ?>&msg=editing" class="btn btn-warning btn-sm" title="edit">
                                                <i class="fas fa-pen"></i>Edit
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm delete-btn"
                                                data-url="?id=<?= $hp['id_handphone'] ?>&msg=deleted"
                                                title="hapus">
                                                <i class="fas fa-trash"></i>Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php

                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>


    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var url = $(this).data('url');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Barang akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    </script>

</body>

</html>