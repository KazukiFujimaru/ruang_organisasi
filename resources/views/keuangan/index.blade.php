<div class="container">
    <h1>Keuangan</h1>
    <h2>Saldo Terakhir: Rp{{ number_format($saldo_terakhir, 2, ',', '.') }}</h2>

    @if($keuangans->isEmpty())
        <p>Tidak ada data keuangan untuk organisasi ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Type</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keuangans as $keuangan)
                    <tr>
                        <td>{{ $keuangan->nama }}</td>
                        <td>{{ $keuangan->tanggal }}</td>
                        <td>{{ ucfirst($keuangan->type) }}</td>
                        <td>Rp{{ number_format($keuangan->jumlah, 2, ',', '.') }}</td>
                        <td>{{ $keuangan->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
