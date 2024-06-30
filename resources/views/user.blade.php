<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url('../../../assets/img/header-blue-purple.jpg'); background-position: bottom;">
        </div>
        <div class="px-5 py-4 container-fluid">
            <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
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
                                        <img src="{{ Storage::url($user->foto_profile) }}" alt="foto_profile"
                                            class="w-100 h-100 object-fit-cover border-radius-lg shadow-sm"
                                            id="preview">
                                    </div>
                                </div>
                                <div class="col-sm-auto col-8 my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1 font-weight-bolder">
                                            {{ $user->name }}
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
                    <div class="col-lg-9 col-12">
                        <div class="card" id="basic-info">
                            <div class="card-header">
                                <h5>Data Pengguna</h5>
                            </div>
                            <div class="pt-0 card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="name">Nama Pengguna</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', $user->name) }}" class="form-control">
                                        @error('name')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="email">Email Pengguna</label>
                                        <input type="email" name="email" id="email"
                                            value="{{ old('email', $user->email) }}" class="form-control">
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="role">Pilih Role:</label>
                                        <select name="role" id="role" required class="form-select mb-3">
                                            <option value="Ketua" {{ old('role', $user->role->nama) == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                            <option value="Wakil Ketua" {{ old('role', $user->role->nama) == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                                            <option value="Sekretaris" {{ old('role', $user->role->nama) == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                                            <option value="Bendahara" {{ old('role', $user->role->nama) == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                            <option value="Anggota" {{ old('role', $user->role->nama) == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-6" id="divisi-role-container" style="{{ $user->role && $user->role->nama == 'Anggota' && $user->divisiRole ? '' : 'display: none;' }}">
                                        <label for="divisi_id" class="form-label">Pilih Divisi:</label>
                                        <select name="divisi_id" id="divisi_id" class="form-select mb-3">
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}" {{ old('divisi_id', $user->divisi_role_id) == $divisi->id ? 'selected' : '' }}>{{ $divisi->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('divisi_id')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <label for="divisirole" class="form-label">Pilih Role Divisi:</label>
                                        <select name="divisirole" id="divisirole" required class="form-select mb-3">
                                            <option value="ketua divisi" {{ old('divisirole', optional($user->divisiRole)->nama) == 'ketua divisi' ? 'selected' : '' }}>Ketua Divisi</option>
                                            <option value="anggota" {{ old('divisirole', optional($user->divisiRole)->nama) == 'anggota' ? 'selected' : '' }}>Anggota Divisi</option>
                                        </select>
                                        @error('divisirole')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>


                                <div class="row p-2">
                                    <label for="tentang_saya">Tentang Saya</label>
                                    <textarea name="tentang_saya" id="tentang_saya" rows="5" class="form-control">{{ old('tentang_saya', $user->tentang_saya) }}</textarea>
                                    @error('tentang_saya')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label for="foto_profile" class="form-label">Foto Profil</label>
                                        <input type="file" class="form-control" id="foto_profile" name="foto_profile">
                                        @if($user->foto_profile)
                                            <p>Foto Profil saat ini: <img src="{{ Storage::url($user->foto_profile) }}" width="100" alt="Foto Profil"></p>
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
    </main>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const divisiRoleContainer = document.getElementById('divisi-role-container');

        roleSelect.addEventListener('change', function () {
            if (this.value === 'Anggota') {
                divisiRoleContainer.style.display = 'block';
            } else {
                divisiRoleContainer.style.display = 'none';
            }
        });

        // Tampilkan divisi-role-container jika role sebelumnya adalah 'Anggota'
        if (roleSelect.value === 'Anggota') {
            divisiRoleContainer.style.display = 'block';
        }
    });
</script>

