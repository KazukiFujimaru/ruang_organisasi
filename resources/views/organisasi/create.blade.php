<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container">
            <h1>Create Organization</h1>
            <form action="{{ route('organisasi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Organization Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name_instansi">Nama Instansi</label>
                    <input type="text" name="name_instansi" id="name_instansi" class="form-control" required>
                </div>
                <!-- Tambahkan form input lain sesuai dengan model Organization -->
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
</x-app-layout>
    
