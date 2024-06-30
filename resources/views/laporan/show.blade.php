<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container">
            <h3 style="text-align: center;">Laporan Pertanggung Jawaban Organisasi</h3>

            <a href="{{ route('laporan.generatePdf', ['id' => $organisasi->id]) }}" class="btn btn-primary mb-3">Download PDF</a>

            <!-- Sisipkan HTML laporan disini -->
            <div class="laporan-content p-4 bg-white border rounded" style="background-color: #ffffff; padding: 20px; border: 1px solid #ddd; margin-top: 20px;">
            <div class="header">
                <h1 style="font-family: 'Times New Roman', Times, serif;
                            font-size: 16pt;
                            font-weight: bold; text-align: center;" >LAPORAN PERTANGGUNG JAWABAN</h1>
                <h2 style="font-family: 'Times New Roman', Times, serif;
                    font-size: 16pt;
                    font-weight: bold; text-align: center;">{{ $organisasi->nama }}</h2>
                <h2 style="font-family: 'Times New Roman', Times, serif;
                    font-size: 16pt;
                    font-weight: bold; text-align: center;">PERIODE 2024</h2>
                <img src="{{ $logoBase64 }}" alt="Logo Organisasi" class="logo" height="300px" width="300px" style="margin: 0 auto; display: block;" >
                <p style="font-family: 'Times New Roman', Times, serif;
    font-size: 16pt;
    font-weight: bold; text-align: center;">{{ $organisasi->nama_instansi }}</p>
                <p style="font-family: 'Times New Roman', Times, serif;
    font-size: 16pt;
    font-weight: bold; text-align: center; ">Jl. Panawuan No. 3A Telp. (0262) 2248936 TarogongKidul – Garut</p>
            </div>
                <h2 class="mt-4" style="text-align: center;">Daftar Anggota</h2>
                <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black; padding: 10px;">No.</th>
                            <th style="border: 1px solid black; padding: 10px;">Nama Anggota</th>
                            <th style="border: 1px solid black; padding: 10px;">Jabatan</th>
                            <th style="border: 1px solid black; padding: 10px;">Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1; @endphp
                    @foreach($organisasi->keanggotaan as $keanggotaan)
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">{{ $counter++ }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keanggotaan->user->name }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keanggotaan->role->nama }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keanggotaan->divisi }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h2 class="mt-4 " style="text-align: center;">Daftar Program</h2>
                <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black; padding: 10px;">No.</th>
                            <th style="border: 1px solid black; padding: 10px;">Nama Program</th>
                            <th style="border: 1px solid black; padding: 10px;">Type</th>
                            <th style="border: 1px solid black; padding: 10px;">Jenis</th>
                            <th style="border: 1px solid black; padding: 10px;">Status</th>
                            <th style="border: 1px solid black; padding: 10px;">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1; @endphp
                    @foreach($organisasi->programs as $program)
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">{{ $counter++ }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $program->nama }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $program->type }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $program->jenis }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $program->status }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $program->tanggal }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h2 class="mt-4" style="text-align: center;">Daftar Keuangan</h2>
                <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black; padding: 10px;">No.</th>
                            <th style="border: 1px solid black; padding: 10px;">Nama</th>
                            <th style="border: 1px solid black; padding: 10px;">Jenis</th>
                            <th style="border: 1px solid black; padding: 10px;">Tanggal</th>
                            <th style="border: 1px solid black; padding: 10px;">Keterangan</th>
                            <th style="border: 1px solid black; padding: 10px;">Jumlah</th>
                            <th style="border: 1px solid black; padding: 10px;">Sisa</</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1; @endphp
                    @foreach($organisasi->keuangans as $keuangan)
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">{{ $counter++ }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keuangan->nama }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keuangan->jenis }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keuangan->tanggal }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keuangan->keterangan }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keuangan->jumlah }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $keuangan->saldo }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h2 class="mt-4" style="text-align: center;">Daftar Surat</h2>
                <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black; padding: 10px;">No.</th>
                            <th style="border: 1px solid black; padding: 10px;">Nomor Surat</th>
                            <th style="border: 1px solid black; padding: 10px;">Tanggal</th>
                            <th style="border: 1px solid black; padding: 10px;">Jenis</th>
                            <th style="border: 1px solid black; padding: 10px;">Perihal</th>
                            <th style="border: 1px solid black; padding: 10px;">Asal Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1; @endphp
                    @foreach($organisasi->surats as $surat)
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">{{ $counter++ }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $surat->nomor_surat }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $surat->tanggal }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $surat->jenis }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $surat->perihal }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $surat->asal_surat }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h2 class="mt-4" style="text-align: center;">Daftar Inventaris</h2>
                <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black; padding: 10px;">No.</th>
                            <th style="border: 1px solid black; padding: 10px;">Nama Barang</th>
                            <th style="border: 1px solid black; padding: 10px;">Sebelum</th>
                            <th style="border: 1px solid black; padding: 10px;">Ditambah</th>
                            <th style="border: 1px solid black; padding: 10px;">Digunakan</th>
                            <th style="border: 1px solid black; padding: 10px;">Sisa</th>
                            <th style="border: 1px solid black; padding: 10px;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1; @endphp
                    @foreach($organisasi->inventaris as $inventaris)
                        <tr>
                            <td style="border: 1px solid black; padding: 10px;">{{ $counter++ }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $inventaris->nama }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $inventaris->sebelum }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $inventaris->ditambah }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $inventaris->digunakan }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $inventaris->sisa }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $inventaris->keterangan }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-app-layout>
