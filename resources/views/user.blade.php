<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url('../../../assets/img/header-blue-purple.jpg'); background-position: bottom;">
        </div>
        <div class="px-5 py-4 container-fluid ">
            <form action="{{ route('users.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-5 mb-5 mt-lg-9 row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <div class="card card-body" id="profile">
                            <img src="../../../assets/img/header-orange-purple.jpg" alt="pattern-lines"
                                class="top-0 rounded-2 position-absolute start-0 w-100 h-100">

                            <div class="row z-index-2 justify-content-center align-items-center">
                                <div class="col-sm-auto col-4">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="../assets/img/team-2.jpg" alt="bruce"
                                            class="w-100 h-100 object-fit-cover border-radius-lg shadow-sm"
                                            id="preview">
                                    </div>
                                </div>
                                <div class="col-sm-auto col-8 my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1 font-weight-bolder">
                                            {{ auth()->user()->name }}
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            {{ $organisasi->nama }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                                    <!-- Placeholder -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert" id="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert" id="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-5 row justify-content-center">
                    <div class="col-lg-9 col-12 ">
                        <div class="card " id="basic-info">
                            <div class="card-header">
                                <h5>Data Pengguna</h5>
                            </div>
                            <div class="pt-0 card-body">

                                <div class="row">
                                    <div class="col-6">
                                        <label for="name">Nama Pengguna</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', auth()->user()->name) }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="email">Email Pengguna</label>
                                        <input type="email" name="email" id="email"
                                            value="{{ old('email', auth()->user()->email) }}" class="form-control">
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    <label for="role">Pilih Role:</label>
                                    <select name="role" id="role" required class="form-select mb-3">
                                        <option value="Ketua">Ketua</option>
                                        <option value="Wakil Ketua">Wakil Ketua</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Bendahara">Bendahara</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                                        @error('location')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6" id="divisi-role-container" style="display: none;">
                                        <label for="divisi" class="form-label">Pilih Divisi:</label>
                                        <select name="divisi_role_id" id="divisi" class="form-select mb-3">
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('phone')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <label for="about">Tentang Saya</label>
                                    <textarea name="about" id="about" rows="5" class="form-control">{{ old('about', auth()->user()->about) }}</textarea>
                                    @error('about')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="logo_organisasi" class="form-label">Logo Organisasi</label>
                                        <input type="file" class="form-control" id="logo_organisasi" name="logo_organisasi">
                                        @if($organisasi->logo_organisasi)
                                            <p>Logo saat ini: <img src="{{ Storage::url($organisasi->logo_organisasi) }}" width="100" alt="Logo Organisasi"></p>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="foto_profil" class="form-label">Foto Profil</label>
                                        <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                                        @if($organisasi->logo_organisasi)
                                            <p>Foto Profil saat ini: <img src="{{ Storage::url($organisasi->logo_organisasi) }}" width="100" alt="Foto Profil"></p>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <x-app.footer />
        </div>
    </main>

</x-app-layout>

<script>
    document.getElementById('role').addEventListener('change', function() {
        if (this.value === 'Anggota') {
            document.getElementById('divisi-role-container').style.display = 'block';
        } else {
            document.getElementById('divisi-role-container').style.display = 'none';
        }
    });
</script>
