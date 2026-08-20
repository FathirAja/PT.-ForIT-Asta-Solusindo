@extends('layouts.admin')

@section('page-title', 'Pesanan Paket')

@section('content')
<div class="page-header">
  <div>
    <h5>Pesanan Paket</h5>
    <p>Kelola pesanan berlangganan yang masuk dari pelanggan.</p>
  </div>
</div>

<div class="admin-panel">
  @if ($pesanan->count() > 0)
  <table class="admin-table">
    <thead>
      <tr>
        <th>Pemesan</th>
        <th>Paket</th>
        <th>Kontak</th>
        <th>Alamat</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th class="text-end">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pesanan as $item)
      <tr>
        <td>
          <p class="cell-title">{{ $item->nama }}</p>
          <p class="cell-sub">{{ $item->email }}</p>
        </td>
        <td>
          <p class="cell-title">{{ $item->paket->nama_paket ?? '-' }}</p>
          <p class="cell-sub">{{ $item->paket->layanan->nama ?? '' }}</p>
        </td>
        <td class="text-muted">{{ $item->telepon }}</td>
        <td class="text-muted">{{ Str::limit($item->alamat, 35) }}</td>
        <td class="text-muted">{{ $item->created_at->format('d M Y, H:i') }}</td>
        <td>
          <form action="{{ route('admin.pesanan-paket.status', $item) }}" method="POST" class="form-status">
            @csrf @method('PUT')
            <select name="status" class="status-select-sm status-select">
              <option value="baru" {{ $item->status == 'baru' ? 'selected' : '' }}>Baru</option>
              <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
              <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
              <option value="batal" {{ $item->status == 'batal' ? 'selected' : '' }}>Batal</option>
            </select>
          </form>
        </td>
        <td class="text-end">
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('pesanan.bukti', $item) }}" target="_blank" class="action-btn"><i class="fa-solid fa-file-pdf"></i></a>
            <form action="{{ route('admin.pesanan-paket.destroy', $item) }}" method="POST" class="form-hapus">
              @csrf @method('DELETE')
              <button type="submit" class="action-btn danger"><i class="fa-solid fa-trash"></i></button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <div class="empty-state">
    <i class="fa-solid fa-cart-shopping"></i>
    <p>Belum ada pesanan masuk.</p>
  </div>
  @endif
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.status-select').forEach(select => {
  select.addEventListener('change', function () {
    this.closest('form').submit();
  });
});

document.querySelectorAll('.form-hapus').forEach(form => {
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const currentForm = this;
    Swal.fire({title:'Hapus pesanan ini?', icon:'warning', showCancelButton:true, confirmButtonText:'Ya, hapus', confirmButtonColor:'#0D6EFD'})
    .then(res => { if (res.isConfirmed) currentForm.submit(); });
  });
});
</script>
@endpush