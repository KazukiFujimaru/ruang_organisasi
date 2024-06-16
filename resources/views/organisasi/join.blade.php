<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container">
            <h1>Join an Organization</h1>
            <form action="{{ route('organisasi.join.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="organisasi">Select Organisasi</label>
                    <select name="organization_id" id="organisasi" class="form-control">
                        @foreach($organisasis as $organisasi)
                            <option value="{{ $organisasi->id }}">{{ $organisasi->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Join</button>
            </form>
        </div>
    </main>
</x-app-layout>
    
