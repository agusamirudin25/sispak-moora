<?php

namespace App\Classes;


header('Access-Control-Allow-Origin:*');


class Solusi
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
        $data['role'] = (session_get('type') == 1) ? 'Admin' : 'Pakar';
        $data['solusi'] = $this->_db->other_query("SELECT * FROM tb_solusi", 2);
        view('layouts/_head');
        view('solusi/index', $data);
        view('layouts/_foot');
    }

    public function tambahSolusi()
    {
        $data['role'] = (session_get('type') == 1) ? 'Admin' : 'Pakar';
        $kode_terakhir = $this->_db->get_last_param('tb_solusi', 'kode_solusi');
        if ($kode_terakhir) {
            $nilai_kode = substr($kode_terakhir['kode_solusi'], 1);
            $kode = (int) $nilai_kode;
            $kode = $kode + 1;
            $kode_otomatis = "S" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kode_otomatis = "S1";
        }
        $data['kode_otomatis'] = $kode_otomatis;
        view('layouts/_head');
        view('solusi/tambah_data', $data);
        view('layouts/_foot');
    }
    public function prosesTambahSolusi()
    {
        $input = post();
        $kode_solusi = $input['kode_solusi'];
        $nama_solusi = $input['solusi'];

        // query insert
        $insert = $this->_db->insert("INSERT INTO tb_solusi(kode_solusi, solusi) values ('$kode_solusi', '$nama_solusi')");
        if ($insert) {
            $res['status'] = 1;
            $res['msg'] = "Data solusi berhasil ditambahkan";
            $res['page'] = "solusi";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data solusi gagal ditambahkan";
        }
        echo json_encode($res);
    }
    public function ubahSolusi($kode)
    {
        $data['role'] = (session_get('type') == 1) ? 'Admin' : 'Pakar';
        $data['solusi'] = $this->_db->other_query("SELECT * FROM tb_solusi WHERE kode_solusi = '$kode'");
        view('layouts/_head');
        view('solusi/ubah_data', $data);
        view('layouts/_foot');
    }
    public function prosesUbahSolusi()
    {
        $input = post();
        $kode_solusi = $input['kode_solusi'];
        $nama_solusi = $input['solusi'];
        // query update
        $update = $this->_db->edit("UPDATE tb_solusi SET solusi = '$nama_solusi' WHERE kode_solusi = '$kode_solusi'");
        if ($update) {
            $res['status'] = 1;
            $res['msg'] = "Data solusi berhasil diubah";
            $res['page'] = "solusi";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data solusi gagal diubah";
        }
        echo json_encode($res);
    }
    public function hapusSolusi()
    {
        $input = post();
        $id = $input['id'];
        $delete = $this->_db->delete('tb_solusi', 'kode_solusi', "'" . $id . "'");
        if ($delete) {
            $res['status'] = 1;
            $res['msg'] = "Data berhasil dihapus";
            $res['page'] = "solusi";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data gagal dihapus";
        }
        echo json_encode($res);
    }
}
