<div class="iq-navbar-header" style="height: 50px;">
    <div class="container-fluid iq-container"> 

    {{-- Modal Arti Status --}}
    <!-- Modal -->
    <div class="modal fade" id="statusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Status Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-dark">
                    <div class="list-group">

                        <div class="list-group-item d-flex align-items-start">
                            <i class="bi bi-send-fill me-3 text-info fs-4"></i>
                            <div>
                                <strong>SENT (S):</strong><br>
                                Pesan telah berhasil dikirim ke server WhatsApp (centang 1).
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start">
                            <i class="bi bi-check2-all me-3 text-success fs-4"></i>
                            <div>
                                <strong>DELIVERED (D):</strong><br>
                                Pesan telah dikirim dan sampai ke nomor penerima (centang abu 2).
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start">
                            <i class="bi bi-eye-fill me-3 text-primary fs-4"></i>
                            <div>
                                <strong>READ (R):</strong><br>
                                Pesan telah dibaca oleh penerima (centang biru 2, jika read receipts aktif).
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start">
                            <i class="bi bi-x-octagon-fill me-3 text-danger fs-4"></i>
                            <div>
                                <strong>FAILED (F):</strong><br>
                                Gagal dikirim. Tidak dikenakan biaya.
                            </div>
                        </div>

                        <div class="list-group-item d-flex align-items-start">
                            <i class="bi bi-person-x-fill me-3 text-warning fs-4"></i>
                            <div>
                                <strong>ABORTED (A):</strong><br>
                                Nomor tidak terdaftar di WA. Tetap dikenakan biaya.
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
 

</div>
</div>