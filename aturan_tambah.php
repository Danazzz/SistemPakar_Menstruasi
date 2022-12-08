<div class="page-header">
    <h1>Tambah Aturan</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Diagnosa <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_penyakit">
                    <option value="">&nbsp;</option>
                    <?= get_penyakit_option($_POST['kode_penyakit']) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_gejala">
                    <option value="">&nbsp;</option>
                    <?= get_gejala_option($_POST['kode_gejala']) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nilai <span class="text-danger">*</span></label>
                <select name="nilai" class="form-control">
                    <option selected disabled>-</option>
                    <option value=0>Tidak ada</option>
                    <option value=0.4>Mungkin</option>
                    <option value=0.6>Kemungkinan Besar</option>
                    <option value=0.8>Hampir Pasti</option>
                    <option value=1>Pasti</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=aturan"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>