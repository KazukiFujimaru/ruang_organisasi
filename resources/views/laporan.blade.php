<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pertanggung Jawaban {{ $organisasi->nama }} 2024</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        h1, h2, h3, h4, h5, h6 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .center {
            text-align: center;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            font-family: 'Times New Roman', Times, serif;
        }
        .head1{
            font-family: 'Times New Roman', Times, serif;
            font-size: 16pt;
            font-weight: bold;
        }
        .ukuran12bold{
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            font-weight: bold;
            text-align: center;
        }
        .ukuran14bold{
            font-family: 'Times New Roman', Times, serif;
            font-size: 14pt;
            font-weight: bold;
            text-align: center;
        }
        .normal2{
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
        }
        .daftarisi{
            font-family: 'Times New Roman', Times, serif;
            font-size: 16pt;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PERTANGGUNG JAWABAN</h1>
        <h2>{{ $organisasi->nama }}</h2>
        <h3>PERIODE 2024</h3>
        <img src="{{ $logoBase64 }}" alt="Logo Organisasi" class="logo" height="300px" width="300px">
        <p class="head1">{{ $organisasi->nama_instansi }}</p>
        <p>Jl. Panawuan No. 3A Telp. (0262) 2248936 TarogongKidul – Garut</p>
    </div>
    

    <h2>Daftar Anggota</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama anggota</th>
                <th>Jabatan</th>
                <th>Divisi</th>
            </tr>
        </thead>
        <tbody>
        @php
            $counter = 1; // Inisialisasi counter
            @endphp
            @foreach($organisasi->keanggotaan as $keanggotaan)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $keanggotaan->user->name }}</td>
                <td>{{ $keanggotaan->role->nama }}</td>
                <td>{{ $keanggotaan->divisi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    
    <h2>Daftar Program</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Program</th>
                <th>Type</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
        @php
            $counter = 1; // Inisialisasi counter
            @endphp
            @foreach($organisasi->programs as $program)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $program->nama }}</td>
                <td>{{ $program->type }}</td>
                <td>{{ $program->jenis }}</td>
                <td>{{ $program->status }}</td>
                <td>{{ $program->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <h2>Daftar Keuangan</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Sisa</th>
            </tr>
        </thead>
        <tbody>
            @php
            $counter = 1; // Inisialisasi counter
            @endphp
            @foreach($organisasi->keuangans as $keuangan)
            <tr>
                <td>{{ $counter++ }}</td> <!-- Increment counter untuk setiap iterasi -->
                <td>{{ $keuangan->nama }}</td>
                <td>{{ $keuangan->jenis }}</td>
                <td>{{ $keuangan->tanggal }}</td>
                <td>{{ $keuangan->keterangan }}</td>
                <td>{{ $keuangan->jumlah }}</td>
                <td>{{ $keuangan->saldo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <h2>Daftar Surat</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Perihal</th>
                <th>Asal Surat</th>
            </tr>
        </thead>
        <tbody>
        @php
            $counter = 1; // Inisialisasi counter
            @endphp
            @foreach($organisasi->surats as $surat)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->tanggal }}</td>
                <td>{{ $surat->jenis }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>{{ $surat->asal_surat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <h2>Daftar Inventaris</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Sebelum</th>
                <th>Ditambah</th>
                <th>Digunakan</th>
                <th>Sisa</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @php
            $counter = 1; // Inisialisasi counter
            @endphp
            @foreach($organisasi->inventaris as $inventaris)
            <tr>
                <td>{{ $counter++ }}</td>
                <td>{{ $inventaris->nama }}</td>
                <td>{{ $inventaris->sebelum }}</td>
                <td>{{ $inventaris->ditambah }}</td>
                <td>{{ $inventaris->digunakan }}</td>
                <td>{{ $inventaris->sisa }}</td>
                <td>{{ $inventaris->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

    <footer class="footer">
        &copy; 2024 Ruang Organisasi. Semua hak dilindungi.
    </footer>
</body>
</html>
