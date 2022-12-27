<?php
$selected = (array) $_POST['selected'];
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala WHERE kode_gejala IN ('" . implode("','", $selected) . "')");
$gejala_pilih = json_encode($_POST['selected']);
$time = $_POST['time'];
?>

<sub>Tabel dapat digeser kiri-kanan <span class="glyphicon glyphicon-resize-horizontal"></span></sub>
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

<!-- PERSENTASE -->
<sub>Tabel dapat digeser kiri-kanan <span class="glyphicon glyphicon-resize-horizontal"></span></sub>
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
            <?php foreach ($b->persen as $key => $val) : 
                ?>
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
    <div class="panel-footer text-justify">
        <h3>Hasil</h3>
        <p class="color-white">
            <?php
            arsort($b->persen);
            $kode_penyakit = key($b->persen);
            $total_bobot = round($b->persen[$kode_penyakit] * 100, 2);
            
            $db->query("INSERT INTO tb_diagnosa (kode_user, kode_penyakit, total_bobot, gejala_pilih, created_at) VALUES ('$_SESSION[login]', '$kode_penyakit', '$total_bobot', '$gejala_pilih', '$time')");
            ?>
            Berdasarkan perhitungan sistem, kemungkinan penyakit yang diderita adalah <strong style="color: #00bc8c;"><?= $penyakit[$kode_penyakit]->nama_penyakit ?></strong></a>
            dengan hasil <strong style="color: #00bc8c;"><?= round($b->persen[$kode_penyakit] * 100, 2) ?>%</strong>
        </p>
        <h3>Keterangan</h3>
        <p class="color-white"><?= $penyakit[$kode_penyakit]->keterangan ?></p>
        <div>
            <a class="btn btn-primary" href="https://forms.gle/a7izEmGV89uUsGJGA" target="_blank"> Survey </a>
            <hr>
            <a class="btn btn-secondary" href="?m=konsultasi"><span class="glyphicon glyphicon-refresh"></span> Konsultasi Lagi</a>
            <a class="btn btn-default" href="cetak.php?m=hasil&<?= http_build_query(array('selected' => $selected, 'time' => $time)) ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </div>
    </div>
</div>
<a class="btn btn-danger" href="?"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>