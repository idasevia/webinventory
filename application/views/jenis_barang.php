<?= $this->session->flashdata('pesan_tambah'); ?>
<?= $this->session->flashdata('pesan_edit'); ?>
<?= $this->session->flashdata('pesan_hapus'); ?>
<div class="container-fluid">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-0">
            <h1 class="h4 mb-0 text-gray-800" style="color: black; font-weight: bold;">Jenis Barang</h1>
        </div>
        <br>
        <div class="d-flex">
            <a href="<?php echo base_url('jenis_barang/tambah_jenis') ?>" class="btn btn-primary mr-2">
                <i class="fas fa-plus"></i>Tambah Jenis</a>
            <a href="" class="btn btn-primary">
                <i class="fas fa-plus"></i>Import</a>
        </div>
        <br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Master Jenis Barang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="5%">No</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;">Jenis Barang</td>
                                <td class="bg-primary" style="color: white; font-weight: bold;" width="15%">Aksi</td>
                                <!-- <th scope="col"> Name</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($jenis as $js) : ?>
                                <tr>
                                    <td><?php echo $no++ ?> </td>
                                    <td><?php echo $js->jenis_barang; ?> </td>
                                    <td>
                                        <a href="<?php echo base_url('jenis_barang/edit_jenis/' . urlencode($js->jenis_barang)); ?>"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit">Edit</i>
                                        </a>
                                        <a href="<?php echo base_url('jenis_barang/hapus_jenis/' . $js->jenis_barang); ?>"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus jenis barang ini?')">
                                            <i class="fas fa-trash">Hapus</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>