<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <style>
        h1 {
            margin-top: -20px;
            /* Sesuaikan nilai ini */
        }

        .btn-primary {
            margin-top: -10px;
            /* Sesuaikan nilai ini */
        }
    </style>
    <script>
        function confirmSubmission(event) {
            if (!confirm('Apakah Anda yakin ingin menambahkan akun ini?')) {
                event.preventDefault();
            }
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <div style="margin-bottom: 20px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0 text-gray-800" style="color: black; font-weight: bold;">Form Tambah Akun</h1>
                <a href="<?php echo base_url('akun') ?>">
                    <button class="btn btn-primary">Data Akun</button>
                </a>
            </div>


            <!-- Notifikasi Sukses -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Notifikasi Error -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <form action="<?php echo base_url('akun/action_tambah') ?>" method="post" onsubmit="confirmSubmission(event)">
                <div class="form-group mb-3">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control" value="<?php echo set_value('nip'); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                        <option value="laki-laki" <?php echo set_select('jenis_kelamin', 'laki-laki'); ?>>Laki-laki</option>
                        <option value="perempuan" <?php echo set_select('jenis_kelamin', 'perempuan'); ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="level">Level</label>
                    <select id="level" name="level" class="form-control" required>
                        <option value="">Pilih Level</option>
                        <option value="Operator" <?php echo set_select('level', 'Operator'); ?>>Operator</option>
                        <option value="Koordinator" <?php echo set_select('level', 'Koordinator'); ?>>Koordinator</option>
                    </select>
                </div>
                <div class="no-print mt-3">
                    <a href="<?php echo base_url('akun') ?>" class="btn btn-danger">
                        <i class="fas fa-chevron-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">Simpan</button>
            </form>

        </div>
        <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>