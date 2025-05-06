<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('target.import.process') }}" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Import Target Pesan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="file" class="form-label">Pilih file Excel</label>
                <input type="file" name="file" class="form-control" required accept=".xlsx,.xls,.csv">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Import</button>
        </div>
    </form>
  </div>
</div>
