@push('scripts')
<!-- Tambahan jika perlu JS DataTable atau lainnya -->
@endpush

<x-app-layout :assets="$assets ?? []">
    <div class="container">
        <div class="row justify-content-center">
                 <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bi bi-upload"></i> Import Target Nomor</h4> <a href="{{ route('target.index') }}" class="btn btn-dark"> Kembali Ke Daftar Target</a> 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('import.prosess') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" required>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-up"></i> Import Excel</button>
                            </div>
                        </form>
                        @if (session('imported_data'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-check-circle"></i> Import berhasil!</strong> Berikut detail data yang diimpor:
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped table-hover align-middle" role="grid" data-toggle="data-table">

                                     <thead class="table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Keterangan</th>
                                            <th>Campaign</th>
                                            <th>Mapping ID</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (session('imported_data') as $i => $data)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $data['nomor'] }}</td>
                                                <td>{{ $data['nama'] }}</td>
                                                <td>{{ $data['ket'] }}</td>
                                                <td><span class="badge bg-secondary">{{ $data['campaign'] }}</span></td>
                                                <td>{{ $data['mapping_id'] }}</td>
                                                <td>
                                                    @if(str_contains($data['status'], 'duplikat'))
                                                        <span class="badge bg-warning text-dark">{{ $data['status'] }}</span>
                                                    @else
                                                        <span class="badge bg-success">{{ $data['status'] }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
     </div>
</x-app-layout>
