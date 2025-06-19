<?= $this->extend('templates/index') ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('qurban/save'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="user_id">Pilih User</label>
                    <select name="user_id" id="user_id" class="form-control <?= session('errors.user_id') ? 'is-invalid' : ''; ?>">
                        <option value="">-- Pilih User --</option>
                        <?php foreach ($users as $user) : ?>
                        <option value="<?= $user->id; ?>" <?= old('user_id') == $user->id ? 'selected' : ''; ?>><?= $user->username; ?> (<?= $user->email; ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= session('errors.user_id'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="animal_type">Jenis Hewan</label>
                    <select name="animal_type" id="animal_type" class="form-control <?= session('errors.animal_type') ? 'is-invalid' : ''; ?>">
                        <option value="kambing" <?= old('animal_type') == 'kambing' ? 'selected' : ''; ?>>Kambing</option>
                        <option value="sapi" <?= old('animal_type') == 'sapi' ? 'selected' : ''; ?>>Sapi</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= session('errors.animal_type'); ?>
                    </div>
                </div>

                <div class="form-group" id="animal_tag_group" style="display: <?= old('animal_type', 'kambing') == 'kambing' ? 'block' : 'none'; ?>;">
                    <label for="animal_tag">Tag Unik Hewan (Untuk Kambing)</label>
                    <input type="text" class="form-control <?= session('errors.animal_tag') ? 'is-invalid' : ''; ?>" id="animal_tag" name="animal_tag" value="<?= old('animal_tag'); ?>" placeholder="Contoh: K001">
                    <small class="form-text text-muted">Beri tanda unik untuk setiap kambing agar bisa dilacak.</small>
                    <div class="invalid-feedback">
                        <?= session('errors.animal_tag'); ?>
                    </div>
                </div>

                <div class="form-group" id="share_number_group" style="display: <?= old('animal_type') == 'sapi' ? 'block' : 'none'; ?>;">
                    <label for="share_number">Jumlah Bagian (Untuk Sapi)</label>
                    <input type="number" class="form-control <?= session('errors.share_number') ? 'is-invalid' : ''; ?>" id="share_number" name="share_number" value="<?= old('share_number'); ?>" min="1" max="7">
                    <small class="form-text text-muted">Untuk qurban sapi, satu sapi bisa untuk 7 orang. Masukkan jumlah bagian yang diambil (1-7).</small>
                    <div class="invalid-feedback">
                        <?= session('errors.share_number'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="payment_status">Status Pembayaran</label>
                    <select name="payment_status" id="payment_status" class="form-control <?= session('errors.payment_status') ? 'is-invalid' : ''; ?>">
                        <option value="unpaid" <?= old('payment_status') == 'unpaid' ? 'selected' : ''; ?>>Belum Lunas</option>
                        <option value="paid" <?= old('payment_status') == 'paid' ? 'selected' : ''; ?>>Lunas</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= session('errors.payment_status'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('animal_type').addEventListener('change', function() {
        var shareNumberGroup = document.getElementById('share_number_group');
        var animalTagGroup = document.getElementById('animal_tag_group');
        if (this.value === 'sapi') {
            shareNumberGroup.style.display = 'block';
            animalTagGroup.style.display = 'none';
            document.getElementById('animal_tag').value = ''; 
        } else {
            shareNumberGroup.style.display = 'none';
            animalTagGroup.style.display = 'block';
            document.getElementById('share_number').value = '';
        }
    });
    // Jalankan saat halaman dimuat untuk set state awal
    document.getElementById('animal_type').dispatchEvent(new Event('change'));
</script>
<?= $this->endSection(); ?>