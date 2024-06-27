<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pertanggungjawaban</title>
</head>
<body>
    <h1>Laporan Pertanggungjawaban</h1>
    <p>Nama Organisasi: {{ $organisasi->nama }}</p>
    <p>Nama Instansi: {{ $organisasi->nama_instansi }}</p>
    <p>Nama Pembina: {{ $organisasi->nama_pembina }}</p>
    <p>Deskripsi: {{ $organisasi->deskripsi }}</p>
    <p>Sejarah: {{ $organisasi->sejarah }}</p>
    <p>Tanggal Disahkan: {{ $organisasi->tanggal_disahkan }}</p>
    
    <h2>Keanggotaan</h2>
    <ul>
        @foreach($organisasi->keanggotaan as $keanggotaan)
            <li>{{ $keanggotaan->user->name }}</li>
        @endforeach
    </ul>
    
    <h2>Roles</h2>
    <ul>
        @foreach($organisasi->roles as $role)
            <li>{{ $role->name }}</li>
        @endforeach
    </ul>
    
    <h2>Divisi</h2>
    <ul>
        @foreach($organisasi->divisis as $divisi)
            <li>{{ $divisi->nama }}</li>
        @endforeach
    </ul>
    
    <h2>Keuangan</h2>
    <ul>
        @foreach($organisasi->keuangans as $keuangan)
            <li>{{ $keuangan->keterangan }} - {{ $keuangan->jumlah }}</li>
        @endforeach
    </ul>
    
    <h2>Program</h2>
    <ul>
        @foreach($organisasi->programs as $program)
            <li>{{ $program->nama }}</li>
        @endforeach
    </ul>
    
    <h2>Surat</h2>
    <ul>
        @foreach($organisasi->surats as $surat)
            <li>{{ $surat->nomor_surat }} - {{ $surat->perihal }}</li>
        @endforeach
    </ul>
    
    <h2>Inventaris</h2>
    <ul>
        @foreach($organisasi->inventaris as $inventaris)
            <li>{{ $inventaris->nama }} - {{ $inventaris->sisa }}</li>
        @endforeach
    </ul>
</body>
</html>
