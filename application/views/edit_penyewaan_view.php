<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penyewaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Edit Penyewaan</h1>
    <form action="<?= base_url('penyewaan/update'); ?>" method="post">
        <input type="hidden" name="ID_pinjam" value="<?= $penyewaan['ID_pinjam']; ?>">

        <div class="mb-3">
            <label for="ID_cus" class="form-label">Nama Customer</label>
            <select name="ID_cus" id="ID_cus" class="form-select custom-select">
                <?php foreach ($customers as $customer): ?>
                    <option value="<?= $customer['ID_cus']; ?>" <?= $penyewaan['ID_cus'] == $customer['ID_cus'] ? 'selected' : ''; ?>>
                        <?= $customer['Nama']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="No_Plat" class="form-label">No Plat Mobil</label>
            <select name="No_Plat" id="No_Plat" class="form-select custom-select">
                <?php foreach ($mobils as $mobil): ?>
                    <option value="<?= $mobil['No_Plat']; ?>" <?= $penyewaan['No_Plat'] == $mobil['No_Plat'] ? 'selected' : ''; ?>>
                        <?= $mobil['No_Plat']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="Tanggal_Pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="Tanggal_Pinjam" id="Tanggal_Pinjam" class="form-control custom-input" value="<?= $penyewaan['Tanggal_Pinjam']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="Tanggal_Kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="Tanggal_Kembali" id="Tanggal_Kembali" class="form-control custom-input" value="<?= $penyewaan['Tanggal_Kembali']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
    </form>
</div>
</body>

</html>