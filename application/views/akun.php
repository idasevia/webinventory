<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
        h1 {
            margin-top: -20px; /* Sesuaikan nilai ini */
        }
        .btn-primary {
            margin-top: -10px; /* Sesuaikan nilai ini */
        }
    </style>
</head>
<body>
    <!-- Notifikasi -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="container mt-5">
            <div style="margin-bottom: 20px;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h3 mb-0 text-gray-800" style="color: black; font-weight: bold;">Daftar Akun Tersimpan</h1>
                    <a href="<?php echo base_url('akun/tambah') ?>">
                        <button class="btn btn-primary">
                            <i class="bi bi-person-plus"></i> Tambah Akun
                        </button>
                        <!-- <i class="bi bi-person-plus"></i> -->
                    </a>
                </div>
                <form action="" method="get" class="mb-4">
                    <div class="input-group">
                        <!-- <input type="text" name="nama" class="form-control" placeholder="Masukkan nama atau username"> -->
                        <!-- <button type="submit" class="btn btn-secondary">Cari</button> -->
                    </div>
                </form>

                <?php if (!empty($data)): ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="bg-primary" style="color: white; font-weight: bold;">No</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">NIP</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Nama</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Jenis Kelamin</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Username</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Password</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Level</td>
                            <td class="bg-primary" style="color: white; font-weight: bold;">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($value['nip']); ?></td>
                                    <td><?php echo htmlspecialchars($value['nama']); ?></td>
                                    <td><?php echo $value['jenis_kelamin'] == 'laki-laki' ? 'Laki-laki' : 'Perempuan'; ?></td>
                                    <td><?php echo htmlspecialchars($value['username']); ?></td>
                                    <td><?php echo htmlspecialchars($value['password']); ?></td>
                                    <td><?php echo htmlspecialchars($value['level']); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('akun/edit/' . $value['nip']); ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="<?php echo base_url('akun/delete/' . $value['nip']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
