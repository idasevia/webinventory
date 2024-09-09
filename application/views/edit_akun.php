<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun</title>
                <style>
                    h1 {
                        margin-top: -20px; /* Sesuaikan nilai ini */
                    }
                    .btn-primary {
                        margin-top: -10px; /* Sesuaikan nilai ini */
                    }
                </style>
            <script>
            function confirmEdit() {
                return confirm('Apakah Anda yakin ingin menyimpan perubahan?');}
            </script>
        </head>
    <body>
    <div class="container mt-5">
<div style="margin-bottom: 20px;">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0 text-gray-800" style="color: black; font-weight: bold;">Form Edit Akun</h1>
    <a href="<?php echo base_url('akun') ?>">
        <button class="btn btn-primary">Data Akun</button>
    </a>
</div>

        <form action="<?php echo base_url('akun/action_edit/'.($data['nip'] ?? '')); ?>" method="post" onsubmit="return confirmEdit();">
            <div class="form-group mb-3">
                    <label for="nip">NIP</label>
                    <input readonly type="text" id="nip" name="nip" class="form-control" value="<?php echo htmlspecialchars($data['nip'] ?? ''); ?>" required>
                    </div>  

                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="<?php echo htmlspecialchars($data['nama'] ?? ''); ?>" required>
                    </div>

                    <div class="form-group mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                            <option value="laki-laki" <?php echo (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] === 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="perempuan" <?php echo (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] === 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                         <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($data['username'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                         <label for="password">Password</label>
                         <input type="password" id="password" name="password" class="form-control" value="<?php echo htmlspecialchars($data['password'] ?? ''); ?>" required>
                 </div>
                 <div class="form-group mb-3">
                <label for="level">Level</label>
                <select id="level" name="level" class="form-control" required>
                    <option value="">Pilih Level</option>
                    <option value="1">Operator</option>
                    <option value="2">Koordinator</option>
                </select>
            </div>
                 
            <div class="no-print mt-3">
    <a href="<?php echo base_url('akun') ?>" class="btn btn-danger">
        <i class="fas fa-chevron-left"></i> Kembali
    </a>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
    </div>
</body>
</html>
