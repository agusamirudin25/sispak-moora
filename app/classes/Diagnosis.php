<?php

namespace App\Classes;


header('Access-Control-Allow-Origin:*');


class Diagnosis
{
    protected $_db;
    protected $id;
    protected $email;
    protected $data_gejala;
    protected $kerusakan;
    protected $nilai_cf;
    protected $nilai_cbr;

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
        $data['gejala'] = $this->_db->other_query("SELECT * FROM tb_gejala WHERE `status` = 1", 2);
        view('layouts/_head');
        view('diagnosis/index', $data);
        view('layouts/_foot');
    }

    public function prosesDiagnosis()
    {
        $gejala = $_POST['gejala'];

        // setup where_in
        $where_in = '';
        foreach ($gejala as $key => $value) {
            if ($key == 0) {
                $where_in .= "'". $value ."'";
            } else {
                $where_in .= ",'". $value ."'";
            }
        }
        $sql = "SELECT kode_penyakit, count(kode_penyakit) as total_gejala FROM tb_pengetahuan WHERE kode_gejala IN ($where_in) GROUP BY kode_penyakit";
        $diagnosa = $this->_db->other_query($sql, 2);

        $paling_banyak_gejala = '';
        $nilai_paling_banyak = 0;
        $hasil = [];
        foreach ($diagnosa as $key => $value) {
            if ($value['total_gejala'] > $nilai_paling_banyak) {
                $paling_banyak_gejala = $value['kode_penyakit'];
                $nilai_paling_banyak = $value['total_gejala'];
            }
            // select count tb_pengetahuan
            $sql = "SELECT count(kode_penyakit) as total FROM tb_pengetahuan WHERE kode_penyakit = '".$value['kode_penyakit']."'";
            $count = $this->_db->other_query($sql, 1);
            $total = $count->total;
            $tempData = $total - $diagnosa[$key]['total_gejala'];
            $hasil[$value['kode_penyakit']] = $tempData;
        }
        // get min value
        $kode_penyakit = array_keys($hasil, min($hasil));
        if(count($kode_penyakit) > 1){
            $kode_penyakit = $paling_banyak_gejala;
        }else{
            $kode_penyakit = $kode_penyakit[0];
        }

        $data_alternatif = $this->_db->other_query("SELECT * FROM tb_penyakit WHERE kode_penyakit = '".$kode_penyakit."'", 1);

        // perhitungan MOORA
        // normalisasi
        $bobot_gejala = [];
        $keterangan_perhitungan_bobot_gejala = [];
        foreach ($gejala as $key => $value) {
            $sql = "SELECT bobot FROM tb_gejala WHERE kode_gejala = '".$value."'";
            $bobot = $this->_db->other_query($sql, 1);
            $bobot_gejala[$value] = pow($bobot->bobot, 2);
            $keterangan_perhitungan_bobot_gejala[$value] = [
                'before' => $bobot->bobot . ' ^ ' . '2',
                'after' => pow($bobot->bobot, 2)
            ];
        }
        $total_bobot_gejala = array_sum($bobot_gejala);
        // sqrt
        $nilai_normalisasi = sqrt($total_bobot_gejala);

        $dibagi_bobot_kriteria = [];
        $keterangan_perhitungan_dibagi_bobot_kriteria = [];
        foreach ($gejala as $key => $value) {
            $sql = "SELECT bobot FROM tb_gejala WHERE kode_gejala = '".$value."'";
            $bobot = $this->_db->other_query($sql, 1);
            // pretty($bobot->bobot . '/' . $nilai_normalisasi, 0);
            $dibagi_bobot_kriteria[$value] = $bobot->bobot / $nilai_normalisasi;
            $keterangan_perhitungan_dibagi_bobot_kriteria[$value] = $bobot->bobot . '/' . $nilai_normalisasi . ' = ' . $bobot->bobot / $nilai_normalisasi;
        }

        $dikali_bobot_alternatif = [];
        $keterangan_perhitungan_dikali_bobot_alternatif = [];
        foreach ($dibagi_bobot_kriteria as $key => $value) {
            $dikali_bobot_alternatif[$key] = $value * $data_alternatif->bobot;
            $keterangan_perhitungan_dikali_bobot_alternatif[$key] = $value . ' * ' . $data_alternatif->bobot . ' = ' . $value * $data_alternatif->bobot;
        }

        $hasil_moora = array_sum($dikali_bobot_alternatif);
       
        $data['ranking_moora'] = $this->perankingan_moora();
        $data['input'] = $gejala;
        $data['gejala'] = $this->_db->other_query("SELECT tb_gejala.kode_gejala, tb_gejala.gejala, tb_gejala.bobot, tb_penyakit.penyakit FROM tb_gejala JOIN tb_pengetahuan ON tb_gejala.kode_gejala = tb_pengetahuan.kode_gejala JOIN tb_penyakit ON tb_pengetahuan.kode_penyakit = tb_penyakit.kode_penyakit WHERE tb_gejala.kode_gejala IN ($where_in) AND tb_pengetahuan.kode_penyakit = '$kode_penyakit'", 2);
        $data['keterangan_normalisasi'] = $keterangan_perhitungan_bobot_gejala;
        $data['total_bobot_gejala'] = $total_bobot_gejala;
        $data['keterangan_dibagi_bobot_kriteria'] = $keterangan_perhitungan_dibagi_bobot_kriteria;
        $data['keterangan_dikali_bobot_alternatif'] = $keterangan_perhitungan_dikali_bobot_alternatif;
        $data['penyakit'] = $data_alternatif;
        $data['hasil_moora'] = $hasil_moora;

        // insert data ke tb_diagnosis
        $emailPengguna = session_get('emailPengguna');
        $data_gejala = json_encode($gejala);
        $sql = "INSERT INTO tb_diagnosis (email, penyakit, data_gejala, hasil_moora) VALUES ('$emailPengguna', '$kode_penyakit', '$data_gejala', '$hasil_moora')";
        $this->_db->insert($sql);
        // store to session
        session_set('sessData', $data);
        $res['status'] = 1;
        $res['msg'] = "Diagnosa berhasil";
        echo json_encode($res);
        die;
    }

    public function perankingan_moora()
    {
        $alternatif = $this->_db->other_query("SELECT * FROM tb_penyakit", 2);
        $hasil_moora = [];
        foreach ($alternatif as $key_alternatif => $row) {
            $sql = "SELECT tb_pengetahuan.*, tb_gejala.bobot FROM tb_pengetahuan JOIN tb_gejala ON tb_pengetahuan.kode_gejala = tb_gejala.kode_gejala WHERE kode_penyakit = '".$row['kode_penyakit']."'";
            $data_pengetahuan = $this->_db->other_query($sql, 2);
            // pretty($data_pengetahuan);
            $bobot_gejala = [];
            foreach ($data_pengetahuan as $key_pengetahuan => $value) {
                // normalisasi
                $bobot_gejala[$key_pengetahuan] = pow($value['bobot'], 2);
            }

            $total_bobot_gejala = array_sum($bobot_gejala);
            $nilai_normalisasi = sqrt($total_bobot_gejala);

            $dibagi_bobot_kriteria = [];
            foreach ($data_pengetahuan as $key_pengetahuan => $value) {
                $dibagi_bobot_kriteria[$key_pengetahuan] = $value['bobot'] / $nilai_normalisasi;
            }

            $dikali_bobot_alternatif = [];
            foreach ($dibagi_bobot_kriteria as $key => $value) {
                $dikali_bobot_alternatif[$key] = $value * $row['bobot'];
            }

            $hasil_moora[$key_alternatif] = [
                'kode_penyakit' => $row['kode_penyakit'],
                'penyakit' => $row['penyakit'],
                'bobot' => number_format(array_sum($dikali_bobot_alternatif), 4),
            ];
            // cek apakah hasil moora sudah ada di tabel tb_hasil_moora
            $sql = "SELECT * FROM tb_hasil_moora WHERE kode_penyakit = '".$row['kode_penyakit']."'";
            $cek = $this->_db->other_query($sql, 2);
            if (empty($cek)) {
                $sql = "INSERT INTO tb_hasil_moora (kode_penyakit, nilai_moora) VALUES ('".$row['kode_penyakit']."', '".$hasil_moora[$key_alternatif]['bobot']."')";
                $this->_db->insert($sql);
            }else{
                $sql = "UPDATE tb_hasil_moora SET nilai_moora = '".$hasil_moora[$key_alternatif]['bobot']."' WHERE kode_penyakit = '".$row['kode_penyakit']."'";
                $this->_db->edit($sql);
            }
        }
        return $hasil_moora;
    }

    public function hasilDiagnosis()
    {
        $data = session_get('sessData');
        $keterangan_perhitungan_normalisasi_before = '';
        $keterangan_perhitungan_normalisasi_after = '';
        $no = 0;
        foreach ($data['keterangan_normalisasi'] as $key => $value) {
            // if last key
            if($no == count($data['keterangan_normalisasi']) - 1){
                $keterangan_perhitungan_normalisasi_before .= $value['before'];
                $keterangan_perhitungan_normalisasi_after .= $value['after'];
            }else{
                $keterangan_perhitungan_normalisasi_before .= $value['before'] . ' + ';
                $keterangan_perhitungan_normalisasi_after .= $value['after'] . ' + ';
            }
            $no++;
        }
        $data['keterangan_normalisasi_before'] = $keterangan_perhitungan_normalisasi_before;
        $data['keterangan_normalisasi_after'] = $keterangan_perhitungan_normalisasi_after;
        // sort $data['ranking_moora'] by bobot desc
        usort($data['ranking_moora'], function($a, $b) {
            return $b['bobot'] <=> $a['bobot'];
        });
        // pretty($data['ranking_moora']);
        // pretty($data);
        view('layouts/_head');
        view('diagnosis/hasil', $data);
        view('layouts/_foot');
    }
   
}
