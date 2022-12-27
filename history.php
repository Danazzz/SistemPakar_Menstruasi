<?php
if ($_SESSION['akses'] == '0') {
    $rows = $db->get_results("SELECT tb_user.kode_user, tb_user.user, tb_penyakit.nama_penyakit, tb_diagnosa.total_bobot, tb_diagnosa.gejala_pilih, tb_diagnosa.created_at FROM tb_diagnosa
    INNER JOIN tb_user ON tb_diagnosa.kode_user = tb_user.kode_user
    INNER JOIN tb_penyakit ON tb_diagnosa.kode_penyakit = tb_penyakit.kode_penyakit
    ");
} elseif ($_SESSION['akses'] == '1') {
    $rows = $db->get_results("SELECT tb_user.kode_user, tb_user.user, tb_penyakit.nama_penyakit, tb_diagnosa.total_bobot, tb_diagnosa.gejala_pilih, tb_diagnosa.created_at FROM tb_diagnosa
    INNER JOIN tb_user ON tb_diagnosa.kode_user = tb_user.kode_user
    INNER JOIN tb_penyakit ON tb_diagnosa.kode_penyakit = tb_penyakit.kode_penyakit
    WHERE tb_user.kode_user='$_SESSION[login]'
    ");
}
?>

<div class="page-header">
    <h1>History</h1>
</div>
<sub>Tabel dapat digeser kiri-kanan <span class="glyphicon glyphicon-resize-horizontal"></span></sub>
<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped color-white">
            <thead>
                <tr>
                    <th style="width: 1%;">No</th>
                    <th style="width: 12%">Nama</th>
                    <th style="width: 5%">Penyakit</th>
                    <th style="width: 5%"> Hasil Diagnosa</th>
                    <th style="width: 10%">Waktu</th>
                    <th style="width: 30%">Gejala</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($rows as $row) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->user ?></td>
                    <td><?= $row->nama_penyakit ?></td>
                    <td><?= $row->total_bobot ?></td>
                    <td><?= $row->created_at ?></td>
                    <td>
                        <ul>
                            <?php
                            $gejala_pilih = json_decode($row->gejala_pilih);
                            $rows=$db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala 
                            WHERE kode_gejala IN ('" . implode("','", $gejala_pilih) . "')");
                            foreach ($rows as $row) :
                            ?>
                                <li>(<?=$row->kode_gejala ?>)</li>
                                <li><?= $row->nama_gejala ?></li>
                            <?php endforeach;?>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>