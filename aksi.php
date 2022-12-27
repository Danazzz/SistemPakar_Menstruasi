<?php
require_once 'functions.php';

/** SIGN UP */
if ($mod == 'signup') {
    $email = esc_field($_POST['email']);
    $user = esc_field($_POST['user']);
    $pass1 = esc_field($_POST['pass1']);
    $pass2 = esc_field($_POST['pass2']);
    $tgl = esc_field($_POST['tgl']);
    $jkel = esc_field($_POST['jkel']);
    $kota = esc_field($_POST['kota']);
    $pekerjaan = esc_field($_POST['pekerjaan']);
    $time = date('Y-m-d H:i:s');
    $kode_user = uniqid();
    
    if ($db->get_results("SELECT * FROM tb_user WHERE email='$email'")){
        print_msg("Email sudah ada!");
    } elseif ($pass1 != $pass2){
        print_msg('Password dan konfirmasi password tidak sama.');
    } else {
        $db->query("INSERT INTO tb_user (kode_user, email, pass, user, tgl_lahir, jenis_kelamin, kota_asal, pekerjaan, hak_akses, created_at) VALUES ('$kode_user', '$email', '$pass', '$user', '$tgl', '$jkel', '$kota', '$pekerjaan', '1', '$time')");
        redirect_js("index.php?m=login");
    }
}

/** LOGIN */
if ($mod == 'login') {
    $email = esc_field($_POST['email']);
    $pass = esc_field($_POST['pass']);
    $time = date('Y-m-d H:i:s');

    $row = $db->get_row("SELECT * FROM tb_user WHERE email='$email' AND pass='$pass'");
    
    if ($row) {
        $_SESSION['login'] = $row->kode_user;
        $_SESSION['akses'] = $row->hak_akses;
        if (_session('login')){
            $db->query("UPDATE tb_user SET login_at='$time' WHERE kode_user='$_SESSION[login]'");
            redirect_js("index.php");
        } else {
            print_msg("Silahkan ulangi kembali Log in");
        }
    } else {
        print_msg("Salah kombinasi Username dan Password.");
    }
} else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_user WHERE kode_user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2', update_at='$time' WHERE kode_user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    $time = date('Y-m-d H:i:s');
    $db->query("UPDATE tb_user SET logout_at = '$time' WHERE kode_user='$_SESSION[login]'");
    unset($_SESSION['login']);
    unset($_SESSION['akses']);
    header("location:index.php?m=login");
}

/** PENYAKIT */
elseif ($mod == 'penyakit_tambah') {
    $kode_penyakit = $_POST['kode_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];
    $bobot = $_POST['bobot'];
    $keterangan = $_POST['keterangan'];

    if (!$kode_penyakit || !$nama_penyakit || !$bobot)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_penyakit WHERE kode_penyakit='$kode_penyakit'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_penyakit (kode_penyakit, nama_penyakit, bobot, keterangan) VALUES ('$kode_penyakit', '$nama_penyakit', '$bobot', '$keterangan')");
        redirect_js("index.php?m=penyakit");
    }
} else if ($mod == 'penyakit_ubah') {
    $nama_penyakit = $_POST['nama_penyakit'];
    $bobot = $_POST['bobot'];
    $keterangan = $_POST['keterangan'];

    if (!$nama_penyakit || !$bobot)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_penyakit SET nama_penyakit='$nama_penyakit', bobot='$bobot', keterangan='$keterangan' WHERE kode_penyakit='$_GET[ID]'");
        redirect_js("index.php?m=penyakit");
    }
} else if ($act == 'penyakit_hapus') {
    $db->query("DELETE FROM tb_penyakit WHERE kode_penyakit='$_GET[ID]'");
    header("location:index.php?m=penyakit ");
}

/** GEJALA */
if ($mod == 'gejala_tambah') {
    $kode_gejala = $_POST['kode_gejala'];
    $nama_gejala = $_POST['nama_gejala'];

    if (!$kode_gejala || !$nama_gejala)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala='$kode_gejala'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_gejala (kode_gejala, nama_gejala) VALUES ('$kode_gejala', '$nama_gejala')");
        redirect_js("index.php?m=gejala");
    }
} else if ($mod == 'gejala_ubah') {
    $nama_gejala = $_POST['nama_gejala'];

    if (!$nama_gejala)
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_gejala SET nama_gejala='$nama_gejala' WHERE kode_gejala='$_GET[ID]'");
        redirect_js("index.php?m=gejala");
    }
} else if ($act == 'gejala_hapus') {
    $db->query("DELETE FROM tb_gejala WHERE kode_gejala='$_GET[ID]'");
    header("location:index.php?m=gejala");
}

/** ATURAN */
else if ($mod == 'aturan_tambah') {
    $kode_penyakit = $_POST['kode_penyakit'];
    $kode_gejala = $_POST['kode_gejala'];
    $nilai = $_POST['nilai'];

    $kombinasi_ada = $db->get_row("SELECT * FROM tb_aturan WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$kode_gejala'");

    if (!$kode_penyakit || !$kode_gejala || !$nilai)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else {
        $db->query("INSERT INTO tb_aturan (kode_penyakit, kode_gejala, nilai) VALUES ('$kode_penyakit', '$kode_gejala', '$nilai')");
        redirect_js("index.php?m=aturan");
    }
} else if ($mod == 'aturan_ubah') {
    $kode_penyakit = $_POST['kode_penyakit'];
    $kode_gejala = $_POST['kode_gejala'];
    $nilai = $_POST['nilai'];

    $kombinasi_ada = $db->get_row("SELECT * FROM tb_aturan WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$kode_gejala' AND ID<>'$_GET[ID]'");

    if (!$kode_penyakit || !$kode_gejala || !$nilai)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($kombinasi_ada)
        print_msg("Kombinasi penyakit dan gejala sudah ada!");
    else {
        $db->query("UPDATE tb_aturan SET kode_penyakit='$kode_penyakit', kode_gejala='$kode_gejala', nilai='$nilai' WHERE ID='$_GET[ID]'");
        redirect_js("index.php?m=aturan");
    }
    header("location:index.php?m=aturan");
} else if ($act == 'aturan_hapus') {
    $db->query("DELETE FROM tb_aturan WHERE ID='$_GET[ID]'");
    header("location:index.php?m=aturan");
}