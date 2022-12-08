<?php
error_reporting(~E_NOTICE);
session_start();

date_default_timezone_set('asia/hong_kong');

include 'config.php';
include 'includes/db.php';
include 'includes/bayes.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);


function _post($key, $val = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];
    else
        return $val;
}

function _get($key, $val = null)
{
    global $_GET;
    if (isset($_GET[$key]))
        return $_GET[$key];
    else
        return $val;
}

function _session($key, $val = null)
{
    global $_SESSION;
    if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    else
        return $val;
}

$mod = _get('m');
$act = _get('act');


$db->query("DELETE FROM tb_aturan WHERE kode_penyakit NOT IN (SELECT kode_penyakit FROM tb_penyakit)");

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = (string) $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}
function esc_field($str)
{
    if ($str)
        return addslashes($str);
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

function get_data($selected = array())
{
    global $db;
    $rows = $db->get_results("SELECT r.kode_penyakit, r.kode_gejala,  r.nilai  
        FROM tb_aturan r  
        WHERE r.kode_gejala IN ('" . implode("','", $selected) . "') ORDER BY r.kode_penyakit, r.kode_gejala");
    $data = array();
    foreach ($rows as $row) {
        $data[$row->kode_penyakit][$row->kode_gejala] = $row->nilai;
    }
    return $data;
}

function get_penyakit_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_penyakit, nama_penyakit FROM tb_penyakit ORDER BY kode_penyakit");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_penyakit == $selected)
            $a .= "<option value='$row->kode_penyakit' selected>[$row->kode_penyakit] $row->nama_penyakit</option>";
        else
            $a .= "<option value='$row->kode_penyakit'>[$row->kode_penyakit] $row->nama_penyakit</option>";
    }
    return $a;
}

function get_gejala_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala ORDER BY kode_gejala");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_gejala == $selected)
            $a .= "<option value='$row->kode_gejala' selected>[$row->kode_gejala] $row->nama_gejala</option>";
        else
            $a .= "<option value='$row->kode_gejala'>[$row->kode_gejala] $row->nama_gejala</option>";
    }
    return $a;
}
function dd($arr)
{
    echo '<pre>' . print_r($arr, 1) . '</pre>';
}
