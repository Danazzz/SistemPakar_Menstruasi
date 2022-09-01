<?php

/** class Bayes */
class Bayes
{
    /**
     * Konstruktor class
     * @param array $selected Gejala yang terpilih
     * @param array $penyakit Data semua penyakit (kode, nama, bobot, keterangan)
     * @param array $data Data bobot penyakit untuk setiap gejala
     */
    function __construct($selected, $penyakit, $data)
    {
        $this->selected = $selected;
        $this->penyakit = $penyakit;
        $this->data = $data;
        $this->hitung();
    }

    /**
     * Melakukan proses perhitungan
     */
    function hitung()
    {
        /** probabilitas penyakit gejala */
        $this->pro_gejala_penyakit = array();
        /** perulangan penyakit */
        foreach ($this->data as $key => $val) {
            /** perulangan gejala dan bobot setiap penyakit */
            foreach ($val as $k => $v) {
                /** bobot dikalikan dengan bobot gejala */
                $this->pro_gejala_penyakit[$k][$key] = $v * $this->penyakit[$key]->bobot;
            }
        }

        /** probabilitas penyakit gejala */
        $this->pro_gejala = array();
        foreach ($this->pro_gejala_penyakit as $key => $val) {
            /** mentotalkan (sum) probabilitas gejala penyakit untuk masing-masing gejala */
            $this->pro_gejala[$key] = array_sum($val);
        }

        /** probabilitas penyakit */
        $this->pro_penyakit = array();
        /** perulangan penyakit */
        foreach ($this->pro_gejala_penyakit as $key => $val) {
            /** perulangan gejala */
            foreach ($val as $k => $v) {
                /** x adalah pembilang (pro penyakit gejala) */
                $this->pro_penyakit[$k][$key]['x'] = $v;
                /** y adalah penyabut (pro gejala) */
                $this->pro_penyakit[$k][$key]['y'] = $this->pro_gejala[$key];
                /** probabilitas penyakit adalah x / y */
                $this->pro_penyakit[$k][$key]['z'] = $this->pro_penyakit[$k][$key]['x'] / $this->pro_penyakit[$k][$key]['y'];
            }
        }
        /** hasil probabilitas penyakit */
        $this->hasil = array();
        foreach ($this->penyakit as $key => $val) {
            $this->hasil[$key] = 0;
            /** menjumlahkan semua probabilitas per penyakit (z) */
            foreach ((array) $this->pro_penyakit[$key] as $k => $v) {
                $this->hasil[$key] += $v['z'];
            }
        }
        /** persentase */
        $this->persen = array();
        /** mentotalkan semua probabilitas penyakit */
        $total = array_sum($this->hasil);
        foreach ($this->hasil as $key => $val) {
            /** membagi setiap hasil probabilitas penyakit dengan total */
            $this->persen[$key] = $val / $total;
        }
    }
}
