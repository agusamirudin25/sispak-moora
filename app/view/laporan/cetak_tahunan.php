<link href="<?= base_url() ?>assets/css/app.css" rel="stylesheet" />
<body>
<style type="text/css">
    #print {
        margin:auto;
        text-align:center;
        font-family:"Calibri", Courier, monospace;
        width:1200px;
        font-size:14px;
    }
    #print .title {
        margin:20px;
        text-align:right;
        font-family:"Calibri", Courier, monospace;
        font-size:12px;
    }
    #print span {
        text-align:center;
        font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;   
        font-size:10px;
    }
    #print table {
        border-collapse:collapse;
        width:90%;
        margin:17px;
    }
    #print .table1 {
        border-collapse:collapse;
        width:90%;
        text-align:center;
        margin:10px;
    }
    #print table hr {
        border:3px double #000;   
        
    }
    #print .ttd {
        float:right;
        width:350px;
        background-position:center;
        background-size:contain;
    }
    #print table th {
        color:#000;
        font-family:Verdana, Geneva, sans-serif;
        font-size:10px;
    }
    #logo{
        width:111px;
        height:90px;
        padding-top:10px;   
        margin-left:10px;
    }

    h1,h2,h3,h4{
        line-height:10px;
    }
    #print .camat {
        float:left;
        width:250px;
        background-position:center;
        background-size:contain;
    }
    </style>
<div class="container" >
<div class="text-left">
<div id="print">
    <table class='table1'>
            <tr>
<td><div class="wrap_header"><img src="<?php echo base_url()?>assets/images/cover2.png" style="width: 150px; height: 150px; "></td>
        <td>

        <h2 style="font-size:32px; margin:20px">KLINIK ALAMSYAH</h2>
        <h1 style="font-size:40px; margin:10px">DESA JATIBARU</h1>
        <h2 style="font-size:24px;margin:20px" >JL.Raya RawaGebang Rt. 002/002  </h2>
        <h3 style="font-size:30px; margin-top:10px; " >CIKARANG TIMUR-Kode Pos. 17533</h3>
    </td>       
    </tr>
</table>
<table class='table'>   
<td><hr/></td>
</table>    
</div>
    <div class="container" style="margin-top: 3%;">
        <h2 style="text-align: center;">Laporan Tahun <?= $tahun ?></h2> <br>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Penyakit (Hasil)</th>
                    <th>Tanggal Diagnosis</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1;
            foreach ($diagnosis as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['nama_lengkap'] ?></td>
                    <td><?= $row['nama_penyakit'] . " ({$row['hasil_moora']})" ?></td>
                    <td><?= tgl_indo(date('Y-m-d', strtotime($row['created_at']))) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <script>
        window.print();
    </script>
</body>