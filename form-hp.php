<?php
require "module-hp.php";
require "koneksi.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    $id = $_GET['id'];
    $sqlEdit = "SELECT * FROM handphone WHERE id_handphone = '$id'";
    $hp = getData($sqlEdit)[0];
} else {
    $msg = '';
}

$alert = '';

if (isset($_POST['simpan'])) {
    if ($msg != '') {
        if (update($_POST)) {
            echo "<script>document.location.href = 'index.php?msg=updated';</script>";
        } else {
            echo "<script>document.location.href = 'index.php';</script>";
        }
    } else {
        if (insert($_POST)) {
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> Handphone berhasil ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handphone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-danger.small {
            font-size: 0.875em;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">Handphone</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end mb-0 pt-1">
                            <li class="breadcrumb-item"><a href="index.php">Handphone</a></li>
                            <li class="breadcrumb-item active"><?= $msg != '' ? 'Edit Handphone' : 'Tambah Handphone' ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <form action="" method="post" enctype="multipart/form-data" novalidate>
                        <?php if ($alert != '') echo $alert; ?>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><?= $msg != '' ? 'Edit Handphone' : 'Input Handphone' ?></h3>
                            <div>
                                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="mb-3">
                                        <label for="kode" class="form-label">Kode Handphone *</label>
                                        <input type="text" name="kode" class="form-control" id="kode" value="<?= $msg != '' ? $hp['id_handphone'] : '' ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama *</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $msg != '' ? $hp['nama_handphone'] : '' ?>" required>
                                        <span class="text-danger small" id="error-nama"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="merk" class="form-label">Merk HP *</label>
                                        <input type="text" name="merk" class="form-control" id="merk" value="<?= $msg != '' ? $hp['merk_handphone'] : '' ?>" required>
                                        <span class="text-danger small" id="error-merk"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga HP *</label>
                                        <input type="number" name="harga" class="form-control" id="harga" value="<?= $msg != '' ? $hp['harga'] : '' ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stock *</label>
                                        <input type="text" name="stock" class="form-control" id="stock" value="<?= $msg != '' ? $hp['stock'] : '' ?>" required>
                                        <span class="text-danger small" id="error-stock"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="warna" class="form-label">Warna *</label>
                                        <input type="text" name="warna" class="form-control" id="warna" value="<?= $msg != '' ? $hp['warna'] : '' ?>" required>
                                        <span class="text-danger small" id="error-warna"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="storage" class="form-label">Storage *</label>
                                        <input type="text" name="storage" class="form-control" id="storage" value="<?= $msg != '' ? $hp['storage'] : '' ?>" required>
                                        <span class="text-danger small" id="error-storage"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ram" class="form-label">RAM *</label>
                                        <input type="text" name="ram" class="form-control" id="ram" value="<?= $msg != '' ? $hp['ram'] : '' ?>" required>
                                        <span class="text-danger small" id="error-ram"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            const fields = {
                nama: {
                    type: 'text',
                    errorId: 'error-nama',
                    label: 'Nama Handphone'
                },
                merk: {
                    type: 'text',
                    errorId: 'error-merk',
                    label: 'Merk HP'
                },
                warna: {
                    type: 'text',
                    errorId: 'error-warna',
                    label: 'Warna'
                },
                stock: {
                    type: 'number',
                    errorId: 'error-stock',
                    label: 'Stock'
                },
                storage: {
                    type: 'number',
                    errorId: 'error-storage',
                    label: 'Storage'
                },
                ram: {
                    type: 'number',
                    errorId: 'error-ram',
                    label: 'RAM'
                },
            };

            function showError(input, errorId, message) {
                input.classList.add('is-invalid');
                document.getElementById(errorId).innerText = message;
            }

            function clearError(input, errorId) {
                input.classList.remove('is-invalid');
                document.getElementById(errorId).innerText = '';
            }

            form.addEventListener('submit', function(e) {
                let isValid = true;

                for (let key in fields) {
                    const field = fields[key];
                    const input = document.getElementById(key);
                    const value = input.value.trim();
                    const errorId = field.errorId;

                    clearError(input, errorId);

                    if (field.type === 'text') {
                        if (!/^[a-zA-Z\s]+$/.test(value)) {
                            showError(input, errorId, `${field.label} hanya boleh huruf`);
                            isValid = false;
                        }
                    } else if (field.type === 'number') {
                        if (!/^\d+$/.test(value)) {
                            showError(input, errorId, `${field.label} hanya boleh angka`);
                            isValid = false;
                        }
                    }
                }

                if (!isValid) {
                    e.preventDefault(); // Cegah kirim form
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>