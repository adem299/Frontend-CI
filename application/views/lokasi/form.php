<?php include __DIR__ . '/../components/header.php'; ?>

<div class="container mt-5">
    <h2><?php echo isset($lokasi) ? 'Edit Lokasi' : 'Tambah Lokasi Baru'; ?></h2>

    <form action="<?php echo site_url('lokasi/form_process'); ?>" method="POST">
        <?php if (isset($lokasi)): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($lokasi['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <?php endif; ?>
        <div class="form-group">
            <label for="nama_lokasi">Nama Lokasi</label>
            <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required value="<?php echo isset($lokasi) ? htmlspecialchars($lokasi['nama_lokasi'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" required value="<?php echo isset($lokasi) ? htmlspecialchars($lokasi['kota'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" required value="<?php echo isset($lokasi) ? htmlspecialchars($lokasi['provinsi'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="negara">Negara</label>
            <input type="text" class="form-control" id="negara" name="negara" required value="<?php echo isset($lokasi) ? htmlspecialchars($lokasi['negara'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <button type="submit" class="btn btn-primary"><?php echo isset($lokasi) ? 'Update Lokasi' : 'Simpan Lokasi'; ?></button>
    </form>
</div>

<?php include __DIR__ . '/../components/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
