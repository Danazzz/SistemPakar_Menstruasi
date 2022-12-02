<div class="page-header">
    <h1>Aturan</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="aturan" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=aturan_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="oxa">
        <table class="table table-bordered table-hover table-striped color-white">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Penyakit</th>
                    <th>Gejala</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT r.*, g.nama_gejala, p.nama_penyakit, r.nilai
            FROM tb_aturan r INNER JOIN tb_penyakit p ON p.`kode_penyakit`=r.`kode_penyakit` INNER JOIN tb_gejala g ON g.`kode_gejala`=r.`kode_gejala`
            WHERE r.kode_gejala LIKE '%$q%'
                OR r.kode_penyakit LIKE '%$q%'
                OR g.nama_gejala LIKE '%$q%'
                OR p.nama_penyakit LIKE '%$q%' 
            ORDER BY r.kode_penyakit, r.kode_gejala");
            $no = 0;

            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td>[<?= $row->kode_penyakit ?>] <?= $row->nama_penyakit ?></td>
                    <td>[<?= $row->kode_gejala ?>] <?= $row->nama_gejala ?></td>
                    <td><?= $row->nilai ?></td>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=aturan_ubah&ID=<?= $row->ID ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=aturan_hapus&ID=<?= $row->ID ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>