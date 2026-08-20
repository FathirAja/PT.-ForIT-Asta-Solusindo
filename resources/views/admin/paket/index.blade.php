@extends('layouts.admin')

@section('page-title', 'Kelola Paket')

@section('content')
<div class="page-header">
  <div>
    <h5>Kelola Paket</h5>
    <p>Daftar paket berlangganan yang tersedia untuk pelanggan.</p>
  </div>
  <a href="{{ route('admin.paket.create') }}" class="btn-admin">
    <i class="fa-solid fa-plus"></i> Tambah Paket
  </a>
</div>

<div class="admin-panel">
  @if ($paket->count() > 0)
  <table class="admin-table">
    <thead>
      <tr>
        <th>Paket</th>
        <th>Layanan Terkait</th>
        <th>Kecepatan</th>
        <th>Harga</th>
        <th>Tipe</th>
        <th class="text-end">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($paket as $item)
      <tr>
        <td>
          <span class="status-dot status-{{ $item->warna == 'primary' ? 'baru' : ($item->warna == 'success' ? 'selesai' : ($item->warna == 'danger' ? 'batal' : 'diproses')) }}">
            {{ $item->nama_paket }}
          </span>
        </td>
        <td class="text-muted">{{ $item->layanan->nama ?? '-' }}</td>
        <td>{{ $item->kecepatan }}</td>
        <td class="fw-medium">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
        <td class="text-muted">{{ $item->tipe }}</td>
        <td class="text-end">
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.paket.edit', $item) }}" class="action-btn"><i class="fa-solid fa-pen"></i></a>
            <form action="{{ route('admin.paket.destroy', $item) }}" method="POST" class="form-hapus">
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
    <i class="fa-solid fa-box"></i>
    <p>Belum ada paket ditambahkan.</p>
  </div>
  @endif
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.form-hapus').forEach(form => {
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const currentForm = this;
    Swal.fire({title:'Hapus paket ini?', icon:'warning', showCancelButton:true, confirmButtonText:'Ya, hapus', confirmButtonColor:'#0D6EFD'})
    .then(res => { if (res.isConfirmed) currentForm.submit(); });
  });
});
</script>
@endpush