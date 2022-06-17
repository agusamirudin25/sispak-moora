<?php

namespace App\Classes;


header('Access-Control-Allow-Origin:*');


class Gejala
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
        $data['gejala'] = $this->_db->other_query("SELECT * FROM tb_gejala ORDER BY `status`", 2);
        view('layouts/_head');
        view('gejala/index', $data);
        view('layouts/_foot');
    }

    public function tambahGejala()
    {
        $kode_terakhir = $this->_db->get_last_param('tb_gejala', 'kode_gejala');
        if ($kode_terakhir) {
            $nilai_kode = substr($kode_terakhir['kode_gejala'], 1);
            $kode = (int) $nilai_kode;
            $kode = $kode + 1;
            $kode_otomatis = "G" . str_pad($kode, 1, "0", STR_PAD_LEFT);
        } else {
            $kode_otomatis = "G1";
        }
        $data['kode_otomatis'] = $kode_otomatis;
        view('layouts/_head');
        view('gejala/tambah_data', $data);
        view('layouts/_foot');
    }
    public function prosesTambahGejala()
    {
        $input = post();
        $kode_gejala = $input['kode_gejala'];
        $nama_gejala = ($input['gejala']);
        // cek gejala sudah ada atau belum
        $cek_nama_gejala = $this->_db->other_query("SELECT * FROM tb_gejala WHERE gejala = '{$nama_gejala}'");
        if ($cek_nama_gejala) {
            $res['status'] = 0;
            $res['msg'] = "Nama gejala sudah ada";
            echo json_encode($res);
            die;
        }

        // query insert
        $insert = $this->_db->insert("INSERT INTO tb_gejala(kode_gejala, gejala, `status`) values ('$kode_gejala', '$nama_gejala', '0')");
        if ($insert) {
            $res['status'] = 1;
            $res['msg'] = "Data gejala berhasil ditambahkan";
            $res['page'] = "gejala";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data gejala gagal ditambahkan";
        }
        echo json_encode($res);
    }
    public function ubahGejala($kode)
    {
        $data['gejala'] = $this->_db->other_query("SELECT * FROM tb_gejala WHERE kode_gejala = '$kode'");
        view('layouts/_head');
        view('gejala/ubah_data', $data);
        view('layouts/_foot');
    }
    public function prosesUbahGejala()
    {
        $input = post();
        $kode_gejala = $input['kode_gejala'];
        $nama_gejala = ($input['gejala']);
        // cek gejala sudah ada atau belum
        $cek_nama_gejala = $this->_db->other_query("SELECT * FROM tb_gejala WHERE gejala = '{$nama_gejala}' AND kode_gejala != '{$kode_gejala}'");
        if ($cek_nama_gejala) {
            $res['status'] = 0;
            $res['msg'] = "Nama gejala sudah ada";
            echo json_encode($res);
            die;
        }

        // query update
        $update = $this->_db->edit("UPDATE tb_gejala SET gejala = '$nama_gejala' WHERE kode_gejala = '$kode_gejala'");
        if ($update) {
            $res['status'] = 1;
            $res['msg'] = "Data gejala berhasil diubah";
            $res['page'] = "gejala";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data gejala gagal diubah";
        }
        echo json_encode($res);
    }

    public function lihatGejala()
    {
        $data['gejala'] = $this->_db->other_query("SELECT * FROM tb_gejala", 2);
        view('layouts/_head');
        view('gejala/verif', $data);
        view('layouts/_foot');
    }

    public function verifikasiGejala($kode)
    {
        $data['gejala'] = $this->_db->other_query("SELECT * FROM tb_gejala WHERE kode_gejala = '$kode'");
        view('layouts/_head');
        view('gejala/verif_gejala', $data);
        view('layouts/_foot');
    }

    public function prosesVerifGejala()
    {
        $input = post();
        $kode_gejala = $input['kode_gejala'];
        $bobot = $input['bobot'];
        $status = $input['status'];

        // query update
        $update = $this->_db->edit("UPDATE tb_gejala SET bobot = '$bobot', `status` = '$status' WHERE kode_gejala = '$kode_gejala'");
        if ($update) {
            $res['status'] = 1;
            $res['msg'] = $status == 1 ? "Data gejala berhasil diverifikasi" : "Data gejala berhasil ditolak";
            $res['page'] = "gejala/lihatGejala";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data gejala gagal diverifikasi";
        }
        echo json_encode($res);
    }

    public function hapusGejala()
    {
        $input = post();
        $id = $input['id'];
        $delete = $this->_db->delete('tb_gejala', 'kode_gejala', "'" . $id . "'");
        if ($delete) {
            $res['status'] = 1;
            $res['msg'] = "Data berhasil dihapus";
            $res['page'] = "gejala";
        } else {
            $res['status'] = 0;
            $res['msg'] = "Data gagal dihapus";
        }
        echo json_encode($res);
    }
}
