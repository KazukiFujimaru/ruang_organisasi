<x-guest-layout>
    <main class="main-content d-flex align-items-center justify-content-center vh-100 border-radius-lg" 
    style="background: url('https://images.unsplash.com/photo-1617791160536-598cf32026fb?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center; background-size: cover;">
        <div class="container bg-white p-5 rounded shadow">
            <div class="row justify-content-center">
                <div class="col-12 col-lg text-center">
                    <h1>Selamat Datang di Ruang Organisasi</h1>
                    <br>
                    <br>
                    <br>
                    <div class="container">
                        <!-- First section with h2 and button -->
                        <div class="row align-items-center mb-3">
                            <div class="col text-start">
                                <h2>Buat organisasi baru</h2>
                            </div>
                            <div class="col text-end">
                                <a href="{{ route('organisasi.create') }}" class="btn btn-primary">Create</a>
                            </div>
                        </div>
                        <!-- Spacer with line and "atau" -->
                        <div class="row align-items-center mb-3">
                            <div class="col d-flex align-items-center">
                                <hr class="flex-grow-1 me-2">
                                <span>atau</span>
                                <hr class="flex-grow-1 ms-2">
                            </div>
                        </div>
                        <!-- Second section with h2 and button -->
                        <div class="row align-items-center">
                            <div class="col text-start">
                                <h4><b>Masuk ke organisasi yang sudah ada</b></h4>
                            </div>
                            <div class="col text-end">
                                <a href="{{ route('organisasi.joinForm') }}" class="btn btn-secondary">Join</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
