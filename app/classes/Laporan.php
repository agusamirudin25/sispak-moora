<?php

namespace App\Classes;

header('Access-Control-Allow-Origin:*');


class Laporan
{
    protected $_db;
    public function __construct()
    {
        $this->_db = new Database();
        if (!isset($_SESSION['emailPengguna'])) {
            redirect('Auth');
        }
    }

    public function tahunan()
    {
        $tahun = $_GET['tahun'] ?? null;
        $link_cetak = 'laporan/cetak_tahunan';
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.email = tb_pengguna.email JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
        if($tahun != null) {
            $query .= " WHERE YEAR(tb_diagnosis.created_at) = $tahun";
            $link_cetak .= "?tahun=$tahun";
        }
        $data['diagnosis'] = $this->_db->other_query($query, 2);
        $data['link_cetak'] = $link_cetak;
        view('layouts/_head');
        view('laporan/tahunan', $data);
        view('layouts/_foot');
    }

    public function cetak_tahunan()
    {
        $tahun = $_GET['tahun'] ?? null;
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.email = tb_pengguna.email JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
        if($tahun != null) {
            $query .= " WHERE YEAR(tb_diagnosis.created_at) = $tahun";
        }
        $data['diagnosis'] = $this->_db->other_query($query, 2);
        $data['tahun'] = $tahun;
        view('laporan/cetak_tahunan', $data);
    }

    public function bulanan()
    {
        $tahun = $_GET['tahun'] ?? null;
        $bulan = $_GET['bulan'] ?? null;
        $link_cetak = 'laporan/cetak_bulanan';
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.email = tb_pengguna.email JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
        if($tahun != null && $bulan != null) {
            $query .= " WHERE YEAR(tb_diagnosis.created_at) = $tahun";
            $query .= " AND MONTH(tb_diagnosis.created_at) = $bulan";
            $link_cetak .= "?tahun=$tahun&bulan=$bulan";
        }
        $data['diagnosis'] = $this->_db->other_query($query, 2);
        $data['link_cetak'] = $link_cetak;
        view('layouts/_head');
        view('laporan/bulanan', $data);
        view('layouts/_foot');
    }

    public function cetak_bulanan()
    {
        $tahun = $_GET['tahun'] ?? null;
        $bulan = $_GET['bulan'] ?? null;
        $link_cetak = 'laporan/cetak_bulanan';
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.email = tb_pengguna.email JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
        if($tahun != null && $bulan != null) {
            $query .= " WHERE YEAR(tb_diagnosis.created_at) = $tahun";
            $query .= " AND MONTH(tb_diagnosis.created_at) = $bulan";
            $link_cetak .= "?tahun=$tahun&bulan=$bulan";
        }
        $data['diagnosis'] = $this->_db->other_query($query, 2);
        $data['tahun'] = $tahun;
        $data['bulan'] = bulan($bulan);
        view('laporan/cetak_bulanan', $data);
    }
}
