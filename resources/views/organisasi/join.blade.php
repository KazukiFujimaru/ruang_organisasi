<x-guest-layout>
    <main class="main-content d-flex align-items-center justify-content-center vh-100 border-radius-lg"
        style="background: url('https://images.unsplash.com/photo-1617791160536-598cf32026fb?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center; background-size: cover;">
        <div class="container bg-white p-5 rounded shadow">
            <section>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header"><h2>Join Organization</h2><p>Masuk ke organisasi yang sudah ada di Ruang Organisasi menggunakan kode</p></div>

                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('organisasi.join') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="kode_organisasi">Kode Organisasi</label>
                                            <input type="text" class="form-control @error('kode_organisasi') is-invalid @enderror" id="kode_organisasi" name="kode_organisasi" value="{{ old('kode_organisasi') }}" required>
                                            
                                            @error('kode_organisasi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Join</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-guest-layout>