@extends('layouts.admin')

@section('page-title', 'Kelola Layanan')

@section('content')
<div class="page-header">
  <div>
    <h5>Kelola Layanan</h5>
    <p>Daftar layanan yang ditampilkan di halaman publik.</p>
  </div>
  <a href="{{ route('admin.layanan.create') }}" class="btn-admin">
    <i class="fa-solid fa-plus"></i> Tambah Layanan
  </a>
</div>

<div class="admin-panel">
  @if ($layanan->count() > 0)
  <table class="admin-table">
    <thead>
      <tr>
        <th>Layanan</th>
        <th>Deskripsi</th>
        <th class="text-end">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($layanan as $item)
      <tr>
        <td>
          <div class="d-flex align-items-center gap-3">
            <div class="cell-icon"><i class="{{ $item->icon }}"></i></div>
            <p class="cell-title">{{ $item->nama }}</p>
          </div>
        </td>
        <td class="text-muted">{{ Str::limit($item->deskripsi, 70) }}</td>
        <td class="text-end">
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.layanan.edit', $item) }}" class="action-btn"><i class="fa-solid fa-pen"></i></a>
            <form action="{{ route('admin.layanan.destroy', $item) }}" method="POST" class="form-hapus">
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
    <i class="fa-solid fa-briefcase"></i>
    <p>Belum ada layanan ditambahkan.</p>
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
    Swal.fire({title:'Hapus layanan ini?', icon:'warning', showCancelButton:true, confirmButtonText:'Ya, hapus', confirmButtonColor:'#0D6EFD'})
    .then(res => { if (res.isConfirmed) currentForm.submit(); });
  });
});
</script>
@endpush