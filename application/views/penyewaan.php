<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Penyewaan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Detail Penyewaan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Penyewaan
                </div>
                <div class="card-body">
                    <!-- FORM TAMBAH TRANSAKSI -->
                    <div class="d-flex flex-column gap-3 mb-4">

                        <form action="<?php echo base_url('penyewaan/tambah_penyewaan'); ?>" method="post" class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-primary text-white fw-bold rounded-pill">Tambah Transaksi</button>
                        </form>
                    </div>
                    
                    <!-- TABEL PENYEWAAN -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Customer</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>No Kendaraan</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- CONTOH DATA -->
                            <?php if (!empty($penyewaan)) : ?>
                                <?php foreach ($penyewaan as $row): ?>
                                    <tr>
                                        <td><?php echo $row['nama_customer']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td><?php echo $row['no_telp']; ?></td>
                                        <td><?php echo $row['no_plat']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($row['tanggal_pinjam'])); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($row['tanggal_kembali'])); ?></td>
                                        <td>
                                            <!-- TOMBOL HAPUS -->
                                            <a href="<?php echo base_url('penyewaan/hapus/' . $row['id_pinjam']); ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <!-- TOMBOL EDIT -->
                                            <a href="<?php echo base_url('penyewaan/edit/' . $row['id_pinjam']); ?>" 
                                               class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data penyewaan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
