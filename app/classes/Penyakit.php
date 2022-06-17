<?php

namespace App\Classes;


header('Access-Control-Allow-Origin:*');


class Penyakit
{
    protected $_db;
    public function __construct()
    {
        $this->_db = new Database();
        if (!isset($_SESSION['emailPengguna'])) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['penyakit'] = $this->_db->other_query("SELECT * FROM tb_penyakit", 2);
        view('layouts/_head');
        view('penyakit/index', $data);
        view('layouts/_foot');
    }

    

    public function tambahPenyakit()
    {
        $kode_terakhir = $this->_db->get_last_param('tb_penyakit', 'kode_penyakit');
        if ($kode_terakhir) {
            $nilai_kode = substr($kode_terakhir['kode_penyakit'], 1);
            $kode = (int) $nilai_kode;
            $kode = $kode + 1;
            $kode_otomatis = "P" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kode_otomatis = "P1";
        }
        $data['kode_otomatis'] = $kode_otomatis;
        view('layouts/_head');
        view('penyakit/tambah_data', $data);
        view('layouts/_foot');
    }
    public function prosesTambahPenyakit()
    {
        $input = post();
        $kode_penyakit = $input['kode_penyakit'];
        $nama_penyakit = ($input['penyakit']);
        $solusi = $input['solusi'];
        // cek nama_penyakit sudah ada atau belum
        $cek_nama_penyakit = $this->_db->other_query("SELECT * FROM tb_penyakit WHERE penyakit = '{$nama_penyakit}'");
        if ($cek_nama_penyakit) {
            $res['status'] = 0;
            $res['msg'] = "Nama penyakit sudah ada";
            echo json_encode($res);
            die;
        }

        // query insert
        $insert = $this->_db->insert("INSERT INTO tb_penyakit(kode_penyakit, penyakit, solusi, `status`) values ('$kode_penyakit', '$nama_penyakit', '$solusi', '0')");
        if ($insert) {
            $res['status'] = 1;
            $res['msg'] = "Data penyakit berhasil ditambahkan";
            $res['page'] = "penyakit";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data penyakit gagal ditambahkan";
        }
        echo json_encode($res);
    }
    public function ubahPenyakit($kode)
    {
        $data['penyakit'] = $this->_db->other_query("SELECT * FROM tb_penyakit WHERE kode_penyakit = '$kode'");
        view('layouts/_head');
        view('penyakit/ubah_data', $data);
        view('layouts/_foot');
    }
    public function prosesUbahPenyakit()
    {
        $input = post();
        $kode_penyakit = $input['kode_penyakit'];
        $nama_penyakit = ($input['penyakit']);
        $solusi = $input['solusi'];
        // cek nama_penyakit sudah ada atau belum
        $cek_nama_penyakit = $this->_db->other_query("SELECT * FROM tb_penyakit WHERE penyakit = '{$nama_penyakit}' AND kode_penyakit != '{$kode_penyakit}'");
        if ($cek_nama_penyakit) {
            $res['status'] = 0;
            $res['msg'] = "Nama penyakit sudah ada";
            echo json_encode($res);
            die;
        }
        // query update
        $update = $this->_db->edit("UPDATE tb_penyakit SET penyakit = '$nama_penyakit', solusi = '$solusi' WHERE kode_penyakit = '$kode_penyakit'");
        if ($update) {
            $res['status'] = 1;
            $res['msg'] = "Data penyakit berhasil diubah";
            $res['page'] = "penyakit";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data penyakit gagal diubah";
        }
        echo json_encode($res);
    }

    public function lihatPenyakit()
    {
        $data['penyakit'] = $this->_db->other_query("SELECT * FROM tb_penyakit", 2);
        view('layouts/_head');
        view('penyakit/verif', $data);
        view('layouts/_foot');
    }

    public function verifikasiPenyakit($kode)
    {
        $data['penyakit'] = $this->_db->other_query("SELECT * FROM tb_penyakit WHERE kode_penyakit = '$kode'");
        view('layouts/_head');
        view('penyakit/verif_penyakit', $data);
        view('layouts/_foot');
    }

    public function prosesVerifPenyakit()
    {
        $input = post();
        $kode_penyakit = $input['kode_penyakit'];
        $bobot = $input['bobot'];
        $status = $input['status'];

        // query update
        $update = $this->_db->edit("UPDATE tb_penyakit SET bobot = '$bobot', `status` = '$status' WHERE kode_penyakit = '$kode_penyakit'");
        if ($update) {
            $res['status'] = 1;
            $res['msg'] = $status == 1 ? "Data penyakit berhasil diverifikasi" : "Data penyakit berhasil ditolak";
            $res['page'] = "penyakit/lihatPenyakit";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data penyakit gagal diverifikasi";
        }
        echo json_encode($res);
    }

    public function hapusPenyakit()
    {
        $input = post();
        $id = $input['id'];
        $delete = $this->_db->delete('tb_penyakit', 'kode_penyakit', "'" . $id . "'");
        if ($delete) {
            $res['status'] = 1;
            $res['msg'] = "Data berhasil dihapus";
            $res['page'] = "penyakit";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data gagal dihapus";
        }
        echo json_encode($res);
    }
}
