
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Kendaraan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Ketersediaan Kendaraan
                            </div>
                            <div class="card-body">
                                <!-- searching dan urut -->
                                <div class="d-flex flex-column gap-3 mb-4">
                                    <!-- Search Form -->
                                    <form class="d-flex me-auto" action="<?php echo base_url('dashboard/cari_kendaraan'); ?>" method="post">
                                        <input type="text" name="merk" class="form-control me-2 rounded-pill" placeholder="Merk" aria-label="Merk">

                                        <input type="number" name="max_harga" class="form-control me-2 rounded-pill" placeholder="Harga Minimum" aria-label="Harga Maksimum">
                                        <input type="number" name="min_harga" class="form-control me-2 rounded-pill" placeholder="Harga Maximum" aria-label="Harga Minimum">
                                        <button class="btn btn-light text-primary fw-bold rounded-pill" type="submit">
                                            <i class="bi bi-search"></i> Filter
                                        </button>
                                    </form>

                                    <!-- Sort Form -->
                                    <form action="<?php echo base_url('dashboard/urutkan'); ?>" method="post" class="d-flex align-items-center gap-2">
                                        <label for="urutkan" class="mb-0">Urutkan berdasarkan:</label>
                                        <select name="urutkan" id="urutkan" class="form-select rounded-pill" style="width: auto;">
                                            <option value="harga_terendah">Harga Terendah</option>
                                            <option value="harga_tertinggi">Harga Tertinggi</option>
                                        </select>
                                        <button type="submit" class="btn btn-light text-primary fw-bold rounded-pill">Urutkan</button>
                                    </form>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>No plat</th>
                                            <th>Jenis</th>
                                            <th>Merk</th>
                                            <th>Harga/hari</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no= 1;
                                        foreach($kendaraan as $k) :?>
                                            <tr>
                                                <td><?= $no++?></td>
                                                <td><?= $k['No_Plat']?></td>
                                                <td><?= $k['Jenis']?></td>
                                                <td><?= $k['Merk']?></td>                                            
                                                <td><?= $k['Harga_Per_Hari']?></td>                                            
                                            </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
               