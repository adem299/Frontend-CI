<?php include  __DIR__ . '/../components/header.php'; ?>

<div class="container mt-4 min-vh-auto">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3">Daftar Proyek</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="proyek/form" class="btn btn-sm btn-primary">Tambah Proyek Baru</a>
            </div>
        </div>

        <?php if (!empty($proyek)): ?>
            <table class="table table-striped">
            <thead class="thead-light">
                <tr class="small">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Proyek</th>
                    <th scope="col">Client</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Pimpinan Proyek</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($proyek as $item): ?>
                    <?php
                    $date = new DateTime($item['created_at']);
                    $formattedDate = $date->format('Y-m-d');
                    ?>
                    <tr class="small">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($item['nama_proyek'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['tgl_mulai'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['tgl_selesai'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['pimpimnan_proyek'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['keterangan'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php echo htmlspecialchars($item['lokasi']['nama_lokasi'], ENT_QUOTES, 'UTF-8'); ?><br>
                            <?php echo htmlspecialchars($item['lokasi']['kota'], ENT_QUOTES, 'UTF-8'); ?>,<br>
                            <?php echo htmlspecialchars($item['lokasi']['provinsi'], ENT_QUOTES, 'UTF-8'); ?>,<br>
                            <?php echo htmlspecialchars($item['lokasi']['negara'], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="proyek/form?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <form action="proyek/delete/<?php echo $item['id']; ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

            </table>
        <?php else: ?>
            <p>Tidak ada data Proyek yang tersedia.</p>
        <?php endif; ?>
</div>
<?php include __DIR__ . '/../components/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
