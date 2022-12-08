<div class="page-header">
    <h1>Tambah Penyakit</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_penyakit" value="<?= set_value('kode_penyakit', kode_oto('kode_penyakit', 'tb_penyakit', 'P', 2)) ?>" />
            </div>
            <div class="form-group">
                <label>Nama Penyakit <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_penyakit" />
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <select name="bobot" class="form-control">
                    <option selected disabled>-</option>
                    <option value=0>Tidak ada</option>
                    <option value=0.3>Sedikit Ada</option>
                    <option value=0.8>Ada</option>
                    <option value=1>Sangat Ada</option>
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=penyakit"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>