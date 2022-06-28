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
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.username = tb_pengguna.username JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
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
        $tahun = $_GET['tahun'] ?? date('Y');
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.username = tb_pengguna.username JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
        if($tahun != null) {
            $query .= " WHERE YEAR(tb_diagnosis.created_at) = $tahun";
        }
        $hasil = $this->_db->other_query($query, 2);

        $pdf = new \FPDF();
        $pdf->AddPage();

        $pdf->Image('assets/images/cover2.png', 14, 10, 24);
        //Arial bold 15
        $pdf->SetFont('Arial','B',15);
        //pindah ke posisi ke tengah untuk membuat judul
        $pdf->Cell(80);
        //judul
        $pdf->Cell(50,10,'KLINIK ALAMSYAH',0,1,'C');
        $pdf->Cell(210,0,'DESA JATIBARU',0,0,'C');
        //pindah baris
        $pdf->Ln(20);

        $pdf->SetFont('Arial','',10);
        $pdf->cell(210,-28  ,'JL.Raya RawaGebang Rt. 002/002',0,1,'C');
        $pdf->cell(210,38  ,'CIKARANG TIMUR-Kode Pos. 17533',0,0,'C');
        //buat garis horisontal
        $pdf->Line(10,35,200,35);
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->setY(50);
        $pdf->Cell(200, 10, "LAPORAN TAHUN {$tahun}", 0, 1, 'C');

        $pdf->setXY(12, 75);
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(188, 6, '     Berikut rekapitulasi hasil diagnosa penyakit masa kehamilan menggunakan metode Multi-Objective Optimization On The Basis Of Ratio Analysis (MOORA). Hasil rekapitulasi ini dapat digunakan sebagai bahan evaluasi dalam penanganan penyakit pada ibu hamil. Hasil rekapitulasi sebagai berikut: ', 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(35, 3, " ", 0, 1, "L");


        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Nama Lengkap', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Nama Penyakit (Hasil)', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Tanggal Diagnosis', 1, 1, 'C');
        foreach ($hasil as $key => $row) {
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(10, 10, $key + 1, 1, 0, 'C');
            $pdf->Cell(40, 10, $row['nama_lengkap'], 1, 0, 'L');
            $pdf->Cell(100, 10, $row['nama_penyakit'] . " ({$row['hasil_moora']})", 1, 0, 'L');
            $pdf->Cell(40, 10, tgl_indo(date('Y-m-d', strtotime($row['created_at']))), 1, 1, 'C');
        }
        $pdf->Ln();

        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(156);
        $pdf->MultiCell(30,4,'Kepala Klinik',0,'C');

        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(180);
        $pdf->MultiCell(19.5,25,'',0,'R');

        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(148);
        $pdf->MultiCell(50,4, "nama disini",0,'C');

        $pdf->Ln();                
        $pdf->Output();
    }

    public function bulanan()
    {
        $tahun = $_GET['tahun'] ?? null;
        $bulan = $_GET['bulan'] ?? null;
        $link_cetak = 'laporan/cetak_bulanan';
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.username = tb_pengguna.username JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
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
        $tahun = $_GET['tahun'] ?? date('Y');
        $bulan = $_GET['bulan'] ?? date('m');
        $link_cetak = 'laporan/cetak_bulanan';
        $query = "SELECT tb_diagnosis.*, tb_pengguna.nama_lengkap, tb_penyakit.penyakit as nama_penyakit FROM tb_diagnosis JOIN tb_pengguna ON tb_diagnosis.username = tb_pengguna.username JOIN tb_penyakit ON tb_diagnosis.penyakit = tb_penyakit.kode_penyakit";
        if($tahun != null && $bulan != null) {
            $query .= " WHERE YEAR(tb_diagnosis.created_at) = $tahun";
            $query .= " AND MONTH(tb_diagnosis.created_at) = $bulan";
            $link_cetak .= "?tahun=$tahun&bulan=$bulan";
        }
        $hasil = $this->_db->other_query($query, 2);

        $pdf = new \FPDF();
        $pdf->AddPage();

        $pdf->Image('assets/images/cover2.png', 14, 10, 24);
        //Arial bold 15
        $pdf->SetFont('Arial','B',15);
        //pindah ke posisi ke tengah untuk membuat judul
        $pdf->Cell(80);
        //judul
        $pdf->Cell(50,10,'KLINIK ALAMSYAH',0,1,'C');
        $pdf->Cell(210,0,'DESA JATIBARU',0,0,'C');
        //pindah baris
        $pdf->Ln(20);

        $pdf->SetFont('Arial','',10);
        $pdf->cell(210,-28  ,'JL.Raya RawaGebang Rt. 002/002',0,1,'C');
        $pdf->cell(210,38  ,'CIKARANG TIMUR-Kode Pos. 17533',0,0,'C');
        //buat garis horisontal
        $pdf->Line(10,35,200,35);
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->setY(50);
        $month = strtoupper(bulan($bulan));
        $pdf->Cell(200, 10, "LAPORAN TAHUN {$tahun} BULAN {$month}", 0, 1, 'C');

        $pdf->setXY(12, 75);
        $pdf->SetFont('Times', '', 12);
        $pdf->MultiCell(188, 6, '     Berikut rekapitulasi hasil diagnosa penyakit masa kehamilan menggunakan metode Multi-Objective Optimization On The Basis Of Ratio Analysis (MOORA). Hasil rekapitulasi ini dapat digunakan sebagai bahan evaluasi dalam penanganan penyakit pada ibu hamil. Hasil rekapitulasi sebagai berikut: ', 0);
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(35, 3, " ", 0, 1, "L");


        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Nama Lengkap', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Nama Penyakit (Hasil)', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Tanggal Diagnosis', 1, 1, 'C');
        foreach ($hasil as $key => $row) {
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(10, 10, $key + 1, 1, 0, 'C');
            $pdf->Cell(40, 10, $row['nama_lengkap'], 1, 0, 'L');
            $pdf->Cell(100, 10, $row['nama_penyakit'] . " ({$row['hasil_moora']})", 1, 0, 'L');
            $pdf->Cell(40, 10, tgl_indo(date('Y-m-d', strtotime($row['created_at']))), 1, 1, 'C');
        }
        $pdf->Ln();

        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(156);
        $pdf->MultiCell(30,4,'Kepala Klinik',0,'C');

        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(180);
        $pdf->MultiCell(19.5,25,'',0,'R');

        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(148);
        $pdf->MultiCell(50,4, "nama disini",0,'C');

        $pdf->Ln();                
        $pdf->Output();
    }
}
