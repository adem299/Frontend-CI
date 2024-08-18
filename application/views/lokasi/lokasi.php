<?php include __DIR__ . '/../components/header.php'; ?>

<div class="container mt-4 min-vh-auto">
    <h3>Daftar Lokasi</h3>

    <?php if (!empty($lokasi)): ?>
        <table class="table table-striped">
            <thead class="thead-light">
                <tr class="small">
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Negara</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($lokasi as $item): ?>
                    <?php
                    $date = new DateTime($item['created_at']);
                    $formattedDate = $date->format('Y-m-d');
                    ?>
                    <tr class="small">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($item['nama_lokasi'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['kota'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['provinsi'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item['negara'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <a href="lokasi/form?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="lokasi/delete/<?php echo $item['id']; ?>" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?');">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data lokasi yang tersedia.</p>
    <?php endif; ?>

    <a href="lokasi/form" class="btn btn-primary mt-4">Tambah Lokasi Baru</a>
</div>
<?php include __DIR__ . '/../components/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
