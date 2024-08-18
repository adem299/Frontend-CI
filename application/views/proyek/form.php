<?php include __DIR__ . '/../components/header.php'; ?>

<div class="container mt-5">
    <h2><?php echo isset($proyek) ? 'Edit Proyek' : 'Tambah Proyek Baru'; ?></h2>

    <form action="<?php echo site_url('proyek/form_process'); ?>" method="POST">
        <?php if (isset($proyek)): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($proyek['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <?php endif; ?>
        <div class="form-group">
            <label for="nama_proyek">Nama Proyek</label>
            <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" required value="<?php echo isset($proyek) ? htmlspecialchars($proyek['nama_proyek'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="client">Client</label>
            <input type="text" class="form-control" id="client" name="client" required value="<?php echo isset($proyek) ? htmlspecialchars($proyek['client'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="tgl_mulai">Tanggal Mulai</label>
            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required value="<?php echo isset($proyek) ? htmlspecialchars($proyek['tgl_mulai'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="tgl_selesai">Tanggal Selesai</label>
            <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required value="<?php echo isset($proyek) ? htmlspecialchars($proyek['tgl_selesai'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="pimpimnan_proyek">Pimpinan Proyek</label>
            <input type="text" class="form-control" id="pimpimnan_proyek" name="pimpimnan_proyek" required value="<?php echo isset($proyek) ? htmlspecialchars($proyek['pimpimnan_proyek'], ENT_QUOTES, 'UTF-8') : ''; ?>">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required><?php echo isset($proyek) ? htmlspecialchars($proyek['keterangan'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="lokasi_id">Lokasi</label>
            <select class="form-control" id="lokasi_id" name="lokasi_id" required>
                <?php foreach ($lokasi_options as $lokasi): ?>
                    <option value="<?php echo htmlspecialchars($lokasi['id'], ENT_QUOTES, 'UTF-8'); ?>"
                        <?php echo (isset($proyek['lokasi_id']) && $proyek['lokasi_id'] == $lokasi['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($lokasi['nama_lokasi'], ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>

        </div>
        <button type="submit" class="btn btn-primary"><?php echo isset($proyek) ? 'Update Proyek' : 'Simpan Proyek'; ?></button>
    </form>
</div>

<?php include __DIR__ . '/../components/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
