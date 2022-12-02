<?php
$selected = (array) $_POST['selected'];
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala WHERE kode_gejala IN ('" . implode("','", $selected) . "')");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Gejala Terpilih</h3>
    </div>
    <table class="table table-bordered table-hover table-striped color-white">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gejala</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($rows as $row) :
            $gejala[$row->kode_gejala] = $row->nama_gejala;
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->nama_gejala ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php

$rows = $db->get_results("SELECT * FROM tb_penyakit ORDER BY kode_penyakit");
foreach ($rows as $row) {
    $penyakit[$row->kode_penyakit] = $row;
}

$data = get_data($selected);

$b = new Bayes($selected, $penyakit, $data);
?>

<!-- PERSENTASE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#persentase" data-toggle="collapse">Persentase</a>
        </h3>
    </div>
    <div class="table-responsive collapse in" id="persentase">
        <table class="table table-bordered table-hover table-striped color-white">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Bayes</th>
                    <th>Persen</th>
                </tr>
            </thead>
            <?php foreach ($b->persen as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $penyakit[$key]->nama_penyakit ?></td>
                    <td><?= round($b->hasil[$key], 4) ?></td>
                    <td><?= round($val * 100, 2) ?>%</td>
                </tr>
            <?php endforeach ?>
            <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td><?= round(array_sum($b->hasil), 4) ?></td>
                    <td>&nbsp;</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="panel-footer">
        <p>
            <?php
            arsort($b->persen);
            $kode_penyakit = key($b->persen);
            $time = date('Y-m-d H:i:s');
            $total_bobot = round($b->persen[$kode_penyakit] * 100, 2);
            
            /** Hasil disimpan kedalam tabel_diagnosa */

            $db->query("INSERT INTO tb_diagnosa (kode_user, kode_penyakit, total_bobot, gejala_pilih, created_at) VALUES ('$_SESSION[login]', '$kode_penyakit', '$total_bobot', '$gejala', '$time')");
            ?>
            Berdasarkan perhitungan sistem, diagnosa penyakit yang diderita adalah <a href="?m=penyakit"><strong><?= $penyakit[$kode_penyakit]->nama_penyakit ?></strong></a>
            dengan hasil <strong><?= round($b->persen[$kode_penyakit] * 100, 2) ?>%</strong>
        </p>
        <h3>Solusi</h3>
        <p><?= $penyakit[$kode_penyakit]->keterangan ?></p>
        <p>
            <a class="btn btn-primary" href="?m=konsultasi"><span class="glyphicon glyphicon-refresh"></span> Konsultasi Lagi</a>
            <a class="btn btn-default" href="cetak.php?m=hasil&<?= http_build_query(array('selected' => $selected)) ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </p>
    </div>
</div>