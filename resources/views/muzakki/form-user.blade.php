<form id="myForm" action="{{ route('muzakkiUserStore') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label">nama_lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required>
    </div>
    <div class="form-group">
        <label class="form-label">jenis_kelamin</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki">
        <label for="laki-laki">Laki-laki</label>
        <input type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
        <label for="perempuan">Perempuan</label>
    </div>
    <div class="form-group">
        <label class="form-label">nomor_telp</label>
        <input type="number" name="nomor_telp" class="form-control" id="nomor-telp" placeholder="Nomor Telepon" required>
    </div>
    <div class="form-group">
        <label class="form-label">alamat</label>
        <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" required></textarea>
    </div>
    <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
</form>

<script>
    document.getElementById('saveBtn').addEventListener('click', function() {
        var form = document.getElementById('myForm');
        var formData = new FormData(form);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
               alert("Data berhasil disimpan.");
            // Clear form input

            form.reset();
            	location.reload();

           
            // Reload or update your page content here
            }  
        };
        xhr.send(formData);
    });
</script>
