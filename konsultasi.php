<div class="page-header">
    <h1>Konsultasi</h1>
</div>
<?php
$success = false;
if ($_POST) {
    if (count((array)$_POST['selected']) > 0) {
        $success = true;
        if ($_SESSION['akses'] == '0') {
            $start_time = microtime(true);
            include 'hasil_admin.php';
        } elseif ($_SESSION['akses'] == '1') {
            include 'hasil.php';
        }
    } else {
        print_msg('Pilih minimal 1 gejala');
    }
}
if (!$success) : ?>
    <sub>Tabel dapat digeser kiri-kanan <span class="glyphicon glyphicon-resize-horizontal"></span></sub>
    <form action="?m=konsultasi" method="post">
        <input type="hidden" name="time" value="<?= date('Y-m-d H:i:s') ?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Pilih Gejala</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover color-white">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll" /></th>
                            <th>No</th>
                            <th>Nama Gejala</th>
                        </tr>
                    </thead>
                    <?php
                    $rows = $db->get_results("SELECT * FROM tb_gejala ORDER BY kode_gejala");
                    $no = 0;
                    foreach ($rows as $row) : ?>
                        <tr>
                            <td><input type="checkbox" name="selected[]" value="<?= $row->kode_gejala ?>" /></td>
                            <td><?= $row->kode_gejala ?></td>
                            <td><?= $row->nama_gejala ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-ok"></span> Submit Diagnosa</button>
            </div>
        </div>
    </form>
    <a class="btn btn-danger" href="?"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
    <script>
        $(function() {
            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });
    </script>
<?php endif ?>