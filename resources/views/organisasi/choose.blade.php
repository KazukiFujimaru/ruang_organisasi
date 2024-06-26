<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container">
            <h1>Choose Your Organization</h1>
            <a href="{{ route('organisasi.create') }}" class="btn btn-primary">Create New Organisasi</a>
            <a href="{{ route('organisasi.joinForm') }}" class="btn btn-secondary">Join Existing Organisasi</a>
        </div>
    </main>
</x-app-layout>
