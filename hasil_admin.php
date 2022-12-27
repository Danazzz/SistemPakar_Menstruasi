<?php
$selected = (array) $_POST['selected'];
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala WHERE kode_gejala IN ('" . implode("','", $selected) . "')");
$gejala_pilih = json_encode($_POST['selected']);
$time = $_POST['time'];
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

$end_time = microtime(true);

$execution_time = $end_time - $start_time;
$exec = number_format($execution_time, 5);
?>

<!-- PROBABILITAS PENYAKIT GEJALA -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#pro_penyakit_gejala" data-toggle="collapse">Probabilitas Penyakit Gejala</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="pro_penyakit_gejala">
        <table class="table table-bordered table-hover table-striped color-white">
            <thead>
                <tr>
                    <th>Probabilitas</th>
                    <th>Nilai</th>
                    <th>Hasil</th>
                </tr>
                <?php foreach ($gejala as $key => $val) : ?>
                    <?php foreach ($b->penyakit as $k => $v) : ?>
                        <tr>
                            <td>P(<?= $key ?>|<?= $k ?>) * P(<?= $k ?>)</td>
                            <td><?= $b->data[$k][$key] * 1 ?> * <?= $b->penyakit[$k]->bobot ?></td>
                            <td><?= $b->pro_gejala_penyakit[$key][$k] * 1 ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            </thead>
        </table>
    </div>
</div>

<!-- PROBILITAS GEJALA -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#pro_gejala" data-toggle="collapse">Probabilitas Gejala</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="pro_gejala">
        <table class="table table-bordered table-hover table-striped color-white">
            <thead>
                <tr>
                    <th>Gejala</th>
                    <th>Probabilitas</th>
                </tr>
                <?php foreach ($b->pro_gejala as $key => $val) : ?>
                    <tr>
                        <td>P(<?= $key ?>)</td>
                        <td><?= $val * 1 ?></td>
                    </tr>
                <?php endforeach ?>
            </thead>
        </table>
    </div>
</div>

<!-- PROBABILITAS TIAP PENYAKIT -->
<?php foreach ($penyakit as $key_penyakit => $val_penyakit) : ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="#pro_penyakit_<?= $key_penyakit ?>" data-toggle="collapse">Probabilitas Penyakit <?= $val_penyakit->nama_penyakit ?></a>
            </h3>
        </div>
        <div class="table-responsive collapse" id="pro_penyakit_<?= $key_penyakit ?>">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Bobot Penyakit Gejala</th>
                        <th>Bobot Gejala</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <?php foreach ((array) $b->pro_penyakit[$key_penyakit] as $key => $val) : ?>
                    <tr>
                        <td>P(<?= $key ?>|<?= $key_penyakit ?>) = <?= $val['x'] ?></td>
                        <td><?= $val['y'] ?></td>
                        <td><?= round($val['z'], 4) ?></td>
                    </tr>
                <?php endforeach ?>
                <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                        <td><?= round($b->hasil[$key_penyakit] * 1, 4) ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php endforeach ?>

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
            $total_bobot = round($b->persen[$kode_penyakit] * 100, 2);
            
            $db->query("INSERT INTO tb_diagnosa (kode_user, kode_penyakit, total_bobot, gejala_pilih, created_at) VALUES ('$_SESSION[login]', '$kode_penyakit', '$total_bobot', '$gejala_pilih', '$time')");
            ?>
            Berdasarkan perhitungan sistem, diagnosa penyakit yang diderita adalah <strong style="color: #00bc8c;"><?= $penyakit[$kode_penyakit]->nama_penyakit ?></strong></a>
            dengan hasil <strong style="color: #00bc8c;"><?= round($b->persen[$kode_penyakit] * 100, 2) ?>%</strong>
            dengan eksekusi waktu <strong style="color: #00bc8c;"><?= $exec ?></strong>
        </p>
        <h3 class="color-white">Keterangan</h3>
        <p class="color-white"><?= $penyakit[$kode_penyakit]->keterangan ?></p>
        <p>
            <a class="btn btn-primary" href="?m=konsultasi"><span class="glyphicon glyphicon-refresh"></span> Konsultasi Lagi</a>
            <a class="btn btn-default" href="cetak.php?m=hasil&<?= http_build_query(array('selected' => $selected)) ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </p>
    </div>
</div>