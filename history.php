<?php
if ($_SESSION['akses'] == '0') {
    $rows = $db->get_results("SELECT tb_user.kode_user, tb_user.user, tb_penyakit.nama_penyakit, tb_diagnosa.total_bobot, tb_diagnosa.created_at FROM tb_diagnosa
    INNER JOIN tb_user ON tb_diagnosa.kode_user = tb_user.kode_user
    INNER JOIN tb_penyakit ON tb_diagnosa.kode_penyakit = tb_penyakit.kode_penyakit
    ");
} elseif ($_SESSION['akses'] == '1') {
    $rows = $db->get_results("SELECT tb_user.kode_user, tb_user.user, tb_penyakit.nama_penyakit., tb_diagnosa.total_bobot, tb_diagnosa.created_at FROM tb_diagnosa
    INNER JOIN tb_user ON tb_diagnosa.kode_user = tb_user.kode_user
    INNER JOIN tb_penyakit ON tb_diagnosa.kode_penyakit = tb_penyakit.kode_penyakit
    WHERE tb_user.kode_user='$_SESSION[login]'
    ");
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Gejala Terpilih</h3>
    </div>
    <table class="table table-bordered table-hover color-white">
        <thead>
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Penyakit</th>
                <th>Total Bobot</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($rows as $row) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->kode_user ?></td>
                <td><?= $row->user ?></td>
                <td><?= $row->nama_penyakit ?></td>
                <td><?= $row->total_bobot ?></td>
                <td><?= $row->created_at ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>