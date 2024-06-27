<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container">
            <h1>Laporan Pertanggungjawaban Organisasi</h1>
            <p><strong>Nama Organisasi:</strong> {{ $organisasi->nama }}</p>
            <p><strong>Nama Instansi:</strong> {{ $organisasi->nama_instansi }}</p>
            <p><strong>Deskripsi:</strong> {{ $organisasi->deskripsi }}</p>
            <p><strong>Sejarah:</strong> {{ $organisasi->sejarah }}</p>
            <p><strong>Tanggal Disahkan:</strong> {{ $organisasi->tanggal_disahkan }}</p>
            <!-- Tambahkan data lainnya sesuai kebutuhan -->

            <a href="{{ route('laporan.generateDocx', ['id' => $organisasi->id]) }}" class="btn btn-primary">Download DOCX</a>
        </div>
    </main>
</x-app-layout>
