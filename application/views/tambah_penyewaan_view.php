<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Transaksi</h1>
            <div class="card mb-4">
                <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah penyewaan 
                </div>
                <div class="card-body">
                    <form action="<?= base_url('penyewaan/tambah_penyewaan'); ?>" method="post">
                        <div class="mb-3">
                            <label for="id_cus" class="form-label">Nama Customer</label>
                            <select name="id_cus" id="id_cus" class="form-select">
                                <?php foreach ($customers as $customer): ?>
                                    <option value="<?= $customer['ID_cus']; ?>"><?= $customer['Nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no_plat" class="form-label">No Plat Mobil</label>
                            <select name="no_plat" id="no_plat" class="form-select">
                                <?php foreach ($mobils as $mobil): ?>
                                    <option value="<?= $mobil['No_Plat']; ?>"><?= $mobil['No_Plat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>