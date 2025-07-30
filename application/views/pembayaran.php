

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pembayaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Pembayaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pembayaran
                            </div>
                            <div class="card-body">
                                <!-- UPDATE -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Customer</th>
                                            <th>No Kendaraan</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- CONTOH DATA -->
                                        <?php if (!empty($pembayaran)) : ?>
                                            <?php foreach ($pembayaran as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo $row['No_Plat']; ?></td>
                                                    <td><?php echo $row['total']; ?></td>
                                                    <td><?php echo $row['STATUS']; ?></td>
                                                    <td>
                                                        <!-- TOMBOL EDIT -->
                                                        <a href="<?php echo base_url('pembayaran/update/'.$row['ID_pembayaran']); ?>" 
                                                        class="btn btn-success btn-sm"
                                                        onclick="return confirm('Update Status Pembayaran?');">
                                                            <i class="fa-solid fa-money-bills"></i>
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
               