<link rel="icon" href="favicon.ico" />
<h1>Hasil Diagnosa</h1>
<?php
$selected = (array) $_GET['selected'];
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala WHERE kode_gejala IN ('" . implode("','", $selected) . "')");
$time = $_GET['time'];

$users = $db->get_results("SELECT tb_user.kode_user, tb_user.user, tb_user.tgl_lahir, tb_user.kota_asal, tb_user.jenis_kelamin, tb_user.pekerjaan, tb_diagnosa.created_at FROM tb_user INNER JOIN tb_diagnosa ON tb_user.kode_user = tb_diagnosa.kode_user WHERE tb_diagnosa.created_at = '$time'");
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Profil</h3>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID Pengguna</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Asal</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>Tanggal Konsultasi</th>
            </tr>
        </thead>
        <?php
        foreach ($users as $user) :
        ?>
            <tr>
                <td><?= $user->kode_user ?></td>
                <td><?= $user->user ?></td>
                <td><?= $user->tgl_lahir ?></td>
                <td><?= $user->kota_asal ?></td>
                <td><?= $user->jenis_kelamin ?></td>
                <td><?= $user->pekerjaan ?></td>
                <td><?= $user->created_at ?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Gejala Terpilih</h3>
    </div>
    <table class="table table-bordered table-hover table-striped">
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
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#pro_penyakit_gejala" data-toggle="collapse">Probabilitas Penyakit Gejala</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="pro_penyakit_gejala">
        <table class="table table-bordered table-hover table-striped">
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
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#pro_gejala" data-toggle="collapse">Probabilitas Gejala</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="pro_gejala">
        <table class="table table-bordered table-hover table-striped">
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

<?php foreach ($penyakit as $key_penyakit => $val_penyakit) : ?>
    <div class="panel panel-primary">
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
                        <td>P(<?= $key ?>|<?= $k ?>) = <?= $val['x'] ?></td>
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

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#persentase" data-toggle="collapse">Persentase</a>
        </h3>
    </div>
    <div class="table-responsive collapse in" id="persentase">
        <table class="table table-bordered table-hover table-striped">
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
            ?>
            Berdasarkan perhitungan sistem, diagnosa penyakit yang diderita adalah <a href="?m=penyakit"><strong><?= $penyakit[$kode_penyakit]->nama_penyakit ?></strong></a>
            dengan hasil <strong><?= round($b->persen[$kode_penyakit] * 100, 2) ?>%</strong>
        </p>
        <h3>Solusi</h3>
        <p><?= $penyakit[$kode_penyakit]->keterangan ?></p>
    </div>
</div>