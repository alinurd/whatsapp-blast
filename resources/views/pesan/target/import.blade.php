<x-app-layout :assets="$assets ?? []">
<div class="container">
    <h4>Import Target Nomor</h4>
    <form action="{{ route('target.import.process') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Pilih file Excel</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Import</button>
    </form>
</div>
</x-app-layout>