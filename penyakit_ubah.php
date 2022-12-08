<?php
$row = $db->get_row("SELECT * FROM tb_penyakit WHERE kode_penyakit='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Penyakit</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_penyakit" readonly="readonly" value="<?= $row->kode_penyakit ?>" />
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_penyakit" value="<?= $row->nama_penyakit ?>" />
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <select name="bobot" class="form-control">
                    <?php
                    if($row->bobot == 0){ ?>
                        <option value=0 selected>Tidak ada</option>
                        <option value=0.3>Sedikit Ada</option>
                        <option value=0.8>Ada</option>
                        <option value=1>Sangat Ada</option>
                    <?php
                    } else if($row->bobot == 0.3){ ?>
                        <option value=0.3 selected>Sedikit Ada</option>
                        <option value=0>Tidak Ada</option>
                        <option value=0.8>Ada</option>
                        <option value=1>Sangat Ada</option>
                    <?php
                    } else if($row->nilai == 0.8){ ?>
                        <option value=0.8 selected>Ada</option>
                        <option value=0>Tidak Ada</option>
                        <option value=0.3>Sedikit Ada</option>
                        <option value=1>Sangat Ada</option>
                    <?php	
                    } else if($row->nilai == 1){ ?>
                        <option value=1 selected>Sangat Ada</option>
                        <option value=0>Tidak ada</option>
                        <option value=0.3>Sedikit Ada</option>
                        <option value=0.8>Ada</option>
                    <?php
                    } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan"><?= $row->keterangan ?></textarea>
            </div>
            <div class="page-header">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=penyakit"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>