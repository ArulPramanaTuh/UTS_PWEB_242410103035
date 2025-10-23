<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body">
        {{ $message ?? 'Aksi berhasil dijalankan!' }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

@push('scripts')
<script>
function showToast(message = 'Aksi berhasil dijalankan!') {
  const toastEl = document.getElementById('liveToast');
  toastEl.querySelector('.toast-body').innerText = message;
  const toast = new bootstrap.Toast(toastEl);
  toast.show();
}
</script>
@endpush
