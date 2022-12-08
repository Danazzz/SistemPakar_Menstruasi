<?php
$row = $db->get_row("SELECT * FROM tb_aturan WHERE ID='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Aturan</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Penyakit <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_penyakit">
                    <option value="">&nbsp;</option>
                    <?= get_penyakit_option($row->kode_penyakit) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_gejala">
                    <option value=""></option>
                    <?= get_gejala_option($row->kode_gejala) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nilai <span class="text-danger">*</span></label>
                <select name="nilai" class="form-control">
                    <?php
                    if($row->nilai == 0){ ?>
                        <option value=0 selected>Tidak ada</option>
                        <option value=0.4>Mungkin</option>
                        <option value=0.6>Kemungkinan Besar</option>
                        <option value=0.8>Hampir Pasti</option>
                        <option value=1>Pasti</option>
                    <?php
                    } else if($row->nilai == 0.4){ ?>
                        <option value=0.4 selected>Mungkin</option>
                        <option value=0>Tidak ada</option>
                        <option value=0.6>Kemungkinan Besar</option>
                        <option value=0.8>Hampir Pasti</option>
                        <option value=1>Pasti</option>
                    <?php
                    } else if($row->nilai == 0.6){ ?>
                        <option value=0.6 selected>Kemungkinan Besar</option>
                        <option value=0>Tidak ada</option>
                        <option value=0.4>Mungkin</option>
                        <option value=0.8>Hampir Pasti</option>
                        <option value=1>Pasti</option>
                    <?php	
                    } else if($row->nilai == 0.8){ ?>
                        <option value=0.8 selected>Hampir Pasti</option>
                        <option value=0>Tidak ada</option>
                        <option value=0.4>Mungkin</option>
                        <option value=0.6>Kemungkinan Besar</option>
                        <option value=1>Pasti</option>
                    <?php
                    } else if($row->nilai == 1){ ?>
                        <option value=1 selected>Pasti</option>
                        <option value=0>Tidak ada</option>
                        <option value=0.4>Mungkin</option>
                        <option value=0.6>Kemungkinan Besar</option>
                        <option value=0.8>Hampir Pasti</option>
                    <?php
                    } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=aturan"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>