<?php
require "module-hp.php";
require "koneksi.php";
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
                        <h1 class="m-0">Handphone</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-list fa-sm mr-1"></i>Data Handphone</h3>
                        <a href="<?= $main_url ?>form-hp.php" class="mr-2 btn btn-sm btn-primary float-end"><i class="fas fa-plus fa-sm mr-1"></i>Tambah Handphone</a>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <table class="table table-hover text-nowrap" id="tblData">
                            <thead>
                                <tr>
                                    <th class="text-center">Id Barang</th>
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
                                        <td class="text-center"><?= $brg['id_barang'] ?></td>
                                        <td class="text-center"><?= $brg['nama_barang'] ?></td>
                                        <td class="text-center"><?= number_format($brg['harga_beli'], 0, ',', '.') ?></td>
                                        <td class="text-center"><?= number_format($brg['harga_jual'], 0, ',', '.') ?></td>
                                        <td class="text-center">
                                            <a href="form-barang.php?id=<?= $brg['id_barang'] ?>&msg=editing" class="btn btn-warning btn-sm" title="edit barang"><i class="fas fa-pen"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm delete-btn"
                                                data-url="?id=<?= $brg['id_barang'] ?>&msg=deleted"
                                                title="hapus barang">
                                                <i class="fas fa-trash"></i>
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




</body>

</html>